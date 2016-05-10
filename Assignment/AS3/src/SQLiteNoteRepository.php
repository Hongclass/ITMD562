<?php

namespace hzhan121\as3;

require_once 'INoteRepository.php';
require_once 'Note.php';


class SQLiteNoteRepository implements INoteRepository
{
    private $dbfile = 'data/note_db_pdo.sqlite';
    private $db;

    public function __construct(){
    //open the database
    $this->db = new \PDO('sqlite:' . $this->dbfile);

    //create the table if not exists
    $this->db->exec ("CREATE TABLE IF NOT EXISTS Notes 
        (Id INTEGER PRIMARY KEY, Subject TEXT, Author TEXT, Content TEXT, CharacterCount TEXT, CreateTime TIMESTAMP)");
    }

    public function saveNote($note)
    {
        if ($note->getId()!= '') {
            // Update
            $stmh = $this->db->prepare("UPDATE Notes SET Subject = :subject, Author = :author, 
                Content = :content, CharacterCount = :characterCount,  CreateTime =  :createTime 
                WHERE id = :id");
            $stmh->bindParam(':subject', $note->getSubject());
            $stmh->bindParam(':author', $note->getAuthor());
            $stmh->bindParam(':content', $note->getContent());
            $stmh->bindParam(':characterCount', $note->getCharacterCount());
            $stmh->bindParam(':createTime', $note->getCreateTime());
            $stmh->bindParam(':id', $note->getId());
            $stmh->execute();

        } else {
            //Insert
            $stmh = $this->db->prepare("insert into Notes (Subject, Author, Content, CharacterCount, CreateTime) 
                values (:subject, :author, :content, :characterCount, :createTime)");
            $stmh->bindParam(':subject', $note->getSubject());
            $stmh->bindParam(':author', $note->getAuthor());
            $stmh->bindParam(':content', $note->getContent());
            $stmh->bindParam(':characterCount', $note->getCharacterCount());
            $stmh->bindParam(':createTime', $note->getCreateTime());
            $stmh->execute();
        }
    }

    public function getAllNotes()
    {
        $notelist = array();
        $result = $this->db->query('SELECT * FROM Notes');
        foreach($result as $row) {
            $aNote = new Note();
            $aNote->setId($row['Id']);
            $aNote->setSubject($row['Subject']);
            $aNote->setAuthor($row['Author']);
            $aNote->setContent($row['Content']);
            $aNote->setCharacterCount($row['CharacterCount']);
            $aNote->setCreateTime($row['CreateTime']);
            $notelist[$aNote->getId()] = $aNote;
        }
        return $notelist;
    }

    public function getNoteById($id)
    {
        $stmh = $this->db->prepare("SELECT * from Notes WHERE Id = :id");
        $sid = intval($id);
        $stmh->bindParam(':id', $sid);
        $stmh->execute();
        $stmh->setFetchMode(\PDO::FETCH_ASSOC);

        if ($row = $stmh->fetch()) {
            $aNote = new Note();
            $aNote->setId($row['Id']);
            $aNote->setSubject($row['Subject']);
            $aNote->setAuthor($row['Author']);
            $aNote->setContent($row['Content']);
            $aNote->setCharacterCount($row['CharacterCount']);
            $aNote->setCreateTime($row['CreateTime']);
            return $aNote;
        } else {
            return new Note();
        }
    }

    public function deleteNote($noteId)
    {
        $stmh = $this->db->prepare("DELETE FROM Notes WHERE id = :id");
        $stmh->bindParam(':id', intval($noteId));
        $stmh->execute();
    }

}
