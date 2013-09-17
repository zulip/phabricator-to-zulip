phabricator-to-zulip
========================

This daemon reads [Phabricator](http://phabricator.org/)'s story feed and sends
updates to the [Zulip](https://zulip.com/) chat system.

## Instructions

1. Create a stream called "Phabricator" inside Zulip.
2. Ensure that you and other users are subscribed to the stream.
3. Choose a directory where you want to install the integration software.  A
  reasonable place would be the parent directory of the "phabricator" directory
  of your Phabricator installation, but it's fairly arbitrary.
4. `git clone https://github.com/showell/phabricator-to-zulip.git`
5. `cd phabricator-to-zulip`
6. Collect the following information:
    * your Zulip API key
    * the location of Phabricator's `__init_script__.php` file
    * your Conduit certificate for Phabricator (typically in `~/.arcrc`)
7. Edit `ZulipConfig.php` to suit your installation.
    * This is very important!
    * You will typically modify about eight configuration parameters.
8. Run the listener program: `php ZulipFeedListener.php'
    * You may need to locate the php binary in your system.
9. Try triggering these Phabricator events while watching your "Phabricator" stream on Zulip:
    * Edit a Maniphest task.
    * Edit a Differential code review.
