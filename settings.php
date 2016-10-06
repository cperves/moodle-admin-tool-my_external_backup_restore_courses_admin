<?php
/**
 * legacyfiles migration settings file
 *
 * @package  
 * @subpackage 
 * @copyright  2014 unistra  {@link http://unistra.fr}
 * @author Celine Perves <cperves@unistra.fr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
	$ADMIN->add('root', new admin_externalpage('my_external_backup_restore_courses_managment', get_string('pluginname', 'tool_my_external_backup_restore_courses_admin'), "$CFG->wwwroot/$CFG->admin/tool/my_external_backup_restore_courses_admin/managment.php",'moodle/site:config'));
}
