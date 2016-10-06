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
defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2016030900; // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires  = 2012112900; // Requires this Moodle version
$plugin->component = 'tool_my_external_backup_restore_courses_admin'; // Full name of the plugin (used for diagnostics)
$plugin->dependencies = array(
							'block_my_external_backup_restore_courses'=> ANY_VERSION
						);