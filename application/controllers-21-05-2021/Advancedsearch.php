<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advancedsearch extends CI_Controller {


	public function __construct() {
       parent::__construct();
	    
       $this->load->library("session");
       $this->load->helper('url');
	   $this->load->model('Advancedsearch_Model');
	   $this->load->model('Dashboard_model');
	   $this->load->library("pagination");
	
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
	
	public function searchViewData(){
		 if(isset($_POST['viewDataList'])){
			$data['jsonPostData'] = $_POST['postdata']; 
			$data['postData'] = unserialize($_POST['postdata']); 
		}
		if(isset($_POST['viewSearchList'])){
			$data['jsonPostData'] = $_POST['postdata']; 
			$postdataobj = json_decode($_POST['postdata']); 
			$data['postData'] = (array) $postdataobj;
			
		}
		$data['zip'] =$this->Advancedsearch_Model->getAllZip();
		$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
		$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
		$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
		$data['ward'] =$this->Advancedsearch_Model->getAllWard();
		$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();	
		$data['usersInformation'] =$this->Dashboard_model->getUsersInformation();	
		$this->load->view('templates/header');
		$this->load->view('home/search-view-data',$data);
		$this->load->view('templates/footer');
	}
	//Pagination Seller
	public function loadRecordForSearch($rowno=0){
	    $rowno =$_POST['pagno'];
		// Row per page
		$rowperpage = 20;
		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
      	
      	// All records count
      	$allcount = $this->Advancedsearch_Model->getrecordCountForSearch();
		// Get  records
      	$users_record = $this->Advancedsearch_Model->getDataForSearch($rowno,$rowperpage);
      	
      	// Pagination Configuration
      	$config['base_url'] = base_url().'home/loadRecordForSearch';
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
	public function viewSingleRecord($id){
		$data['records'] =$this->Advancedsearch_Model->viewSingleRecord($id);	
		$this->load->view('templates/header');
		$this->load->view('home/view-single-record',$data);
		$this->load->view('templates/footer');
	}
	
	
}

	