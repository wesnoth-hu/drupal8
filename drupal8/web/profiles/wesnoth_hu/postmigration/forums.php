<?php

// start with a clean table
$result = \Drupal::database()->query('
DELETE FROM {forum_index}
');

// collect all the required data to be used later
$nf_result = \Drupal::database()->query('
SELECT nf.entity_id as nid, forums_target_id as tid, nfd.title, nfd.sticky, nfd.created, ces.last_comment_timestamp, ces.comment_count
FROM {node__forums} AS nf
LEFT JOIN {node_field_data} AS nfd ON nfd.nid=nf.entity_id AND nfd.vid=nf.revision_id
LEFT JOIN {comment_entity_statistics} AS ces ON ces.entity_id=nf.entity_id
WHERE ces.field_name=\'comment\'
');

// fill up forum_index table with these:
// nid, title, tid, sticky, created, last_comment_timestamp, comment_count
foreach ($nf_result as $r) {
	// Perform operations on $record->title, etc. here.
	$result = \Drupal::database()->query('INSERT INTO {forum_index}
		(nid, tid, title, sticky, created, last_comment_timestamp, comment_count) VALUES
  (:nid, :tid, :title, :sticky, :created, :last_comment_timestamp, :comment_count)', (array)$r);
}

// collect all the required data to be used later
$nf_result = \Drupal::database()->query('
SELECT entity_id as nid, revision_id as vid, forums_target_id as tid
FROM {node__forums}
');

// fill up forums table with these:
// nid, vid, tid
foreach ($nf_result as $r) {
	// Perform operations on $record->title, etc. here.
	$result = \Drupal::database()->query('INSERT INTO {forum}
		(nid, vid, tid) VALUES
    (:nid, :vid, :tid)', (array)$r);
}

// Remove all comment_forum entries from the statistics
$result = \Drupal::database()->query('delete from {comment_entity_statistics} where field_name=\'comment_forum\'');

// Rename comment to comment_forum in the statistics for forum nodes
$result = \Drupal::database()->query('update {comment_entity_statistics} set field_name=\'comment_forum\' where entity_id in (select entity_id from node__forums) and field_name=\'comment\'');

echo 'forums postinstall done';
