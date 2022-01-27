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
global $DB;
$redirect = new moodle_url('/admin/tool/claytondarl/index.php');

$url = new moodle_url('/admin/tool/claytondarl/delete.php', array());

if ($deleteid = optional_param('delete', null, PARAM_INT)){
    require_sesskey(); //require the session key to be right
    require_login(get_course(1));
    require_capability('tool/claytondarl:edit', context_course::instance(1));
    $DB->delete_records('tool_claytondarl', ['id' => $deleteid]);
    redirect($redirect);
}

