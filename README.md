phabricator-to-zulip
========================

This standalone tool reads Phabricator's story feed and sends updates
to the Zulip chat system.

Instructions:

* Create a stream called "Phabricator" in your Zulip realm.
* Ensure that you and other users are subscribed to the stream.
* Install Phabricator.
* Choose a directory where you want to install the integration software.  A reasonable
  place would be the parent directory of the "phabricator" directory of your Phabricator
  installation, but it's fairly arbitrary.
* `git clone https://github.com/showell/phabricator-to-zulip.git`
* `cd phabricator-to-zulip`
* Collect the following information:
    * your Zulip API key
    * the location of Phabricator's `__init_script__.php` file
    * your Conduit certificate for Phabricator
* Edit ZulipConfig.php to suit your installation.
    * This is very important!
    * You will typically modify about eight configuration parameters.
* Run the listener program: `php ZulipFeedListener.php'
    * You may need to locate the php binary in your system.
* Try triggering these Phabricator events while watching your "Phabricator" stream on Zulip:
    * Edit a Maniphest task.
    * Edit a Differential code review.
