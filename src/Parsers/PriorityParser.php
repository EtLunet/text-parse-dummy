<?php

namespace Parsers;


use Entities\TodoListEntry;
use Exception;

class PriorityParser {

    public static function parseInput(TodoListEntry $todoListEntry): TodoListEntry {
        $tokenizedText = $todoListEntry->getTokenizedText();

        // filter any token that starts with '!p'
        $priorities = array_filter(
            $tokenizedText,
            function ($token) {
                return substr($token, 0, 2) === '!p';
            }
        );

        $foundPrioritiesAmount = sizeof($priorities);
        if ($foundPrioritiesAmount > 1) {
            throw new Exception('Must not provide more than one priority.');
        }
        if ($foundPrioritiesAmount === 0) {
            // without a found priority, this parser has no work to do
            return $todoListEntry;
        }
        // reindex array in order to move the found priority to index 0
        $priorities = array_values($priorities);
        // cut off '!p' from the priority
        $priority = substr($priorities[0], 2);

        if (!is_numeric($priority)) {
            throw new Exception('Given priority is not numeric.');
        }

        // remove found priority from tokens
        $tokenizedText = array_diff($tokenizedText, $priorities);

        return new TodoListEntry($tokenizedText, $todoListEntry->getTags(), $priority, $todoListEntry->getDate());
    }
}