<?php
/**
 * Created by PhpStorm.
 * User: briantbailey
 * Date: 9/30/15
 * Time: 7:39 PM
 */

namespace bbailey4\class6;

require_once 'ISongRepository.php';
require_once 'Song.php';


class SqliteSongRepository implements ISongRepository
{
    private $dbfile = 'data/song_db_pdo.sqlite';
    private $db;

    public function __construct(){
        //open the database
        $this->db = new \PDO('sqlite:' . $this->dbfile);

        //create the table if not exists
        $this->db->exec("CREATE TABLE IF NOT EXISTS Songs (Id INTEGER PRIMARY KEY, Title TEXT, Rating TEXT)");
    }

    public function saveSong($song)
    {
        if ($song->getId() != '') {
            //Update

        } else {
            //Insert

        }
        //$dataArray = $this->getAllSongs();
        //$dataArray[$song->getId()] = $song;
        //$serialData = serialize($dataArray);
        //file_put_contents($this->fileName, $serialData);
    }

    public function getAllSongs()
    {
        $songlist = array();
        $result = $this->db->query('SELECT * FROM Songs');
        foreach($result as $row) {
            $aSong = new Song();
            $aSong->setTitle($row['Title']);
            $aSong->setRating($row['Rating']);
            $aSong->setId($row['Id']);
            $songlist[$aSong->getId()] = $aSong;
        }
        return $songlist;
    }

    public function getSongById($id)
    {
        $songList = $this->getAllSongs();
        if (array_key_exists($id, $songList)) {
            return $songList[$id];
        }
    }

    public function deleteSong($songId)
    {
        // TODO: Implement deleteSong() method.
    }


}