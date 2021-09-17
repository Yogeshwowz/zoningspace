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
		$this->load->model('administrator_model');
		 $this->load->model('Csv_model');
		 $this->load->library('zip');
		 $this->load->helper(array('email'));
        $this->load->library(array('email'));
    }
	// User Dash Board
		public function dashboard(){
			$data['title'] = 'Dashboard';
			$data['records'] = $this->Dashboard_model->getUsersInformation();
			$this->load->view('templates/header');
			$this->load->view('user-dashboard/dashboard', $data);
			$this->load->view('templates/footer');
		}
		public function Member(){
			$data['title'] = 'Members';
			$data['records'] = $this->Dashboard_model->getUsersInformation();
			$data['members'] = $this->Dashboard_model->getMembers();
			$this->load->view('templates/header');
			$this->load->view('user-dashboard/members', $data);
			$this->load->view('templates/footer');
		}
		
		
		// Save Search
		public function buySearchRecords(){
			$data['buyrecords'] = $this->Dashboard_model->getbuySearch();
			$data['title'] = 'Buy Search';
			$this->load->view('templates/header');
			$this->load->view('user-dashboard/buy-search', $data);
			$this->load->view('templates/footer');
		}
		public function mySaveSearch(){
			$data['title'] = 'My Saved Search';
			$this->load->view('templates/header');
			$this->load->view('user-dashboard/my-save-search', $data);
			$this->load->view('templates/footer');
		}
		
		public function buySearch(){
			$result = $this->Dashboard_model->buySearch();
			echo $result;
		}
		public function downloadSearchRecord(){
			if(!empty($_POST['radio_search_type']) && $_POST['radio_search_type']==1){
					$result = $this->Csv_model->downloadSearchRecordByForm();
			}
			if(!empty($_POST['radio_search_type']) && $_POST['radio_search_type']==2){
				if(!empty($_POST['checkboxarray'])){
					$record_ids = $_POST['checkboxarray'];
					$result = $this->Csv_model->downloadSearchRecordByCheckbox($record_ids);
				}
			}
				$filename = date("d-m-Y").'_'.$this->session->userdata('user_id').'_'.rand().' properties.csv';
					$csvname = $_SERVER['DOCUMENT_ROOT'].'/zoningspace/assets/csv/'.$filename;
					$csvnamezip = date("d-m-Y").'_'.$this->session->userdata('user_id').'_'.rand().' properties.zip';
					$fileopen=fopen($csvname,'w');
					$file_content='"Id"'.',"'.'Owner Name'.'","'.'Premises'.'","'.'zip'.'","'.'Pro Use'.'","'.'Address'.'","'.'Homestead Tax Deduction'.'","'.'zoning'.'","'.'ward'.'","'.'neighbourhood'.'","'.'Square'.'","'.'Land Area'.'","'.'Sale Date'.'","'.'Sale Price'.'","'.'Recordation Date'.'","'.'Date'.'","'.'Bed Room'.'","'.'Bath Room'.'","'.'Square Feet'.'","'.'Price Per Square Feet'.'","'.'Year Built'.'","'.'Year Renovated'.'","'.'Tax Record'.'","'.'Taxable Value Total'.'","'.'Square'.'","'.'Lot'.'","'.'Email'.'","'.'Contact Number'.'"'."\r\n";
				if(count($result) > 0){
				foreach($result as $exportcsv_fetch){
					$file_content.='"'.$exportcsv_fetch['id'].'","'.$exportcsv_fetch['owner_names'].'","'.$exportcsv_fetch['premises'].'","'.$exportcsv_fetch['zip'].'","'.$exportcsv_fetch['pro_use'].'","'.$exportcsv_fetch['address'].'","'.$exportcsv_fetch['homestead_tax_deduction'].'","'.$exportcsv_fetch['zoning'].'","'.$exportcsv_fetch['ward'].'","'.$exportcsv_fetch['neighborhood'].'","'.$exportcsv_fetch['sqaure'].'","'.$exportcsv_fetch['land_area'].'","'.$exportcsv_fetch['sale_date'].'","'.$exportcsv_fetch['sale_price'].'","'.$exportcsv_fetch['recordation_date'].'","'.$exportcsv_fetch['date'].'","'.$exportcsv_fetch['beds'].'","'.$exportcsv_fetch['bath'].'","'.$exportcsv_fetch['square_feet'].'","'.$exportcsv_fetch['price_per_square_feet'].'","'.$exportcsv_fetch['year_built'].'","'.$exportcsv_fetch['year_renovated'].'","'.$exportcsv_fetch['tax_record'].'","'.$exportcsv_fetch['taxable_value_total'].'","'.$exportcsv_fetch['sqaure'].'","'.$exportcsv_fetch['lot'].'","'.$exportcsv_fetch['contactEmail'].'","'.$exportcsv_fetch['contactPhone'].'"'."\r\n";
				}
				$filewrite=fwrite($fileopen,$file_content);
				$this->zip->add_data($filename, $file_content);
				$this->zip->archive($_SERVER['DOCUMENT_ROOT'].'/zoningspace/assets/csv/'.$csvnamezip);
				fclose($fileopen);
				}
				else{
					$file_content .= "There are no vehicles to display";
					$filewrite    = fwrite($fileopen,$file_content);
					$this->zip->add_data($filename, $file_content);
				    $this->zip->archive($_SERVER['DOCUMENT_ROOT'].'/zoningspace/assets/csv/'.$csvnamezip);
					fclose($fileopen);
				}
				echo   $csvnamezip;
			
			
		}
		public function downloadBuySearchRecord(){
			 $result = $this->Csv_model->downloadBuySearchRecord();
				$filename = date("d-m-Y").'_'.$this->session->userdata('user_id').'_'.rand().' properties.csv';
					$csvname = $_SERVER['DOCUMENT_ROOT'].'/zoningspace/assets/csv/'.$filename;
					$csvnamezip = date("d-m-Y").'_'.$this->session->userdata('user_id').'_'.rand().' properties.zip';
					$fileopen=fopen($csvname,'w');
					$file_content='"Id"'.',"'.'Owner Name'.'","'.'Premises'.'","'.'zip'.'","'.'Pro Use'.'","'.'Address'.'","'.'Homestead Tax Deduction'.'","'.'zoning'.'","'.'ward'.'","'.'neighbourhood'.'","'.'Square'.'","'.'Land Area'.'","'.'Sale Date'.'","'.'Sale Price'.'","'.'Recordation Date'.'","'.'Date'.'","'.'Bed Room'.'","'.'Bath Room'.'","'.'Square Feet'.'","'.'Price Per Square Feet'.'","'.'Year Built'.'","'.'Year Renovated'.'","'.'Tax Record'.'","'.'Taxable Value Total'.'","'.'Square'.'","'.'Lot'.'","'.'Email'.'","'.'Contact Number'.'"'."\r\n";
				if(count($result) > 0){
				foreach($result as $exportcsv_fetch){
					$file_content.='"'.$exportcsv_fetch['id'].'","'.$exportcsv_fetch['owner_names'].'","'.$exportcsv_fetch['premises'].'","'.$exportcsv_fetch['zip'].'","'.$exportcsv_fetch['pro_use'].'","'.$exportcsv_fetch['address'].'","'.$exportcsv_fetch['homestead_tax_deduction'].'","'.$exportcsv_fetch['zoning'].'","'.$exportcsv_fetch['ward'].'","'.$exportcsv_fetch['neighborhood'].'","'.$exportcsv_fetch['sqaure'].'","'.$exportcsv_fetch['land_area'].'","'.$exportcsv_fetch['sale_date'].'","'.$exportcsv_fetch['sale_price'].'","'.$exportcsv_fetch['recordation_date'].'","'.$exportcsv_fetch['date'].'","'.$exportcsv_fetch['beds'].'","'.$exportcsv_fetch['bath'].'","'.$exportcsv_fetch['square_feet'].'","'.$exportcsv_fetch['price_per_square_feet'].'","'.$exportcsv_fetch['year_built'].'","'.$exportcsv_fetch['year_renovated'].'","'.$exportcsv_fetch['tax_record'].'","'.$exportcsv_fetch['taxable_value_total'].'","'.$exportcsv_fetch['sqaure'].'","'.$exportcsv_fetch['lot'].'","'.$exportcsv_fetch['contactEmail'].'","'.$exportcsv_fetch['contactPhone'].'"'."\r\n";
				}
				$filewrite=fwrite($fileopen,$file_content);
				$this->zip->add_data($filename, $file_content);
				$this->zip->archive($_SERVER['DOCUMENT_ROOT'].'/zoningspace/assets/csv/'.$csvnamezip);
				fclose($fileopen);
				}
				else{
					$file_content .= "There are no vehicles to display";
					$filewrite    = fwrite($fileopen,$file_content);
					$this->zip->add_data($filename, $file_content);
				    $this->zip->archive($_SERVER['DOCUMENT_ROOT'].'/zoningspace/assets/csv/'.$csvnamezip);
					fclose($fileopen);
				}
				echo   $csvnamezip;
			
			
		}
		// Add to Cart Process
		public function addcart(){
			$result = $this->Dashboard_model->addcart();
			if($result){ redirect('cart');}else{  redirect('cart');
			}
		}
		public function cart($page = 'cart'){
			$data['title'] = 'cart';
			$data['cart'] =$this->Dashboard_model->getCart();
			$this->load->view('templates/header');
			$this->load->view('home/cart.php', $data);
			$this->load->view('templates/footer');
		}
		// End here
		
}

?>