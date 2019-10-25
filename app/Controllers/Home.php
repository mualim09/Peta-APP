<?php

namespace App\Controllers;
use App\Models\HomeModel;
use CodeIgniter\Controller;
use CodeIgniter\Test\FeatureTestCase;
class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------
	public function hellow()
	{
		echo "Hello World!";
	}

	public function mainMaps()
	{
		$apiKey1 = "AIzaSyD-bs55VRs1UNACjvjLt9y5jF5gHXtNaqQ";
		$apiKey = "AIzaSyBbn46MVj1kbVCtIzLbeGWIdxrwuogdOTo";
		$data = array('apiKey' => $apiKey,
					  'title' => "Main Maps");
		

		echo view('pages/maps', $data);
	}

	public function xml()
	{
		//$this->load->HomeModel();
		$sql = "select * from location";
		$model = new HomeModel();
		$data = array('xml' => $model->generate(),
					  'title' => 'Judul',
					 );
		//var_dump($data);
		//var_dump($resultXML);
		/*
		$config = array (
        'root'    => 'root',
        'element' => 'element',
        'newline' => "\n",
        'tab'     => "\t"
    	);*/

		//$xml = $this->getXML->xml_from_result($sql, $config);
		//$this->load->helper('download');
		//force_download('myfile.xml', $xml);
		echo view('pages/testxml', $data);
	}

	public function tesdbutil()
	{
		$model = new class extends \CodeIgniter\Model {
			protected $table      = 'location';
			protected $primaryKey = 'id';
		};
		$db = \Closure::bind(function ($model) {
			return $model->db;
		}, null, $model)($model);

		$util = (new \CodeIgniter\Database\Database())->loadUtils($db);
		var_dump($util->getXMLFromResult($model->get()));
	}

	public function multipleMaps()
	{
		$apiKey = "AIzaSyBbn46MVj1kbVCtIzLbeGWIdxrwuogdOTo";
		$data = array('apiKey' => $apiKey,
					  'title' => "Main Maps");
		

		echo view('pages/multiplemaps', $data);
	}
}
