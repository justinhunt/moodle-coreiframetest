<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Displays a coreiframetest instance.
 *
 * @package    mod_coreiframetest
 * @copyright  2025
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
require_once($CFG->libdir . '/completionlib.php');

$id = required_param('id', PARAM_INT); // Course_module ID.
$embed = optional_param('embed', 0, PARAM_INT); // Embed


$cm = get_coursemodule_from_id('coreiframetest', $id, 0, false, MUST_EXIST);
$course = get_course($cm->course);
$record = $DB->get_record('coreiframetest', ['id' => $cm->instance], '*', MUST_EXIST);
$context = context_module::instance($cm->id);

$PAGE->set_context($context);
$PAGE->set_url('/mod/coreiframetest/view.php', ['id' => $id, 'embed' => $embed]);
$PAGE->set_heading($course->fullname);
$PAGE->set_title(get_string('pluginname', 'mod_coreiframetest'));


require_login($course, true, $cm);
if ($embed == 1) {
    $PAGE->set_pagelayout('embedded');
}

$completion = new completion_info($course);
$completion->set_module_viewed($cm);

echo $OUTPUT->header();

if (!empty($cm->showdescription) && !empty($record->intro)) {
    $intro = format_module_intro('coreiframetest', $record, $cm->id);
    echo $OUTPUT->box($intro, 'generalbox mod_introbox', 'coreiframetestintro');
}

// Render the simple audio recorder UI.
echo $OUTPUT->render_from_template('mod_coreiframetest/dictator', []);



echo $OUTPUT->footer();
