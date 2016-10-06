<?php
/**
 * Folder plugin version information
 *
 * @package  
 * @subpackage 
 * @copyright  2016 unistra  {@link http://unistra.fr}
 * @author Celine Perves <cperves@unistra.fr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function tool_my_external_backup_restore_course_admin_any_entries() {
	global $DB, $CFG;
	$entries = $DB->get_records('block_external_backuprestore');//troubles with moodle get_count
	return $entries === false ? false:count($entries)>0;
}