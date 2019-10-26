<?php

namespace App\Controllers;
use App\Models\PetaModel;
use CodeIgniter\Controller;
//use App\Libraries\DOMNode;
//use App\Libraries\DOMDocument;
//use App\Libraries\FluidXml\FluidXml;
//require_once ROOTPATH . 'vendor/autoload.php';
use \FluidXml\FluidXml;
use \FluidXml\FluidNamespace;
use function \FluidXml\fluidxml;
use function \FluidXml\fluidns;
use function \FluidXml\fluidify;
class Peta extends BaseController
{	
	protected $domdoc;
	public function index()
	{
		$model = new PetaModel();
		$listing = $model->getListing();
		//print_r($listing);
        /*$data = [
                'peta'  => $model->getListing(),
                'title' => 'Data Peta',
        ];*/

        $markers = [];
        $infowindow = [];
 
        /*foreach($listing->getResultArray() as $dataListing) {
          $markers[] = [
            $dataListing['name'], $dataListing['lat'], $dataListing['long']
          ];          
          $infowindow[] = [
           "<div class=info_content><h3>".$dataListing['name']."</h3><p>".$dataListing['description']."</p></div>"
          ];
        }*/

        foreach ($listing as $dataListing) {
          $markers[] = [
            $dataListing['name'], $dataListing['lat'], $dataListing['long']
          ];          
          $infowindow[] = [
           "<div class=info_content><h3>".$dataListing['name']."</h3><p>".$dataListing['description']."</p></div>"
          ];
        }

        $location['markers'] = json_encode($markers);
        $location['infowindow'] = json_encode($infowindow);
     

        //echo view('templates/header', $data);
        echo view('pages/displayListing', $location);
        //echo view('templates/footer');
	}

	public function view($slug = null)
	{
		$model = new NewsModel();

		$data['news'] = $model->getNews($slug);
	}

	public function xml()
	{
		//$domClass = new \Libraries\DOMDocument();
		$model = new PetaModel();
		$listing = $model->getListing();
		/*
		$dom->encoding = 'utf-8';
		$dom->xmlVersion = '1.0';
		$dom->formatOutput = true;
		$xml_file_name = 'peta_list.xml';

		$root = $dom->createElement('markers');
		foreach ($listing as $dataListing) {
			$marker = $dom->createElement('marker');
			$id = new DOMAttr('id', $dataListing['id']);
			$name = new DOMAttr('name', $dataListing['name']);
		
		$marker_node->setAttributeNode($attr_movie_id);

		$child_node_title = $dom->createElement('Title', 'The Campaign');

		$movie_node->appendChild($child_node_title);

		$child_node_year = $dom->createElement('Year', 2012);

		$movie_node->appendChild($child_node_year);

		$child_node_genre = $dom->createElement('Genre', 'The Campaign');

		$movie_node->appendChild($child_node_genre);

		$child_node_ratings = $dom->createElement('Ratings', 6.2);

		$movie_node->appendChild($child_node_ratings);

		$root->appendChild($marker);

		$dom->appendChild($root);
		}
		$dom->save($xml_file_name);

		echo "$xml_file_name has been successfully created";*/
		
		$book = fluidxml();
		$book->add('title',  'The Theory Of Everything')
     	->add('author', 'S. Hawking')
     	->add('description')
		->save('../xml/book2.xml', true);
		echo $book;
		 //echo getcwd();
	}
}