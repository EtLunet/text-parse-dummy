<?php

namespace Parsers;


use Entities\TodoListEntry;

class TextParser {

    public static function parseInput(string $input): TodoListEntry {
        // tokenize input and init the entry
        $todoListEntry = new TodoListEntry(explode(" ", $input));

        // parse by individual criteria
        $todoListEntry = TagParser::parseInput($todoListEntry);
        $todoListEntry = PriorityParser::parseInput($todoListEntry);
        $todoListEntry = TimeParser::parseInput($todoListEntry);
        return $todoListEntry;
    }
}