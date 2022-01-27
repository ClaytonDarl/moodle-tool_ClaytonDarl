<?php
//This file is part of Moodle - http://moodle.org/
//
//Moodle is free software: you can redistribute it and/or modify
//it under the terms of the GNU General Public License as published by
//the Free Software Foundation, either version 3 of the License, or
//(at your option) any later version.
//
//Moodle is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version Informarion
 *
 * @package mod_php
 * @copyright 2022 Clayton Darlington
 * @license MIT
 */
require_once(__DIR__ . '/../../../config.php');
//defined('MOODLE_INTERNAL') || die(); //This is casuing my issue! Makes it so a page is only accessible from an internal moodle link
require_once($CFG->libdir.'/adminlib.php');
require_once("classes/claytondarl_table.php");
require_once($CFG->libdir.'/tablelib.php');
//admin_externalpage_setup('tool_claytondarl'); --This will also cause an issue I need to look into adding this as an ADMIN
require_login();
global $DB;

$url = new moodle_url('/admin/tool/claytondarl/index.php', array());
$PAGE->set_context(context_system::instance());
$PAGE->set_url($url);
$PAGE->set_pagelayout('report');
$PAGE->set_title('Hello to claytondarl');
$PAGE->set_heading(get_string('pluginname', 'tool_claytondarl'));

$download = optional_param('download', '', PARAM_ALPHA);

$table = new tool_claytondarl_table('1');

if (!$table->is_downloading()) {
    //Only print the headers if not downloading
    //Print page header
    $PAGE->set_title("Testing table");
    $PAGE->set_heading("Testing table");
    $PAGE->navbar->add("Testing table");
    echo $OUTPUT->header();
}

//This is to have a record inserted. I need to figure out what is going on with my form
//$data = array('courseid' => 1, 'completed' => 1, 'priority' => 1, 'timecreated' => 12, 'name' => 'Tester');
//$DB->insert_record('tool_claytondarl', $data);

echo html_writer::div('<a href="add.php"> Add a new record </a>');

$table->set_sql('*', "{tool_claytondarl}", '1=1');
$table->define_baseurl($url);
$table->out(10, true);

if(!$table->is_downloading()) {
    echo $OUTPUT->footer();
}