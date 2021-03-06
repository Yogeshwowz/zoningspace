<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advancedsearch extends CI_Controller {


	public function __construct() {
       parent::__construct();
	    
       $this->load->library("session");
       $this->load->helper('url');
	   $this->load->model('Advancedsearch_Model');
	   $this->load->library("pagination");
	
    }

	public function getuserdata(){
		$result = $this->Advancedsearch_Model->getuserdata();
		echo json_encode($result);
	
	}
	public function saveSearch(){
	  $result = $this->Advancedsearch_Model->saveSearch();
	  echo $result;
		
	}
	
	public function searchingMap(){
	 if(isset($_POST['submitBtn'])){ 
			$data['postData'] = $_POST; 
				$data['jsonPostData'] = serialize($_POST);
				$result = $this->Advancedsearch_Model->saveSearchData($data['jsonPostData']);
				$mayarray = array();
				$mayarray['lat'] = $_POST['lat'];
				$mayarray['lng'] = $_POST['lng'];
				$mayarray['address'] = $_POST['searchboxForAddress'];
				$mayarray['place_id'] = $_POST['place_id'];
				$data['mapdraw'] = $mayarray;
			}
		$data['searchid'] = $this->Advancedsearch_Model->getLastSavedSearch();
		$this->load->view('templates/header');
		$this->load->view('home/view-data',$data);
		$this->load->view('templates/footer');
	}
	public function searchingViewData(){
		$this->load->view('templates/header');
		$this->load->view('home/search-view-data',$data);
		$this->load->view('templates/footer');
	}
	
	
	//Pagination  For Advanced search
	public function loadRecordForSearch($rowno=0){
	    $rowno =$_POST['pagno'];
		// Row per page
		$rowperpage = 5;
		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
      	
      	// All records count
      	$allcount = $this->Advancedsearch_Model->getrecordCountForSearch();
		// Get  records
      	$users_record = $this->Advancedsearch_Model->getDataForSearch($rowno,$rowperpage);
      	
      	// Pagination Configuration
      	$config['base_url'] = base_url().'advancedsearch/loadRecordForSearch';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['anchor_class'] = 'class="number" ';
		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;
		$data['allcount'] = $allcount;
		echo json_encode($data);
		
	}
	
}

	