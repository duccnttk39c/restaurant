<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slide_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getDataSlide()
	{	
		$this->db->select('*');
		$this->db->where('nameattr', 'slide_topbanner');
		$dl = $this->db->get('json_attribute');
		$dl = $dl->result_array();
		foreach ($dl as $value) {
			$temp = $value['valueattr'];
		}
		return $temp;
	}
	public function updateDataSlide($dulieuupdate)
	{
		// lấy dữ liệu cần update
		$chuanbidulieu = array(
			'nameattr' => 'slide_topbanner',
			'valueattr' => $dulieuupdate
		);
		$this->db->where('nameattr', 'slide_topbanner');
		return $this->db->update('json_attribute', $chuanbidulieu);
	}
}

/* End of file slide_model.php */
/* Location: ./application/models/slide_model.php */