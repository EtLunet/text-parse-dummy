<?php
/**
 * Created by PhpStorm.
 * User: hillburn
 * Date: 2/28/19
 * Time: 10:21 AM
 */

namespace Entities;


use DateTime;

class TodoListEntry {

    /**
     * @var array
     */
    private $plainText;

    /**
     * @var array
     */
    private $tags = [];

    /**
     * @var int
     */
    private $priority = 0;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * TodoListEntry constructor.
     * @param array $plainText
     */
    public function __construct($plainText) {
        $this->plainText = $plainText;
    }

    /**
     * @return array
     */
    public function getPlainText() {
        return $this->plainText;
    }

    /**
     * @param array $plainText
     */
    public function setPlainText($plainText) {
        $this->plainText = $plainText;
    }

    /**
     * @param string $tag
     */
    public function addTag($tag) {
        array_push($this->tags, $tag);
    }

    /**
     * @return int
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority) {
        $this->priority = $priority;
    }

    /**
     * @return DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date) {
        $this->date = $date;
    }
}