<?php

namespace Entities;


use DateTime;

class TodoListEntry {

    /**
     * @var array
     */
    private $tokenizedText;

    /**
     * @var array
     */
    private $tags;

    /**
     * @var int
     */
    private $priority;

    /**
     * @var DateTime
     */
    private $date;

    public function __construct(array $tokenizedText, array $tags = [], int $priority = 0, DateTime $date = null) {
        $this->tokenizedText = $tokenizedText;
        $this->tags = $tags;
        $this->priority = $priority;
        $this->date = $date;
    }

    public function getTokenizedText(): array {
        return $this->tokenizedText;
    }

    public function getPlainTextMessage(): string {
        return implode(" ", $this->tokenizedText);
    }

    public function getTags(): array {
        return $this->tags;
    }

    public function getPriority(): int {
        return $this->priority;
    }

    public function getDate() {
        return $this->date;
    }
}