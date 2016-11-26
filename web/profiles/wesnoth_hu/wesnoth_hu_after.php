<?php
// Load 'adminisztator' user role.
$role = \Drupal\user\Entity\Role::load('adminisztrator');
$permissions=[
	'administer advanced forum',
	'administer advanced forum',
	'administer blocks',
	'use PHP for settings',
	'administer CAPTCHA settings',
	'administer comments',
	'administer contact forms',
	'administer filters',
	'administer forums',
	'delete any forum content',
	'delete own forum content',
	'edit any forum content',
	'edit own forum content',
	'create images',
	'delete any images',
	'delete own images',
	'edit any images',
	'edit own images',
	'view original images',
	'attach images',
	'administer languages',
	'translate interface',
	'administer login destination',
	'administer mass contact',
	'choose whether to archive mass contact messages',
	'send mass contact attachments',
	'send mass contact e-mails',
	'send to users in the Wesnoth felhasználók category',
	'administer menu',
	'access content',
	'administer content types',
	'administer nodes',
	'access content overview',
	'create mass_contact content',
	'create page content',
	'delete any mass_contact content',
	'delete any page content',
	'delete any profile content',
	'delete any story content',
	'delete own mass_contact content',
	'delete own page content',
	'delete own profile content',
	'delete own story content',
	'delete revisions',
	'edit any mass_contact content',
	'edit any page content',
	'edit any profile content',
	'edit any story content',
	'edit own mass_contact content',
	'edit own page content',
	'revert revisions',
	'view revisions',
	'administer url aliases',
	'create url aliases',
	'administer pathauto',
	'notify of path changes',
	'cancel own vote',
	'create poll content',
	'delete any poll content',
	'delete own poll content',
	'edit any poll content',
	'edit own poll content',
	'inspect all votes',
	'administer privatemsg settings',
	'read all private messages',
	'administer search',
	'administer smileys',
	'access administration pages',
	'access site reports',
	'administer actions',
	'administer files',
	'administer site configuration',
	'select different theme',
	'administer taxonomy',
	'administer taxonomy images',
	'can disable taxonomy images',
	'administer permissions',
	'administer users',
	'change own username',
	'access all views',
	'administer views',
	'administer voting api',
	'access mwb',
	'access wesnoth admin',
	'access wesnoth replays',
	'administer mwb',
	'administer wesnoth replays',
	'edit any wesnoth replays',
	'edit jelentkezesek',
	'edit own wesnoth replays',
	'use text format alakhu',
	'administer comment types',
	'administer display modes',
	'administer comment display',
	'administer comment fields',
	'administer comment form display',
	'administer node display',
	'administer node fields',
	'administer node form display',
	'administer block_content display',
	'administer block_content fields',
	'administer block_content form display',
	'administer poll display',
	'administer poll fields',
	'administer poll form display',
	'administer taxonomy_term display',
	'administer taxonomy_term fields',
	'administer taxonomy_term form display',
	'administer user display',
	'administer user fields',
	'administer user form display',
	'administer polls',
	'access polls',
	'administer modules',
	'administer software updates',
	'administer themes',
	'link to any page',
	'access site in maintenance mode',
	'view the administration theme',
	'administer account settings'
];
foreach ($permissions as $p) {
	$role->grantPermission($p);
}
$role->setIsAdmin(true);
$role->save();


// Set 'hu' as the default language
$langcode = 'hu';
$language = \Drupal\language\Entity\ConfigurableLanguage::load($langcode);
// From install.core.inc
\Drupal::configFactory()->getEditable('system.site')
	->set('langcode', $langcode)
	->set('default_langcode', $langcode)
	->save();
\Drupal::service('language.default')->set($language);


// Load 'alakhu' format and remove null filter.
$format = \Drupal\filter\Entity\FilterFormat::load('alakhu');
$filters = $format->filters();
$filters->removeInstanceID('filter_null');
// $filters->removeFilter('filter_null');
$format->save();

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

// Create 'alakhu' editor.
/*
$ePM = \Drupal::service('plugin.manager.editor');
$plugin = $ePM->createInstance('ckeditor');
// $plugin = $this->ckeditorPluginManager->createInstance($plugin_id);

// $editor = \Drupal\editor\Entity\Editor::create(['id'=>'alakhu', 'plugin_id'=>'ckeditor']);
// From Entity.php
$values=['id'=>'alakhu'];
$eTM = \Drupal::entityTypeManager();
// print_r($eTM->getDefinitions());

$eM = \Drupal::entityManager();
// $editor = $eM->getStorage($eM->getEntityTypeFromClass('Drupal\editor\Entity\Editor'))->create($values);
$editor = $eTM->getStorage('editor')->create($values);
// /*
$editor->setEditor('ckeditor');
$editor->setFormat('alakhu');
$editor->save();
// */
