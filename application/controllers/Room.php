<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller
{

	public function index()
	{
		$this->load->model('room_model');

		$rooms = $this->room_model->getItems(null);

		$data = new stdClass;
		$data->param_rooms = $rooms;

		$this->load->view('room_lists', $data);
	}

	public function view($in_idx)
	{
		if(empty($in_idx) || $in_idx === null) {
			redirect('404');
			exit;
		}

		$this->load->model('room_model');

		$room = $this->room_model->selectItem(array('idx'=>$in_idx));

		$data = new stdClass;
		$data->param_room = $room;

		$this->load->view('room_view', $data);
	}

	public function edit($in_idx)
	{
		if(empty($in_idx) || $in_idx === null) {
			redirect('404');
			exit;
		}

		$this->load->model('room_model');
		$this->load->model('seat_model');

		$room = $this->room_model->selectItem(array('idx'=>$in_idx));
		$seats = $this->seat_model->getItems(array('room_idx'=>$in_idx), '*', 9999);

		$data = new stdClass;
		$data->param_room = $room;
		$data->param_seats = $seats;

		$this->load->view('room_edit', $data);
	}
}