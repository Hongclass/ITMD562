<?php
// src/AppBundle/Entity/Song.php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Song
{
	/**
     * @Assert\NotBlank()
     */
	protected $title = '';

	protected $rating = '';

    protected $id = '';

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

	public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}