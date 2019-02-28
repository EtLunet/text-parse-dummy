<?php
/**
 * Created by PhpStorm.
 * User: hillburn
 * Date: 2/28/19
 * Time: 10:24 AM
 */

namespace Parsers;


use Entities\TodoListEntry;

class TagParser {


    /**
     * @param TodoListEntry $todoListEntry
     */
    public function parseInput($todoListEntry) {
        $inputSplit = $todoListEntry->getPlainText();

        $filteredInputSplit = $inputSplit;
        foreach ($inputSplit as $element) {
            if (substr($element, 0, 1) === '#') {
                $todoListEntry->addTag($element);
                $filteredInputSplit = array_diff($filteredInputSplit, array($element));
            }
        }

        $todoListEntry->setPlainText($filteredInputSplit);
    }
}