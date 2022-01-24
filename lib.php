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

 //Extend the settings navigation to include a link to our plugin
 function tool_claytondarl_extend_navigation_course($navigation, $course, $context) {
     //Add a new node to the navigation tree
    $navigation->add(
        get_string('pluginname', 'tool_claytondarl'), //Gets the name of the plugin
        new moodle_url('/admin/tool/claytondarl/index.php'), //creates the url with the user id parameter
        navigation_node::TYPE_SETTING, //sets the nodes type
        get_string('pluginname', 'tool_claytondarl'), //
        'claytondarl',
        new pix_icon('icon', '', 'tool_claytondarl')
    );
 }