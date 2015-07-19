<?php
/**
 * Locallib   information
 *
 * @package   mod_appaer
 * @copyright 2105 onwards Alok Kumar Rai alokr.mail@gmail.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace mod_appear\event;
class appear extends \core\event\base
{
    protected function init() {
         $this->data['crud'] = 'c';
        $this->data['edulevel'] = self::LEVEL_TEACHING;
        $this->data['objecttable'] = 'appear'; 
    }
    public function get_url() {
     
    }

}