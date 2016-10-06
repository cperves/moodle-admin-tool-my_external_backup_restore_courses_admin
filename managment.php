<?php
/**
 * Folder plugin version information
 *
 * @package  
 * @subpackage 
 * @copyright  2015 unistra  {@link http://unistra.fr}
 * @author Celine Perves <cperves@unistra.fr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(dirname(__FILE__) . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot . '/admin/tool/my_external_backup_restore_courses_admin/coursetoimportadmintable.php');
admin_externalpage_setup('my_external_backup_restore_courses_managment', '', array(), new moodle_url('/'.$CFG->admin.'/tool/my_external_backup_restore_courses_admin/managment.php',array()));
$PAGE->navbar->add(get_string('pluginname', 'tool_my_external_backup_restore_courses_admin'));
$PAGE->requires->jquery();
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('scheduledtasklist','tool_my_external_backup_restore_courses_admin'));
$defaultcategoryid = get_config('block_my_external_backup_restore_courses','defaultcategory');
if(!isset($defaultcategoryid) || empty($defaultcategoryid) || !(is_numeric($defaultcategoryid))){
	print_error('malformed default category parameter for block my_external_backup_courses, please contact adlministrator');
}
$defaultcategory = $DB->get_record('course_categories', array('id'=>$defaultcategoryid));
if(!$defaultcategory){
	print_error('malformed default category parameter for block my_external_backup_courses, unexisting category, please contact adlministrator');
}
echo $OUTPUT->box_start('my_external_backup_restore_courses_admin_help');
echo html_writer::tag('span', get_string('externalmoodleadminhelpsection','tool_my_external_backup_restore_courses_admin'));
echo html_writer::empty_tag('br');
//writing default category informations
echo html_writer::tag('span', get_string('defaultcategoryx','tool_my_external_backup_restore_courses_admin', $defaultcategory));
echo $OUTPUT->box_end();

$perpage = optional_param('perpage', 0, PARAM_INT);
$page = optional_param('page', 0, PARAM_INT);
if (!$perpage) {
	$perpage = get_user_preferences('tool_my_external_backup_restore_courses_admin_perpage', 10);
} else {
	set_user_preference('tool_my_external_backup_restore_courses_admin_perpage', $perpage);
}
//action
$submit = optional_param('submit', null, PARAM_TEXT);
$trigger = optional_param('trigger', 0, PARAM_INT);
if($submit && $trigger!=0){
	$internalcategory = required_param('internalcategory_'.$trigger, PARAM_INT); 
	$status = required_param('status_'.$trigger, PARAM_INT);;
	$scheduledtask = $DB->get_record('block_external_backuprestore', array('id'=>$trigger));
	if($scheduledtask->internalcategory != $internalcategory || $scheduledtask->status != $status){
		$scheduledtask->internalcategory = $internalcategory;
		$scheduledtask->status = $status;
		$scheduledtask->timemodified = time();
		$DB->update_record('block_external_backuprestore', $scheduledtask);
	}
}
$table = new tool_my_external_backup_restore_course_admin_table($perpage,$page);
$table->is_persistent(true);
echo $table->out($table->get_rows_per_page(), true);
echo $OUTPUT->footer();