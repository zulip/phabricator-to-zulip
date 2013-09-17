<?php

// Zulip Phabricator plugin configuration
// Edit these to match your local settings

// Path to your Phabricator __init_script__.php
// Defaults to assuming your installation is in the script's parent directory
const PHABRICATOR_INIT_SCRIPT = '../phabricator/scripts/__init_script__.php';

// Your Zulip username or the username of the bot you created for this purpose
const ZULIP_USER = 'phabricator-bot@example.com';

// API key for the aformentioned user; find it on the "Settings" tab on Zulip
const ZULIP_API_KEY = 'rHb96zCCV3ZCFFOAHBQ2m7TH1puIdnY7';
// Name of the target stream for your notifications. You must create it if it does not already exist.
const ZULIP_STREAM_NAME = 'Phabricator';
// Topic to send story notifications to.
const ZULIP_TOPIC_NAME = 'feed';

// URL for your Phabricator installation
const PHABRICATOR_HOST = 'http://phabricator.example.com/';
// User and certificate for connecting with Phabricator; find the certificate in ~/.arcrc
const CONDUIT_USER = 'othello';
const CONDUIT_CERT = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456';


// Miscellaneous configuration; should not require manual editing
const ZULIP_HOST = 'https://api.zulip.com/';
const FEED_POLLING_INTERVAL = 3; // seconds
const QUERY_CHUNK_SIZE = 10;
const ZULIP_RATE_LIMITING_WAIT = 0.7; // seconds
const CLIENT = 'Zulip';
const CLIENT_VERSION = '1.0';
const CLIENT_DESCRIPTION = 'Zulip integration';
