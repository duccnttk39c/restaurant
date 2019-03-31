<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_slide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// lấy dữ liệu từ cơ sở dữ liệu
		$this->load->model('slide_model');
		$dl = $this->slide_model->getDataSlide();
		// biến json thành mảng
		$dl = json_decode($dl, true);
		$dl = array('mangdl' => $dl);
		// truyền mảng này sang view editSlide_view
		$this->load->view('editSlide_view', $dl, FALSE);
	}

}

/* End of file Edit_slide.php */
/* Location: ./application/controllers/Edit_slide.php */