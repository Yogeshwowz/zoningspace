<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Stripe extends CI_Controller {
     public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
       $this->load->model('Advancedsearch_Model');
	   $this->load->model('Payment_model');
	   $this->load->model('Dashboard_model');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('templates/header');
         $this->load->view('home/payment');
         $this->load->view('templates/footer');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost(){
	
	$this->Payment_model->userPlan(); 
	$subscription = $_POST['subscription'];
	$email  =  	 $_POST['emailId'];
	$nickname  = $_POST['emailId'];
	$amount  = $_POST['packageamount'];
	require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
		if($subscription==1 || $subscription==2){ 
			  $charge = \Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "USD",
                "source" => $this->input->post('stripeToken'),
                "description" => "User Subscription Plan" ,
				"metadata" => array("user_id" =>$this->session->userdata('user_id'),'carduserName' => $this->input->post('userName'))
				]);
				$chargeJson = $charge->jsonSerialize();
				if($chargeJson!==''){
					$this->Payment_model->userPlanUpdateAfterPayment(); 
				
					$this->Dashboard_model->buySearchforFirstTime(); 
						
					$this->session->set_flashdata('payment_success', 'Your payment has been credited successfully. Now you can Search data According to your subscription plan');		
					redirect('dashboard');
				}  
		}
	 
	 
	 
	 
	 
		if($subscription==3 || $subscription==4){
			$plan = \Stripe\Plan::create(array(
			"product" => [
				"name" => "Plan-2"
			],
			"metadata" => [
				"user_id" => $this->session->userdata('user_id'),
				'carduserName' => $this->input->post('userName')
			],		
			"nickname" => $nickname,
			"interval" => "month",
			"interval_count" => 1,
			"currency" => "USD",
			"amount" => $amount * 100,
			));
			$customer = \Stripe\Customer::create([
				'email' => $email,
				'source'  =>$this->input->post('stripeToken'),
			]);
			$subscription = \Stripe\Subscription::create(array(
					"customer" => $customer->id,
					"items" => array(
						array(
						"plan" => $plan->id,
						),
					),
			));
			
			$subscriptionJson = $subscription->jsonSerialize();
			
			if($subscriptionJson!==''){
					$this->Payment_model->userPlanUpdateAfterPayment();
					$this->Dashboard_model->buySearchforFirstTime(); 
						
					$this->session->set_flashdata('payment_success', 'Your payment has been credited successfully. Now you can Search data According to your subscription plan');		
					redirect('dashboard');
			} 
			
		}
		
		
		
	}
}