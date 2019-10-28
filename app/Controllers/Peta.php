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
		$data = array(
			'title' => 'Peta Lokasi Wisata Tangerang Selatan',
			'fileXml' => base_url("xml/markers.xml"),
			'googleMapsApi' => 'AIzaSyBbn46MVj1kbVCtIzLbeGWIdxrwuogdOTo' );

		echo view('template/header', $data);
		echo view('page/maps', $data);

	}

	public function generateXML()
	{
		$model = new PetaModel();
		$listing = $model->getListing();
		$markers = fluidxml('markers');

		foreach ($listing as $dataListing) {
			$markers->add([ ['marker'] ], ['id' => $dataListing['id'], 'name' => $dataListing['name'], 'address' => $dataListing['address'], 'lat' => $dataListing['lat'], 'lng' => $dataListing['lng'], 'type' => $dataListing['type'], 'description' => $dataListing['description'], 'image' => $dataListing['image'] ]);
		}
		
		$markers->save('xml/markers.xml', true);
	}

}