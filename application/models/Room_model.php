<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
CREATE TABLE IF NOT EXISTS `tbl_rooms` (
	`idx` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`room_name` char(128) NOT NULL,
	`status` enum('ACTIVE', 'INACTIVE') NOT NULL DEFAULT 'ACTIVE',
	`reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY (`idx`),
	KEY `key_rooms` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/
class Room_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'tbl_rooms';
	}
}
