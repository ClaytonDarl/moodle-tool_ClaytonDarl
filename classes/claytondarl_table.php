<?php
require_once($CFG->libdir.'/tablelib.php'); //need to add the class im extending! Should this be a namespace?
class tool_claytondarl_table extends table_sql {
    /**
     * Constructor
     */
    function __construct($uniqueid)
    {
        parent::__construct($uniqueid);
        //Define the list of columns to show
        $columns = array('id','courseid','completed','priority','timecreated','timemodified', 'name', 'delete');
        $this->define_columns($columns);

        //Define the titles of columns to show in headers
        $headers = array('Id', 'Course Id', 'Completed', 'Priority', 'Time Created', 'Time Modified', 'name', 'delete');
        $this->define_headers($headers);
    }

    protected function col_name($values) {
        return format_string($values->name);
    }

    //Format the completed column
    function col_completed($values)
    {
        if($values->completed == 1) {
            return get_string('yes', 'tool_claytondarl');
        } else {
            return get_string('no', 'tool_claytondarl');
        }
    }

    function col_id($values) {
        $url = new moodle_url('/admin/tool/claytondarl/edit.php', array('id' => $values->id));
        return '<a href="'. $url->out(true) . '">' . $values->id . '</a>';
    }

    function col_timecreated($values) {
        return userdate($values->timecreated);
    }

    function col_timemodified($values) {
        return userdate($values->timemodified);
    }

    function col_delete($values) {
        $url = new moodle_url('/admin/tool/claytondarl/delete.php', array('id' => $values->id));
        return '<a href="'. $url->out(true) . '"> DELETE </a>';;
    }

}