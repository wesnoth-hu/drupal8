<?php

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
