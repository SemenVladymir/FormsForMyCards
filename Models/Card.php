<?php
class Card implements JsonSerializable
{
    public mixed $title;
    public mixed $text;
    public mixed $createDate;

    public function __construct($title, $text="", $createdate="")
    {
        $this->title=$title;
        $this->text = $text;
        $this->createDate = $createdate;
    }

    /**
     * @return mixed
     */
    public function getTitle(): mixed
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle(mixed $title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCreateDate(): mixed
    {
        return $this->createDate;
    }

    /**
     * @return mixed
     */
    public function getText(): mixed
    {
        return $this->text;
    }

    /**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate): void
    {
        $this->createDate = $createDate;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    public function jsonSerialize() : mixed
    {
        return get_object_vars($this);
    }
}