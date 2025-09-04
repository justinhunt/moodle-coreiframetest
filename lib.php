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
 * Library of interface functions and constants for module coreiframetest
 *
 * @package    mod_coreiframetest
 * @copyright  2025
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Intentionally no MOODLE_INTERNAL guard as per linter guidance for library files.

/**
 * Supports feature list.
 *
 * @param string $feature
 * @return mixed
 */
function coreiframetest_supports($feature) {
    switch ($feature) {
        case FEATURE_MOD_ARCHETYPE:
            return MOD_ARCHETYPE_OTHER;
        case FEATURE_GROUPS:
            return false;
        case FEATURE_GROUPINGS:
            return false;
        case FEATURE_MOD_INTRO:
            return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS:
            return true;
        case FEATURE_GRADE_HAS_GRADE:
            return false;
        case FEATURE_GRADE_OUTCOMES:
            return false;
        case FEATURE_BACKUP_MOODLE2:
            return false;
        case FEATURE_SHOW_DESCRIPTION:
            return true;
        case FEATURE_MOD_PURPOSE:
            return MOD_PURPOSE_OTHER;
        default:
            return null;
    }
}

/**
 * Add instance.
 *
 * @param stdClass $data The data from the form.
 * @param moodleform_mod $mform The form object.
 * @return int New instance ID.
 */
function coreiframetest_add_instance($data, $mform) {
    global $DB;
    $data->timemodified = time();
    return $DB->insert_record('coreiframetest', $data);
}

/**
 * Update instance.
 *
 * @param stdClass $data The data from the form.
 * @param moodleform_mod $mform The form object.
 * @return bool True on success.
 */
function coreiframetest_update_instance($data, $mform) {
    global $DB;
    $data->timemodified = time();
    $data->id = $data->instance;
    return $DB->update_record('coreiframetest', $data);
}

/**
 * Delete instance.
 * @param int $id
 * @return bool
 */
function coreiframetest_delete_instance($id) {
    global $DB;
    if (!$record = $DB->get_record('coreiframetest', ['id' => $id])) {
        return false;
    }
    return $DB->delete_records('coreiframetest', ['id' => $id]);
}

/**
 * List of view actions.
 * @return array
 */
function coreiframetest_get_view_actions() {
    return ['view', 'view all'];
}

/**
 * List of post actions.
 * @return array
 */
function coreiframetest_get_post_actions() {
    return ['add', 'update'];
}
