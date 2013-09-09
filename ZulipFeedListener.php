<?php

require_once 'ZulipConfig.php';
require_once PHABRICATOR_INIT_SCRIPT;

function post_to_zulip($content) {
  sleep(ZULIP_RATE_LIMITING_WAIT);

  $url = ZULIP_HOST . '/api/v1/messages';

  $data = array(
    "type" => 'stream',
    "to" => ZULIP_STREAM_NAME,
    "subject" => ZULIP_TOPIC_NAME,
    "content" => $content
  );

  $request = new HTTPFuture($url);
  $request->setMethod('POST');
  $request->addHeader('Authorization', 'Basic ' . base64_encode(ZULIP_USER . ':' . ZULIP_API_KEY));
  $request->setData($data);
  $request->resolvex();
}

function get_connected_conduit() {
  // Conduit objects are Phabricator's way of talking to their server.
  $uri = PHABRICATOR_HOST . '/api/';
  $conduit = new ConduitClient($uri);
  $conduit->callMethodSynchronous(
    'conduit.connect',
    array(
      'client'            => 'Zulip',
      'clientVersion'     => '1.0',
      'clientDescription' => 'Zulip integration',
      'user'              => CONDUIT_USER,
      'certificate'       => CONDUIT_CERT
    )
  ); 
  return $conduit;
}

function get_latest_stories($conduit, $last_reported_timestamp) {
  // This code can be simplified once https://secure.phabricator.com/D6903
  // is deployed widely.
  $after = 0;
  $stories = array();

  while (true) {
    $chunk = $conduit->callMethodSynchronous(
      'feed.query',
      array(
        'after' => $after,
        'view' => 'text',
        'limit' => QUERY_CHUNK_SIZE
      )
    ); 

    if (count($chunk) == 0) {
      return array_reverse($stories);
    }

    foreach ($chunk as $story) {
      if ($story['chronologicalKey'] <= $last_reported_timestamp) {
        return array_reverse($stories);
      }
      $stories[] = $story;
      $after = $story['chronologicalKey'];
    }
  }
}

function get_feed() {
  $conduit = get_connected_conduit();

  $last_reported_timestamp = 0;
  $latest = $conduit->callMethodSynchronous(
    'feed.query',
    array(
      'limit' => 1,
      'view' => 'text',
    )
  ); 

  foreach ($latest as $story) {
    $last_reported_timestamp = $story['chronologicalKey'];
  }

  while (true) {
    $stories = get_latest_stories($conduit, $last_reported_timestamp);
    foreach ($stories as $story) {
      post_to_zulip($story['text']);
      $last_reported_timestamp = $story['chronologicalKey'];
    }
    sleep(FEED_POLLING_INTERVAL);
  }
}

get_feed();

