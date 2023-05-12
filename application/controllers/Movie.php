<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller
{

	public function page($in_category = 'category', $in_search = 'dvd title')
	{
		$this->load->model('movie_model');

		$movies = $this->movie_model->getMovies($in_category, urldecode($in_search));
		$cart = $this->input->cookie('cart', false);
		$cart_cnt = (empty($cart)) ? 0 : count(json_decode($cart, true));

		$data = new stdClass;
		$data->param_movies = $movies;
		$data->param_category = $in_category;
		$data->param_search = $in_search;
		$data->param_cart = $cart_cnt;
		$data->param_menu = 'home';

		$this->load->view('movie_page', $data);
	}

	public function cart()
	{
		$this->load->model('movie_model');

		$cart = $this->input->cookie('cart', false);
		$cart_cnt = (empty($cart)) ? 0 : count(json_decode($cart, true));

		$data = new stdClass;
		$data->param_movies = json_decode($cart);
		$data->param_cart = $cart_cnt;
		$data->param_menu = 'cart';

		$this->load->view('movie_cart', $data);
	}

	public function add()
	{
		$this->load->model('movie_model');
		$this->load->helper('cookie');

		$form_data = $this->input->post();
		$movie = $this->movie_model->selectItem(array('idx' => $form_data['idx']));
		$cart = $this->input->cookie('cart', false);
		$data[$movie->idx] = array(
			'idx' => $movie->idx,
			'name' => $movie->name,
			'url' => $movie->url,
			'availability' => $movie->availability,
			'eligibility' => $movie->eligibility,
			'price' => $form_data['price'],
			'cnt' => 1
		);

		if(!empty($cart)) {
			$cart_data = json_decode($cart, true);

			if(!empty($cart_data[$movie->idx])) {
				$cart_data[$movie->idx]['price'] += $form_data['price'];
				$cart_data[$movie->idx]['cnt'] += 1;
			} else {
				$cart_data[$movie->idx] = array(
					'idx' => $movie->idx,
					'name' => $movie->name,
					'url' => $movie->url,
					'availability' => $movie->availability,
					'eligibility' => $movie->eligibility,
					'price' => $form_data['price'],
					'cnt' => 1
				); 
			}

			$data = $cart_data;
		}
 

		$cookie = array(
            'name'   => 'cart',
            'value'  => json_encode($data),
            'expire' =>  86500,
            'secure' => false
        );

        $this->input->set_cookie($cookie);

		echo json_encode(array('ret' => 1));
	}

	public function update()
	{
		$this->load->model('movie_model');
		$this->load->helper('cookie');

		$form_data = $this->input->post();
		$movie = $this->movie_model->selectItem(array('idx' => $form_data['idx']));
		$cart = $this->input->cookie('cart', false);
		$cart_data = json_decode($cart, true);
		$price = $movie->price * $form_data['qty'];
		$total = 0;
		$cart_data[$movie->idx] = array(
			'idx' => $movie->idx,
			'name' => $movie->name,
			'url' => $movie->url,
			'availability' => $movie->availability,
			'eligibility' => $movie->eligibility,
			'price' => $price,
			'cnt' => $form_data['qty']
		);
 

		$cookie = array(
            'name'   => 'cart',
            'value'  => json_encode($cart_data),
            'expire' =>  86500,
            'secure' => false
        );

        $this->input->set_cookie($cookie);

		foreach($cart_data as $key=>$value) {
			$total += $value['price'];
		}

		echo json_encode(array('ret' => 1, 'price' => $price, 'total' => $total));
	}
}