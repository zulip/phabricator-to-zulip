phabricator-to-zulip
========================

This program reads [Phabricator](http://phabricator.org/)'s story feed and sends
updates to the [Zulip](https://zulip.com/) chat system.

## Instructions

1. Create a stream called "Phabricator" inside Zulip, and
  ensure that you and other users are subscribed to the stream.
2. Create a bot for Phabricator on your [Zulip settings page](https://zulip.com/#settings)
  in the "Add new bot" section.  We recommend the full name "Phabricator Bot"
  and the username "phabricator."  Zulip will give your bot an API Key, which
  you should note.
3. Choose a directory where you want to install the integration software.  A
  reasonable place would be the parent directory of the "phabricator" directory
  of your Phabricator installation, but it's fairly arbitrary.
4. `git clone https://github.com/zulip/phabricator-to-zulip.git`
5. `cd phabricator-to-zulip`
6. Collect the following information:
    * the location of Phabricator's `__init_script__.php` file
    * your Conduit certificate for Phabricator (typically in `~/.arcrc`)
7. Edit `ZulipConfig.php` to suit your installation.
    * This is very important!
    * You will typically modify about eight configuration parameters.
8. Run the listener program: `php ZulipFeedListener.php`
    * You may need to locate the php binary in your system.
    * You will only receive notifications while this program is running.
9. Try triggering these Phabricator events while watching your "Phabricator" stream on Zulip:
    * Edit a Maniphest task.
    * Edit a Differential code review.

## License

Copyright © 2013 Dropbox, Inc. All rights reserved. 

Licensed under the Apache License, Version 2.0. See `LICENSE` for details.
