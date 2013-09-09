<?php

// IMPORTANT! Edit this file for your installation.

// PHP stuff:
// This will almost certainly be different for your installation, and you need this
// to be able to use some Phabricator libraries.
const PHABRICATOR_INIT_SCRIPT = '/Users/showell/PHP/phabricator/scripts/__init_script__.php';

// Zulip stuff:
// Edit your user information and desired stream name.  Note that you
// must create the stream on Zulip and subscribe people to it.
const ZULIP_USER = 'steve@zulip.com';
const ZULIP_API_KEY = 'rHb96zCCV3ZCFFOAHBQ2m7TH1puIdnY7'; // find this on the Settings page
const ZULIP_STREAM_NAME = 'Phabricator'; // set this up on Zulip!
const ZULIP_TOPIC_NAME = 'feed'; // this requires no setup

// Phabricator stuff:
const PHABRICATOR_HOST = 'http://showell.com';
const CONDUIT_USER = 'steve';
const CONDUIT_CERT = 'zmjvsixfodf2vklo576oh5fnmpulfm4l3dfxllw6hgwiqsdmevei3pdqv4a2bpnjdhcvi7el32e25ero4aaqnwpqeh7tcgmn435fu5x23i5luybwlxvpadhaurzzsigtdwd76vfipztpmgoip4ra3eacgork2gqcehpslvdgjypuvtdkmitiwqkr45amfgshpb5s2iv6m4kvcbqzmawraoc6t5uswtwskayqco3ioakqxlqjw2oxk3qwdsfuz6j';


// Stuff you probably don't need to change:
const ZULIP_HOST = 'http://showell.com:9991';
const FEED_POLLING_INTERVAL = 3; // seconds
const QUERY_CHUNK_SIZE = 10;
const ZULIP_RATE_LIMITING_WAIT = 0.7; // seconds

