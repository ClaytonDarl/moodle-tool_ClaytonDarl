<?php
require_once($CFG->libdir.'/formslib.php');
class tool_claytondarl_add_form extends moodleform {
    public function definition() {
        global $CFG;

        $mform = $this->_form;
        $data = $this->_customdata['id'];

        //name block
        $mform->addElement('text', 'name', 'Name');
        $mform->setType('name', PARAM_TEXT);
        $mform->setDefault('name', 'Add name');

        //completed block
        $mform->addElement('checkbox', 'completed', 'Completed');
        $mform->setType('completed', PARAM_INT);
        $mform->setDefault('completed', 0);

        //hidden course id
        $mform->addElement('hidden', 'courseid', 1);
        $mform->setType('courseid', PARAM_INT);

        $this->add_action_buttons(true, "Submit record");
    }
}