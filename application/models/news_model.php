<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertCateNews($name_catenews)
	{
		$dl = array(
			'name_catenews' => $name_catenews
		);
		return $this->db->insert('categories_news', $dl);
	}
	public function getDataCateNews()
	{
		$this->db->select('*');
		$dl = $this->db->get('categories_news');
		$dl = $dl->result_array();
		return $dl;
	}
	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('categories_news');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function updateCateById($id, $name_catenews)
	{
		$dlupdate = array(
			'id' => $id,
			'name_catenews' => $name_catenews
		);
		$this->db->where('id', $id);
		return $this->db->update('categories_news', $dlupdate);
	}
	public function deleteCateById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('categories_news');
	}
	// insert cho tin tuc
	public function insertNews($title, $id_catenews, $content_news, $image_news, $quote)
	{ 
		$dulieu = array(
			'title' => $title,
			'id_catenews' => $id_catenews,
			'content_news' => $content_news,
			'image_news' => $image_news,
			'quote' => $quote
		);
		$this->db->insert('news', $dulieu); 
		return $this->db->insert_id();
	}
	public function loadDsNews()
	{
		$this->db->select('*');
		$dl = $this->db->get('News');
		$dl = $dl->result_array();
		return $dl;
	}
}

/* End of file news_model.php */
/* Location: ./application/models/news_model.php */