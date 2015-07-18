<?php


/**
 * Appear view page
 *
 * @package   mod_appaer
 * @copyright 2105 onwards Alok Kumar Rai alokr.mail@gmail.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require(dirname(__FILE__).'/../../config.php');
require_once(dirname(__FILE__).'/locallib.php');
require_once($CFG->libdir.'/completionlib.php');

$id        = optional_param('id', 0, PARAM_INT);        // Course Module ID
$bid       = optional_param('b', 0, PARAM_INT);         // Book id
$chapterid = optional_param('chapterid', 0, PARAM_INT); // Chapter ID
$edit      = optional_param('edit', -1, PARAM_BOOL);    // Edit mode

// =========================================================================
// security checks START - teachers edit; students view
// =========================================================================
if ($id) {
    $cm = get_coursemodule_from_id('appear', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id'=>$cm->course), '*', MUST_EXIST);
    $appear = $DB->get_record('appear', array('id'=>$cm->instance), '*', MUST_EXIST);
} else {
    $appear = $DB->get_record('appear', array('id'=>$bid), '*', MUST_EXIST);
    $cm = get_coursemodule_from_instance('appear', $appear->id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id'=>$cm->course), '*', MUST_EXIST);
    $id = $cm->id;
}

require_course_login($course, true, $cm);

$context = context_module::instance($cm->id);
require_capability('mod/appear:join', $context);





$courseurl = new moodle_url('/course/view.php', array('id' => $course->id));



$PAGE->set_url('/mod/appear/view.php', array('id'=>$id, 'chapterid'=>$chapterid));


// Unset all page parameters.


// Security checks END.


// Read standard strings.
$strappears = get_string('modulenameplural', 'mod_appear');
$strappear  = get_string('modulename', 'mod_appear');


// prepare header
$pagetitle = $appear->name . ": " ;
$PAGE->set_title($pagetitle);
$PAGE->set_heading($course->fullname);
echo $OUTPUT->header();
echo $OUTPUT->heading($appear->name);

echo '<iframe src="https://appear.in/moodle287" width="800" height="640" frameborder="0"></iframe>';

// lower navigation
//echo '<div class="navbottom">'.$chnavigation.'</div>';

echo $OUTPUT->footer();

       
       
  $PAGE->requires->js(new moodle_url('https://developer.appear.in/scripts/appearin-sdk.0.0.4.min.js'));
        $jsmodule = array(
            'name' => 'mod_appear',
            'fullpath' => '/mod/appear/module.js',
            'requires' => array("overlay", "anim", "node")); //on this line you are loading three other YUI modules
        $PAGE->requires->js_init_call('M.mod_appear.init', null, false, $jsmodule);