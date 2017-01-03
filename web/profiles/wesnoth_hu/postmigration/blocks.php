<?php

// Set imported block positions
// user_6 = login
\Drupal::configFactory()->getEditable('block.block.user_6')
	->set('region', 'sidebar_first')
	->save();
// user_7 = local tools
\Drupal::configFactory()->getEditable('block.block.user_7')
	->set('region', 'sidebar_first')
	->save();
// user_8 = latest members
\Drupal::configFactory()->getEditable('block.block.user_8')
	->set('region', 'sidebar_first')
	->save();
// user_9 = who is online
\Drupal::configFactory()->getEditable('block.block.user_9')
	->set('region', 'sidebar_first')
	->save();
// search1 = search
\Drupal::configFactory()->getEditable('block.block.search_1')
	->set('region', 'sidebar_first')
	->save();
