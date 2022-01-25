<?php

function xmldb_tool_claytondarl_upgrade($oldversion) {
    global $CFG;
    global $DB;

    $result = true;
    $dbman = $DB->get_manager();

    if ($oldversion < 2021012410) {

        // Define table tool_claytondarl to be created.
        $table = new xmldb_table('tool_claytondarl');

        // Adding fields to table tool_claytondarl.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('courseid', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('completed', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('priority', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1');
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, null, null, null);

        // Adding keys to table tool_claytondarl.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        // Conditionally launch create table for tool_claytondarl.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Claytondarl savepoint reached.
        upgrade_plugin_savepoint(true, 2021012410, 'tool', 'claytondarl');
    }
    return $result;
}
?>