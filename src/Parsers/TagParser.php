<?php

namespace Parsers;


use Entities\TodoListEntry;

class TagParser {

    public static function parseInput(TodoListEntry $todoListEntry): TodoListEntry {
        $tokenizedText = $todoListEntry->getTokenizedText();

        // filter any token that starts with '#'
        $tags = array_filter(
            $tokenizedText,
            function ($token) {
                return substr($token, 0, 1) === '#';
            }
        );

        // remove found tags from tokens
        $tokenizedText = array_diff($tokenizedText, $tags);

        return new TodoListEntry($tokenizedText, $tags, $todoListEntry->getPriority(), $todoListEntry->getDate());
    }
}