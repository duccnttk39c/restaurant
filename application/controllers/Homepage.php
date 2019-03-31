<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('slide_model');
		$dl = $this->slide_model->getDataSlide();
		$dl = array('mangdl' => $dl);
		$this->load->view('homepage', $dl);
	}

}

/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */