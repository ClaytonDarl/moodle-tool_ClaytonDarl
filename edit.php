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
require_once($CFG->libdir.'/adminlib.php');
require_once('classes/tool_claytondarl_form.php');

require_login();
global $DB;
$redirect = new moodle_url('/admin/tool/claytondarl/index.php');



$url = new moodle_url('/admin/tool/claytondarl/edit.php', array());
$PAGE->set_context(context_system::instance());
$PAGE->set_url($url);
$PAGE->set_pagelayout('report');


if (!has_capability('tool/claytondarl:edit', $PAGE->context)) {
    redirect($redirect);
}


$nexturl = new moodle_url('/admin/tool/claytondarl/index.php', array('id' => $_GET['id']));
$mform = new tool_claytondarl_form($nexturl); //So this is how you define a redirect on submit

$record = $DB->get_record("tool_claytondarl", ['id' => $_GET['id']], "*", IGNORE_MISSING);

$mform->set_data($record);

if ($mform->is_cancelled()) {
    redirect($nexturl);
} else if ($data = $mform->get_data()) {
    $record->timemodified = 2;
    $record->name = format_string($data->name);

    //insert the data
    $DB->update_record("tool_claytondarl", $record);
} else {
    echo "ERROR getting form data!";
}

$PAGE->set_title('Hello to claytondarl');
$PAGE->set_heading(get_string('pluginname', 'tool_claytondarl'));

echo $OUTPUT->header();

//display the form
$mform->display();

echo $OUTPUT->footer();

