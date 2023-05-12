<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
CREATE TABLE IF NOT EXISTS `tbl_movies` (
	`idx` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`name` char(128) NOT NULL,
	`url` text NOT NULL,
	`price` decimal(18,2) NOT NULL,
	`eligibility` decimal(18,2) NOT NULL,
	`availability` text NOT NULL,
	`categories` text NOT NULL,
	`reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY (`idx`),
	KEY `key_movies` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/
class Movie_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'tbl_movies';
	}

	public function getMovies($in_category, $in_search, $in_limit = 10, $in_offset = 0, $in_order = 'idx ASC')
	{
		$categories = '1';
		if ($in_category != 'category') {
			$cat = explode('_', $in_category);
			$cnt = count($cat) - 1;

			$categories .= " AND (";
			foreach($cat as $key=>$category) {
				$categories .= "tbl_movies.categories LIKE '%{$category}%' OR ";
				if ($cnt == $key) {
					$categories .= "tbl_movies.categories LIKE '%{$category}%'";
				}
			}
			$categories .= ')';

		}

		$search = '1';
		if ($in_search != 'dvd title') {
			$search .= " AND (tbl_movies.name LIKE '%{$in_search}%')";
		}

		$sql = "SELECT tbl_movies.* FROM tbl_movies WHERE {$categories} AND {$search} ORDER BY {$in_order} LIMIT {$in_offset}, {$in_limit}";

		$items = $this->db->query($sql)->result();

		return $items;
	}

	public function getMoviesbyCart($in_cart = '')
	{
		if(empty($in_cart)) {
			return;
		}

		$carts = explode('|', $in_cart);
		$data = array();
		foreach ($carts as $key=>$value) {
			$form_data = explode('_', $value);
			$movie = parent::selectItem(array('idx' => $form_data[0]));

			$data[$movie->idx][$key]['idx'] = $movie->idx;
			$data[$movie->idx][$key]['name'] = $movie->name;
			$data[$movie->idx][$key]['url'] = $movie->url;
			$data[$movie->idx][$key]['eligibility'] = $movie->eligibility;
			$data[$movie->idx][$key]['availability'] = $movie->availability;
			$data[$movie->idx][$key]['price'] = $form_data[1];

		}

		return array_values($data);
	}

	public function countEmployee($in_data, $in_search)
	{
		$condition = '1';
		foreach ($in_data as $key=>$value) {
			$condition .= " AND tbl_employee.{$key}='{$value}'";
		}

		$search = '1';
		if ($in_search != 'searchstr') {
			$search .= " AND (tbl_employee.code LIKE '%{$in_search}%' OR tbl_employee.firstname LIKE '%{$in_search}%' OR tbl_employee.lastname LIKE '%{$in_search}%')";
		}

		$sql = "SELECT count(*) AS count FROM tbl_employee WHERE {$condition} AND {$search}";

		return $this->db->query($sql)->row()->count;
	}
}
