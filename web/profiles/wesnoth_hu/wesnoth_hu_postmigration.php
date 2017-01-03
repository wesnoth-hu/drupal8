<?php

// Scripts to be executed after the migration, execute this with drush:
// drush.phar php-script profiles/wesnoth_hu/wesnoth_hu_postmigration.php

require_once('postmigration/general.php');
require_once('postmigration/roles.php');
require_once('postmigration/forums.php'); // can only be executed once
require_once('postmigration/blocks.php');
require_once('postmigration/testing.php'); // only for pre-release testing
