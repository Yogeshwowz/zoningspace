<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Dashboard_model');
        $this->load->model('Advancedsearch_Model');
		 $this->load->model('Csv_model');
    }
	// User Dash Board
		public function searchSaved($page = 'search-saved'){
			if (!file_exists(APPPATH.'views/userdashboard/'.$page.'.php')) {
					show_404();
			}
			$data['savedSearch'] = $this->Dashboard_model->getSavedSearch();
			$data['title'] = 'Search Saved';
			$this->load->view('templates/header');
			$this->load->view('userdashboard/'.$page, $data);
			$this->load->view('templates/footer');
		}
		public function viewSaveSearch(){
			$resultUser = $this->Advancedsearch_Model->getUserIpAddress();
			if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==1 && (empty($this->session->userdata('email')))){
			redirect('/'); 
			}else{
				if(isset($_POST['searchid'])){ 
				$id = $_POST['searchid'];
					$result = $this->Dashboard_model->getSavedSearchByID($id);
					$postData = json_decode($result['search_data']);
					$data['postData'] = (array) $postData;
				}
				$data['zip'] =$this->Advancedsearch_Model->getAllZip();
				$data['zoning'] =$this->Advancedsearch_Model->getAllZoning();
				$data['pro_use'] =$this->Advancedsearch_Model->getAllProUse();
				$data['neighborhood'] =$this->Advancedsearch_Model->getAllNeighborhood();
				$data['ward'] =$this->Advancedsearch_Model->getAllWard();
				$data['tax_deduction'] =$this->Advancedsearch_Model->getAllTaxDeduction();
				$this->load->view('templates/header');
				$this->load->view('home/searching',$data);
				$this->load->view('templates/footer');
			}
		
		}
		
		public function addcart($id){
			$result = $this->Dashboard_model->addcart($id);
			if($result){ redirect('cart');}else{  redirect('cart');
			}
		}
		
		
		public function cart($page = 'cart'){
		if (!file_exists(APPPATH.'views/home/'.$page.'.php')) {
					show_404();
			}
		$data['title'] = 'cart';
		$data['cart'] =$this->Dashboard_model->getCart();
		$this->load->view('templates/header');
		$this->load->view('home/'.$page, $data);
		$this->load->view('templates/footer');
		}
		public function removeCartItem(){
			$result = $this->Dashboard_model->removeCartItem();
			if($result){ echo 1;}
		}
		public function buySearch($page = 'buy-search'){
			if (!file_exists(APPPATH.'views/userdashboard/'.$page.'.php')) {
					show_404();
			}
			$data['buySearch'] = $this->Dashboard_model->getbuySearch();
			$data['title'] = 'Search Saved';
			$this->load->view('templates/header');
			$this->load->view('userdashboard/'.$page, $data);
			$this->load->view('templates/footer');
		}
		
		public function buysinglesearch(){
			$id = $_POST['id'];
			$res = $this->Dashboard_model->buysinglesearch($id);
			echo 1;
		}
    
	
	public function buySavesearch(){
		$res = $this->Dashboard_model->buySavesearch();
		echo 1; 
	}
	public function DownloadSearchData(){
		
		if(isset($_POST['DownloadSearch'])){
				$result = $this->Csv_model->CreateCsvFile();
				
				$filename = date("d-m-Y").'_'.$result['userID'].'_'.rand().' properties.csv';
				//$csvname="/home/gbwkke9cev7f/public_html/realstate/assets/csv/".$filename;
				$csvname = $_SERVER['DOCUMENT_ROOT'].'/realstate/assets/csv/'.$filename;
				

				$fileopen=fopen($csvname,'w');
				$file_content='"Id"'.',"'.'Owner Name'.'","'.'Premises'.'","'.'zip'.'","'.'Pro Use'.'","'.'Address'.'","'.'Homestead Tax Deduction'.'","'.'zoning'.'","'.'ward'.'","'.'neighbourhood'.'","'.'Square Lot'.'","'.'Land Area'.'","'.'Sale Date'.'","'.'Parse For Debug'.'","'.'Sale Price'.'","'.'Recordation Date'.'","'.'Total tax Assessment 2019'.'","'.'Date'.'","'.'Number of Families'.'","'.'Bed Room'.'","'.'Bath Room'.'","'.'Square Feet'.'","'.'Price Per Square Feet'.'","'.'Year Built'.'","'.'Year Renovated'.'","'.'Tax Record'.'","'.'Taxable Value Total'.'","'.'Square'.'","'.'Lot'.'","'.'Merged Square Lot'.'","'.'Email'.'","'.'Contact Number'.'"'."\r\n";
				if(count($result) > 0){
				foreach($result['result'] as $exportcsv_fetch){
					$file_content.='"'.$exportcsv_fetch['id'].'","'.$exportcsv_fetch['owner_names'].'","'.$exportcsv_fetch['premises'].'","'.$exportcsv_fetch['zip'].'","'.$exportcsv_fetch['pro_use'].'","'.$exportcsv_fetch['address'].'","'.$exportcsv_fetch['homestead_tax_deduction'].'","'.$exportcsv_fetch['zoning'].'","'.$exportcsv_fetch['ward'].'","'.$exportcsv_fetch['neighborhood'].'","'.$exportcsv_fetch['square_lot'].'","'.$exportcsv_fetch['land_area'].'","'.$exportcsv_fetch['sale_date'].'","'.$exportcsv_fetch['parse_for_debug'].'","'.$exportcsv_fetch['sale_price'].'","'.$exportcsv_fetch['recordation_date'].'","'.$exportcsv_fetch['total_tax_assessment_2019'].'","'.$exportcsv_fetch['date'].'","'.$exportcsv_fetch['number_of_families'].'","'.$exportcsv_fetch['beds'].'","'.$exportcsv_fetch['bath'].'","'.$exportcsv_fetch['square_feet'].'","'.$exportcsv_fetch['price_per_square_feet'].'","'.$exportcsv_fetch['year_built'].'","'.$exportcsv_fetch['year_renovated'].'","'.$exportcsv_fetch['tax_record'].'","'.$exportcsv_fetch['taxable_value_total'].'","'.$exportcsv_fetch['square'].'","'.$exportcsv_fetch['lot'].'","'.$exportcsv_fetch['merged_square_lot'].'","'.$exportcsv_fetch['contactEmail'].'","'.$exportcsv_fetch['contactPhone'].'"'."\r\n";
				}
				$filewrite=fwrite($fileopen,$file_content);
				fclose($fileopen);
				}
				else{
					$file_content .= "There are no vehicles to display";
					$filewrite    = fwrite($fileopen,$file_content);
					fclose($fileopen);
				}
				//header('Content-Type: application/csv');
				//header("Content-Type: application/force-download");
				//header('Content-Disposition: attachment; filename='.$filename);
				//readfile($csvname);
				echo   $filename;
				 
		}
		
	}
	
	public function DownloadSearchDataForReSearcherNotEmpty(){
		$result = $this->Csv_model->DownloadSearchDataForReSearcherNotEmpty();
		$filename = date("d-m-Y").'_'.rand().' properties.csv';
		$csvname = $_SERVER['DOCUMENT_ROOT'].'/realstate/assets/csv/'.$filename;
		//$csvname="/home/gbwkke9cev7f/public_html/realstate/assets/csv/".$filename;		

				$fileopen=fopen($csvname,'w');
				$file_content='"Id"'.',"'.'Owner Name'.'","'.'Premises'.'","'.'zip'.'","'.'Pro Use'.'","'.'Address'.'","'.'Homestead Tax Deduction'.'","'.'zoning'.'","'.'ward'.'","'.'neighbourhood'.'","'.'Square Lot'.'","'.'Land Area'.'","'.'Sale Date'.'","'.'Parse For Debug'.'","'.'Sale Price'.'","'.'Recordation Date'.'","'.'Total tax Assessment 2019'.'","'.'Date'.'","'.'Number of Families'.'","'.'Bed Room'.'","'.'Bath Room'.'","'.'Square Feet'.'","'.'Price Per Square Feet'.'","'.'Year Built'.'","'.'Year Renovated'.'","'.'Tax Record'.'","'.'Taxable Value Total'.'","'.'Square'.'","'.'Lot'.'","'.'Merged Square Lot'.'","'.'Email 1'.'","'.'Email 2'.'","'.'Email 3'.'","'.'Email 4'.'","'.'Phone 1'.'","'.'Phone 2'.'","'.'Phone 3'.'","'.'Phone 4'.'","'.'Phone 5'.'","'.'Phone 6'.'","'.'Phone 7'.'","'.'Phone 8'.'","'.'Phone 9'.'"'."\r\n";
				if(count($result) > 0){
				foreach($result as $exportcsv_fetch){
					$file_content.='"'.$exportcsv_fetch['id'].'","'.$exportcsv_fetch['owner_names'].'","'.$exportcsv_fetch['premises'].'","'.$exportcsv_fetch['zip'].'","'.$exportcsv_fetch['pro_use'].'","'.$exportcsv_fetch['address'].'","'.$exportcsv_fetch['homestead_tax_deduction'].'","'.$exportcsv_fetch['zoning'].'","'.$exportcsv_fetch['ward'].'","'.$exportcsv_fetch['neighborhood'].'","'.$exportcsv_fetch['square_lot'].'","'.$exportcsv_fetch['land_area'].'","'.$exportcsv_fetch['sale_date'].'","'.$exportcsv_fetch['parse_for_debug'].'","'.$exportcsv_fetch['sale_price'].'","'.$exportcsv_fetch['recordation_date'].'","'.$exportcsv_fetch['total_tax_assessment_2019'].'","'.$exportcsv_fetch['date'].'","'.$exportcsv_fetch['number_of_families'].'","'.$exportcsv_fetch['beds'].'","'.$exportcsv_fetch['bath'].'","'.$exportcsv_fetch['square_feet'].'","'.$exportcsv_fetch['price_per_square_feet'].'","'.$exportcsv_fetch['year_built'].'","'.$exportcsv_fetch['year_renovated'].'","'.$exportcsv_fetch['tax_record'].'","'.$exportcsv_fetch['taxable_value_total'].'","'.$exportcsv_fetch['square'].'","'.$exportcsv_fetch['lot'].'","'.$exportcsv_fetch['merged_square_lot'].'","'.$exportcsv_fetch['email1'].'","'.$exportcsv_fetch['email2'].'","'.$exportcsv_fetch['email3'].'","'.$exportcsv_fetch['email4'].'","'.$exportcsv_fetch['phone1'].'","'.$exportcsv_fetch['phone2'].'","'.$exportcsv_fetch['phone3'].'","'.$exportcsv_fetch['phone4'].'","'.$exportcsv_fetch['phone5'].'","'.$exportcsv_fetch['phone6'].'","'.$exportcsv_fetch['phone7'].'","'.$exportcsv_fetch['phone8'].'","'.$exportcsv_fetch['phone9'].'"'."\r\n";
				}
				$filewrite=fwrite($fileopen,$file_content);
				fclose($fileopen);
				}
				else{
					$file_content .= "There are no vehicles to display";
					$filewrite    = fwrite($fileopen,$file_content);
					fclose($fileopen);
				}
				header('Content-Type: application/csv');
				header("Content-Type: application/force-download");
				header('Content-Disposition: attachment; filename='.$filename);
				readfile($csvname);
	}
	


	public function DownloadSearchDatalimit5(){
		
		if(isset($_POST['DownloadSearch'])){
				$result = $this->Csv_model->CreateCsvFilelimit5();
				
				$filename = date("d-m-Y").'_'.$result['userID'].'_'.rand().' properties.csv';
				//$csvname="/home/gbwkke9cev7f/public_html/realstate/assets/csv/".$filename;
				$csvname = $_SERVER['DOCUMENT_ROOT'].'/realstate/assets/csv/'.$filename;
				

				$fileopen=fopen($csvname,'w');
				$file_content='"Id"'.',"'.'Owner Name'.'","'.'Premises'.'","'.'zip'.'","'.'Pro Use'.'","'.'Address'.'","'.'Homestead Tax Deduction'.'","'.'zoning'.'","'.'ward'.'","'.'neighbourhood'.'","'.'Square Lot'.'","'.'Land Area'.'","'.'Sale Date'.'","'.'Parse For Debug'.'","'.'Sale Price'.'","'.'Recordation Date'.'","'.'Total tax Assessment 2019'.'","'.'Date'.'","'.'Number of Families'.'","'.'Bed Room'.'","'.'Bath Room'.'","'.'Square Feet'.'","'.'Price Per Square Feet'.'","'.'Year Built'.'","'.'Year Renovated'.'","'.'Tax Record'.'","'.'Taxable Value Total'.'","'.'Square'.'","'.'Lot'.'","'.'Merged Square Lot'.'","'.'Email'.'","'.'Contact Number'.'"'."\r\n";
				if(count($result) > 0){
				foreach($result['result'] as $exportcsv_fetch){
					$file_content.='"'.$exportcsv_fetch['id'].'","'.$exportcsv_fetch['owner_names'].'","'.$exportcsv_fetch['premises'].'","'.$exportcsv_fetch['zip'].'","'.$exportcsv_fetch['pro_use'].'","'.$exportcsv_fetch['address'].'","'.$exportcsv_fetch['homestead_tax_deduction'].'","'.$exportcsv_fetch['zoning'].'","'.$exportcsv_fetch['ward'].'","'.$exportcsv_fetch['neighborhood'].'","'.$exportcsv_fetch['square_lot'].'","'.$exportcsv_fetch['land_area'].'","'.$exportcsv_fetch['sale_date'].'","'.$exportcsv_fetch['parse_for_debug'].'","'.$exportcsv_fetch['sale_price'].'","'.$exportcsv_fetch['recordation_date'].'","'.$exportcsv_fetch['total_tax_assessment_2019'].'","'.$exportcsv_fetch['date'].'","'.$exportcsv_fetch['number_of_families'].'","'.$exportcsv_fetch['beds'].'","'.$exportcsv_fetch['bath'].'","'.$exportcsv_fetch['square_feet'].'","'.$exportcsv_fetch['price_per_square_feet'].'","'.$exportcsv_fetch['year_built'].'","'.$exportcsv_fetch['year_renovated'].'","'.$exportcsv_fetch['tax_record'].'","'.$exportcsv_fetch['taxable_value_total'].'","'.$exportcsv_fetch['square'].'","'.$exportcsv_fetch['lot'].'","'.$exportcsv_fetch['merged_square_lot'].'","'.$exportcsv_fetch['contactEmail'].'","'.$exportcsv_fetch['contactPhone'].'"'."\r\n";
				}
				$filewrite=fwrite($fileopen,$file_content);
				fclose($fileopen);
				}
				else{
					$file_content .= "There are no vehicles to display";
					$filewrite    = fwrite($fileopen,$file_content);
					fclose($fileopen);
				}
				//header('Content-Type: application/csv');
				//header("Content-Type: application/force-download");
				//header('Content-Disposition: attachment; filename='.$filename);
				//readfile($csvname);
				echo   $filename;
				 
		}
		
	}
		
		
	
   
}

?>