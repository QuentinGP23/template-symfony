<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GalerieController extends AbstractController
{
    public function index(): Response
    {

        return $this->render('hello/hello.html.twig');
    }
    public function index2($nom): Response
    {

        return $this->render('hello/hello2.html.twig',array('lenom'=>$nom));
    }
    public function galerie($page){
    	phpinfo();
    	$images = array();
    	for ($i=($page-1)*6+1;$i<=$page*6;$i++){
    		$images[] = "image$i.jpg";	
    	}
    	return $this->render('galerie/galerie.html.twig',array('images'=>$images,'page'=>$page));
    }
    public function add (){
    	$image = new Image();
    	$image->setTitre("lion.jpg");
    	$image->setDate("20/08/2012");
    	$em = $this->getDoctrine()->getManager() ; //Récupérer le manager
		$em->persist($image) ; //Dire à Doctrine de gérer $e1
		$em->flush() ;

    }
}