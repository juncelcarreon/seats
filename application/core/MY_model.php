<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Code Reusability
class MY_Model extends CI_Model
{
	protected $table = '';

	public function selectItem($in_data, $in_select = '*', $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		return $this->db->get_where($this->table, $in_data, 1, 0)->row();
	}

	public function selectItemArray($in_data, $in_select = '*', $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		return $this->db->get_where($this->table, $in_data, 1, 0)->row_array();
	}

	public function getItems($in_data = null, $in_select = '*', $in_limit = 10, $in_offset = 0, $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		if (is_array($in_data)) {
			return $this->db->get_where($this->table, $in_data, $in_limit, $in_offset)->result();
		} else {
			return $this->db->get($this->table, $in_limit, $in_offset)->result();
		}
	}

	public function getItemsArray($in_data = null, $in_select = '*', $in_limit = 10, $in_offset = 0, $in_order = 'idx DESC')
	{
		$this->db->select($in_select);
		$this->db->order_by($in_order);

		if (is_array($in_data)) {
			return $this->db->get_where($this->table, $in_data, $in_limit, $in_offset)->result_array();
		} else {
			return $this->db->get($this->table, $in_limit, $in_offset)->result_array();
		}
	}

	public function countItems($in_data = null)
	{
		if (is_array($in_data)) {
			$this->db->where($in_data);
		}
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}

	public function insertItem($in_data)
	{
		$this->db->insert($this->table, $in_data);
		return $this->db->insert_id();
	}

	public function updateItem($in_data, $in_where)
	{
		return $this->db->update($this->table, $in_data, $in_where);
	}

	public function deleteItem($in_data)
	{
		return $this->db->delete($this->table, $in_data);
	}
}
