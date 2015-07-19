<?php

/**
 * Library    information
 *
 * @package   mod_appaer
 * @copyright 2105 onwards Alok Kumar Rai alokr.mail@gmail.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function appear_add_instance($data) {
    global $DB;

    $appear = new stdClass();
    $appear->course = $data->course;
    $appear->name = $data->name;
    $appear->intro = $data->intro;
    $appear->revision = $data->revision;
    $appear->timemodified = time();
    $appear->timecreated = time();
    $appear->timestart = $data->starttime;
    $appear->id = $DB->insert_record('appear', $appear);

    return $appear->id;
}

function appear_update_instance($id) {
    
}

function appear_delete_instance($id) {
     global $DB;

    if (!$book = $DB->get_record('appear', array('id'=>$id))) {
        return false;
    }

    $DB->delete_records('appear', array('bookid'=>$book->id));
    $DB->delete_records('appear_group', array('id'=>$book->id));

    return true;
}

function appear_user_complete() {
    
}

function appear_cron()
{
    
}
function can_uninstall_plugin()
{
    return true;
}