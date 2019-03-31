<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$this->load->model('slide_model');
		$data = $this->slide_model->getDataSlide();
		$data = json_decode($data, true);
		$data = array('mangketqua' => $data);
		$this->load->view('slide_view', $data);
	}
	public function addSlide()
	{	
		// lấy dữ liệu từ trường tên là slide_topbanner ra
		$dulieu = $this->slide_model->getDataSlide();
		// giải mã json
		$dulieu = json_decode($dulieu, true);
		if ($dulieu == null) {
			echo 'Dữ liệu đang trống';
			$dulieu = array();
		}

		// upload file lấy ở w3school
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["slide_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["slide_image"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// lấy dữ liệu từ view
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$button_link = $this->input->post('button_link');
		$button_text = $this->input->post('button_text');
		$slide_image = base_url() . 'uploads/'.basename($_FILES["slide_image"]["name"]);
		// thêm nội dung vào json
		$motslideanh = array(
			'id' => $id,
			'title' => $title,
			'description' => $description,
			'button_link' => $button_link,
			'button_text' => $button_text,
			'slide_image' => $slide_image
		);
		array_push($dulieu, $motslideanh);
		// mã hóa lại json 
		$dulieu = json_encode($dulieu);
		// update lại dữ liệu
		if ($this->slide_model->updateDataSlide($dulieu)) {
			$this->load->view('thanhcong');
		}
	}
	public function editSlide()
	{
		// lấy về nội dung từ view
		$id = $this->input->post('id'); // 1 mảng
		$title = $this->input->post('title'); // 1 mảng
		$description = $this->input->post('description'); // 1 mảng
		$button_link = $this->input->post('button_link'); // 1 mảng
		$button_text = $this->input->post('button_text'); // 1 mảng

		// lấy về tất cả các ảnh, rồi upload lên
		$cacanh = $_FILES['slide_image']['name'];
		$filevatly = $_FILES['slide_image']['tmp_name']; // file thật
		$slide_image = array();
		$slide_image_old = $this->input->post('slide_image_old');
		
		// duyệt mảng để lấy tên từng file
		for ($i = 0; $i < count($cacanh); $i++) {
			if (empty($cacanh[$i])) {
				$slide_image[$i] = $slide_image_old[$i];
			} else {
				$duongdan = 'uploads/'.$cacanh[$i];
				move_uploaded_file($filevatly[$i], $duongdan);
				$slide_image[$i] = base_url()."uploads/".$cacanh[$i];
			}
		}
		// $slide_image chứa toàn bộ các tên file mà mình cần

		// tạo một mảng tatcaslide
		$tatcaslide = array();
		// insert từng phần tử và mảng tất cả slide
		for ($i = 0; $i < count($title); $i++) {
			$temp = array();
			$temp['id'] = $id[$i];
			$temp['title'] = $title[$i];
			$temp['description'] = $description[$i];
			$temp['button_link'] = $button_link[$i];
			$temp['button_text'] = $button_text[$i];
			$temp['slide_image'] = $slide_image[$i];
			array_push($tatcaslide, $temp);
		}
		// đưa thành json
		$tatcaslide = json_encode($tatcaslide);
		// gọi model update dữ liệu
		$this->load->model('slide_model');
		if ($this->slide_model->updateDataSlide($tatcaslide)) {
			$this->load->view('thanhcong');
		} else {
			echo 'Edit thất bại, xem lại code đi nha';
		}
	}
	public function deleteSlide($id)
	{
		// lấy dữ liệu ra
		$dulieu = $this->slide_model->getDataSlide();
		// giải mã để biến nó thành 1 mảng dữ liệu
		$dulieu = json_decode($dulieu, true);
		// duyệt các phần tử trong mảng này so sánh xem là có cái phần tử nào có id trùng với $id
		// nếu trùng thì dùng hàm unset(tenmang, key) để xóa nó đi khỏi mảng gốc
		foreach ($dulieu as $key => $value) {
			if ($value['id'] == $id) {
				// xóa phần tử đó
				unset($dulieu[$key]);
			}
		}
		// mã hóa dữ liệu thành chuỗi json sau đó mới insert
		$dulieu = json_encode($dulieu);
		// sau khi hết foreach thì mảng json của mình đã xóa đi phần tử có id truyền vào rồi
		// cập nhật vào dữ liệu -> giao tiếp vs tầng dữ liệu -> viết trong model hàm cập nhật
		// sau khi viết xong thì gọi hàm cập nhật ở đây 
		if ($this->slide_model->updateDataSlide($dulieu)) {
			$this->load->view('thanhcong');
		} else {
			echo 'Xóa thất bại, kiểm tra lại code nha';
		}
	}
}

/* End of file Slide.php */
/* Location: ./application/controllers/Slide.php */