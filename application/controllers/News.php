<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		
	}
	public function cateNews()
	{
		$ketqua = $this->news_model->getDataCateNews();
		$ketqua = array('dulieu' => $ketqua);
		$this->load->view('cateNews_view', $ketqua);
	}
	public function addCateNews()
	{
		$tendanhmuc = $this->input->post('name_catenews');
		$this->load->model('news_model');
		if($this->news_model->insertCateNews($tendanhmuc)) {
			$this->load->view('thanhcongnews');
		} else {
			$this->load->view('thatbainews');
		}
	}
	public function editCateNews($idcate)
	{
		$dl = $this->news_model->getDataById($idcate);
		$dl = array('mangdl' => $dl);
		$this->load->view('editCateNews_view', $dl, FALSE);
	}
	public function updateCateNews()
	{
		$id = $this->input->post('id');
		$name_catenews = $this->input->post('name_catenews');

		if($this->news_model->updateCateById($id, $name_catenews)) {
			$this->load->view('thanhcongnews');
		} else {
			$this->load->view('thatbainews');
		}
	}
	public function deleteCateNews($id)
	{
		if($this->news_model->deleteCateById($id)) {
			$this->load->view('thanhcongnews');
		} else {
			$this->load->view('thatbainews');
		}
	}
	public function addJquery()
	{
		$tendanhmuc = $this->input->post('name_catenews');
		$this->load->model('news_model');
		$this->news_model->insertCateNews($tendanhmuc);

		echo json_encode($this->db->insert_id());
	}
	public function qlNews()
	{
		$dl1 = $this->news_model->getDataCateNews();
		$dl2 = $this->news_model->loadDsNews();
		$dulieu = array(
			'dulieudanhmuc' => $dl1, 
			'dulieutin' => $dl2
		);
		$this->load->view('news_view', $dulieu);
	}
	public function addNews()
	{
		// xử lý ảnh tin
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image_news"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image_news"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		/*if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["image_news"]["size"] > 500000000) {
		    //echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image_news"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["image_news"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}
		$image_news = base_url() . 'uploads/' .  basename( $_FILES["image_news"]["name"]);
		$title = $this->input->post('title');
		$id_catenews = $this->input->post('id_catenews');
		$quote = $this->input->post('quote');
		$content_news = $this->input->post('content_news');

		if($this->news_model->insertNews($title, $id_catenews, $content_news, $image_news, $quote)) {
			$this->load->view('thanhcong2');
		} else {
			$this->load->view('thatbai2');
		}
	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */