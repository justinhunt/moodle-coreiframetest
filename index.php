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
 * List all instances of the module in a course.
 *
 * @package    mod_coreiframetest
 * @copyright  2025
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');

$id = required_param('id', PARAM_INT); // Course id.

$course = get_course($id);
require_login($course);
$PAGE->set_url('/mod/coreiframetest/index.php', ['id' => $id]);
$PAGE->set_heading($course->fullname);
$PAGE->set_title(get_string('modulenameplural', 'mod_coreiframetest'));

echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('modulenameplural', 'mod_coreiframetest'));

echo $OUTPUT->notification('This is a bare-bones example module.');

echo $OUTPUT->footer();
