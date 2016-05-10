<?php
namespace bbailey4\class6;

interface ISongRepository
{
    public function saveSong($song);
    public function getAllSongs();
    public function getSongById($id);
    public function deleteSong($songId);
}