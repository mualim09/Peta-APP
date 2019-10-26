<?php

namespace App\Controllers;
use App\Models\PetaModel;
use CodeIgniter\Controller;
use function \FluidXml\fluidxml;
use function \FluidXml\fluidns;
use function \FluidXml\fluidify;
class Peta extends BaseController
{	

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
		$model = new PetaModel();
		$listing = $model->getListing();
		$markers = fluidxml('markers');
		foreach ($listing as $dataListing) {
			$markers->add([ ['marker'] ], ['id' => $dataListing['id'], 'name' => $dataListing['name'], 'address' => $dataListing['address'], 'lat' => $dataListing['lat'], 'lng' => $dataListing['long'], 'type' => $dataListing['type'], 'description' => $dataListing['description'], 'image' => $dataListing['image'] ]);
		}
		
		
		$markers->save('../xml/markers.xml', true);
		echo $markers;
	}
}