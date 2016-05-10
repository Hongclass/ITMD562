<?php

namespace hzhan121\as3;

class Note {
    private $id;
    private $subject;
    private $author;
    private $content;
    private $characterCount;
    private $createTime;

    public function __construct(){
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCharacterCount()
    {
        return $this->characterCount;
    }

    public function setCharacterCount($characterCount)
    {
        $this->characterCount = $characterCount;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }
    
}
?>