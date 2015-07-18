<?php

/**
 * language   information
 *
 * @package   mod_appaer
 * @copyright 2105 onwards Alok Kumar Rai alokr.mail@gmail.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function appear_add_instance($data)
{
   global $DB;
    
    $appear= new stdClass();
    $appear->course= $data->course;
    $appear->name = $data->name;
    $appear->intro= $data->intro;
    $appear->revision =$data->revision;
    $appear->timemodified  = time();
    $appear->id = $DB->insert_record('appear',$appear);
   
    return $appear->id;
}
function appaer_view()
{
    
}