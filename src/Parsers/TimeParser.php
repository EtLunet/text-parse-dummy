<?php /** @noinspection SpellCheckingInspection */

namespace Parsers;


use DateTime;
use Entities\TodoListEntry;
use Exception;

class TimeParser {

    public static function parseInput(TodoListEntry $todoListEntry): TodoListEntry {
        $tokenizedText = $todoListEntry->getTokenizedText();

        // filter any token by being convertable into a date
        $dates = array_filter(
            $tokenizedText,
            function ($token) {
                try {
                    new DateTime($token);
                } catch (Exception $e) {
                    // must catch generic exception, because DateTime doesn't specify the thrown exception
                    // if exception is thrown, the token cannot be converted into a date
                    return false;
                }

                return true;
            }
        );

        $foundDatesAmount = sizeof($dates);
        if ($foundDatesAmount > 1) {
            throw new Exception('Must not provide more than one date.');
        }
        if ($foundDatesAmount === 0) {
            // without a found date, this parser has no work to do
            return $todoListEntry;
        }
        // reindex array in order to move the found priority to index 0
        $dates = array_values($dates);
        $date = $dates[0];

        // remove found date from tokens
        $tokenizedText = array_diff($tokenizedText, $dates);

        /** @noinspection PhpUnhandledExceptionInspection, because the above filtering guarentees that $date is actually a valid date */
        return new TodoListEntry($tokenizedText, $todoListEntry->getTags(), $todoListEntry->getPriority(), new DateTime($date));
    }
}