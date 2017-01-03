<?php

// Store the authenticated visibility
$vis = ['user_role'=> [
	'id'=>'user_role',
	'roles'=>[
		'authenticated'=>'authenticated'
	],
	'negate'=>false,
	'context_mapping'=>[
		'user'=>'@user.current_user_context:current_user'
	]	
]];

// Set any possible content for authenticated users (only for testing)
// /*
\Drupal::configFactory()->getEditable('block.block.elsodlegeslinkek')
	->set('visibility', $vis)
	->save();
\Drupal::configFactory()->getEditable('block.block.felhasznaloifiokmenuje')
	->set('visibility', $vis)
	->save();
\Drupal::configFactory()->getEditable('block.block.user_7')
	->set('visibility', $vis)
	->save();
\Drupal::configFactory()->getEditable('block.block.user_8')
	->set('visibility', $vis)
	->save();
\Drupal::configFactory()->getEditable('block.block.user_9')
	->set('visibility', $vis)
	->save();
\Drupal::configFactory()->getEditable('block.block.search_1')
	->set('visibility', $vis)
	->save();

\Drupal::configFactory()->getEditable('user.role.anonymous.yml')
	->set('permissions', [])
	->save();
// End of hiding before release */
