<?php

// src/AppBundle/Controller/SongController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Song;
use AppBundle\SqliteSongRepository;

class SongController extends Controller
{
    /**
     * @Route("/song/create", name="createsong")
     */
    public function createSongAction(Request $request)
    {
        $song = new Song();
        // $song->setTitle('Test Song');
        // $song->setRating('5');

        $form = $this->createFormBuilder($song)
        ->add('title', 'text')
        ->add('rating', 'text', array('required' => false))
        ->add('save', 'submit', array('label' => 'Create Song'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            // save to database
            
            $songRepo = new SqliteSongRepository($this->get('kernel')->getRootDir());
            $songRepo->saveSong($song);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('song/createsong.html.twig', array(
                'form' => $form->createView(),
            ));
    }
}