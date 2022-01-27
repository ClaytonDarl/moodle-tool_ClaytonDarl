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
require_once('classes/tool_claytondarl_add_form.php');

require_login();
global $DB;
//setup a redirect link back to index for capability check
$redirect = new moodle_url('/admin/tool/claytondarl/index.php');

$url = new moodle_url('/admin/tool/claytondarl/edit.php', array());
$PAGE->set_context(context_system::instance());
$PAGE->set_url($url);
$PAGE->set_pagelayout('report');

if (!has_capability('tool/claytondarl:edit', $PAGE->context)) {
    redirect($redirect);
}

echo $OUTPUT->header();
//create the add form will redirect to index.php
$mform = new tool_claytondarl_add_form($redirect);

if($mform->is_cancelled())
{
    redirect($redirect);
}
else if ($data = $mform->get_data()) //get the form data and then do stuff
{
    $DB->insert_record('tool_claytondarl', $data);
}
else  //This runs if data is validated and should redisplay the form or on the first display of the form
{
    $mform->display();
}


echo $OUTPUT->footer();
