<?php /** @noinspection SpellCheckingInspection */

/**
 * Created by PhpStorm.
 * User: hillburn
 * Date: 2/28/19
 * Time: 11:09 AM
 */

namespace Parsers;


use DateTime;
use Entities\TodoListEntry;
use Exception;

class TimeParser {

    /**
     * @param TodoListEntry $todoListEntry
     */
    public function parseInput($todoListEntry) {
        $inputSplit = $todoListEntry->getPlainText();

        $filteredInputSplit = $inputSplit;
        foreach ($inputSplit as $element) {
            $date = null;
            try {
                $date = new DateTime($element);
            } catch (Exception $e) {
                // element is not a date, nothing to do
                continue;
            }

            if ($date === null) {
                continue;
            }

            $todoListEntry->setDate($date);
            $filteredInputSplit = array_diff($filteredInputSplit, array($element));
        }

        $todoListEntry->setPlainText($filteredInputSplit);
    }
}