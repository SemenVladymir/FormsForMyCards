<?php
include 'Card.php';
class CardWithPhone extends Card implements JsonSerializable
{
    public mixed $phone;

    public function __construct($title, $text="", $createdate="", $phone="")
    {
        parent::__construct($title, $text, $createdate);
        $this->phone = $phone;
    }

    /**
     * @return mixed|string
     */
    public function getPhone(): mixed
    {
        return $this->phone;
    }

    /**
     * @param mixed|string $phone
     */
    public function setPhone(mixed $phone): void
    {
        $this->phone = $phone;
    }
    public function jsonSerialize() : mixed
    {
        return ['title'=>parent::getTitle(),'text'=>parent::getText(),
            'createDate'=>parent::getCreateDate(),'phone'=>$this->phone];
    }

}