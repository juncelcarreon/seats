<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
CREATE TABLE IF NOT EXISTS `tbl_seats_info` (
	`idx` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`seat_idx` int(4) unsigned NOT NULL,
	`employee_idx` int(4) NOT NULL,
	`time_in` datetime NOT NULL,
	`time_out` datetime NOT NULL,
	`reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY (`idx`),
	KEY `key_seats_info` (`seat_idx`, `employee_idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/
class Seat_info_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'tbl_seats_info';
	}
}
