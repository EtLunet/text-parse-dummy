<?php
/**
 * Created by PhpStorm.
 * User: hillburn
 * Date: 2/28/19
 * Time: 10:59 AM
 */

namespace Parsers;


use Entities\TodoListEntry;

class PriorityParser {

    /**
     * @param TodoListEntry $todoListEntry
     */
    public function parseInput($todoListEntry) {
        $inputSplit = $todoListEntry->getPlainText();

        $filteredInputSplit = $inputSplit;
        foreach ($inputSplit as $element) {
            if (substr($element, 0, 2) === '!p') {
                $todoListEntry->setPriority(substr($element, 2));
                $filteredInputSplit = array_diff($filteredInputSplit, array($element));
            }
        }

        $todoListEntry->setPlainText($filteredInputSplit);
    }
}