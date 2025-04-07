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
 * Other tests for block_verify_certificate.
 *
 * @package    block_verify_certificate
 * @category   test
 * @copyright  2021 onwards i+academy (www.iplusacademy.org)
 * @author     Renaat Debleu <info@eWallah.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_verify_certificate;

use stdClass;

/**
 * Other tests for block_verify_certificate
 *
 * @package    block_verify_certificate
 * @category   test
 * @copyright  2021 onwards i+academy (www.iplusacademy.org)
 * @author     Renaat Debleu <info@eWallah.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class block_test extends \advanced_testcase {
    /**
     * Test block.
     * @covers \block_verify_certificate
     */
    public function test_block(): void {
        global $CFG;
        require_once($CFG->dirroot . '/blocks/moodleblock.class.php');
        require_once($CFG->dirroot . '/blocks/verify_certificate/block_verify_certificate.php');
        $this->resetAfterTest();
        $this->setAdminUser();
        $block = new \block_verify_certificate();
        $this->assertCount(1, $block->applicable_formats());
        $this->assertFalse($block->instance_allow_multiple());
        $this->assertFalse($block->instance_allow_config());
        $this->assertFalse($block->has_config());

        $content = $block->get_content();
        $this->assertStringContainsString('Enter certificate code to verify', $content->text);
        $content = $block->get_content();
        $this->assertStringContainsString('Enter certificate code to verify', $content->text);
    }
}
