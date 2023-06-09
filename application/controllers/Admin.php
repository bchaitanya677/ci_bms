<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property $model_category
 * @property $model_sub_category
 * @property $model_business
 * @property $model_product
 */
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->isNotLoggedIn();
		$this->load->model('model_category');
		$this->load->model('model_sub_category');
		$this->load->model('model_business');
		$this->load->model('model_product');

	}

	public function index()
	{
		$this->isLoggedIn();
	}

	public function dashboard()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}

	public function create_business()
	{

		$data['sub_category'] = $this->getSubCategoryInOptions();
		$data['category'] = $this->getCategoryInOptions();
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/business', $data);
		$this->load->view('templates/footer');
	}

	public function create_category()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/category');
		$this->load->view('templates/footer');
	}

	public function create_sub_category()
	{
		$data['category'] = $this->getCategoryInOptions();
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/sub_category', $data);
		$this->load->view('templates/footer');
	}

	public function create_product()
	{
		$data['sub_category'] = $this->getSubCategoryInOptions();
		$data['category'] = $this->getCategoryInOptions();
		$this->load->view('templates/header');
		$this->load->view('templates/create_forms/product', $data);
		$this->load->view('templates/footer');
	}

	public function get_business()
	{
		$this->load->view('templates/header');
		$this->load->view('view_business');
		$this->load->view('templates/footer');
	}

	public function get_category()
	{
		$this->load->view('templates/header');
		$this->load->view('view_category');
		$this->load->view('templates/footer');
	}

	public function get_sub_category()
	{
		$this->load->view('templates/header');
		$this->load->view('view_sub_category');
		$this->load->view('templates/footer');
	}

	public function get_product()
	{
		$this->load->view('templates/header');
		$this->load->view('view_product');
		$this->load->view('templates/footer');
	}

	public function get_user()
	{
		$this->load->view('templates/header');
		$this->load->view('user');
		$this->load->view('templates/footer');
	}

	public function getCategoryInOptions()
	{
		$category = $this->model_category->fetchCategory(1);
		$options = '<option value="">Select category</option>';
		foreach ($category as $key => $value) {
			$options .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
		}
		return $options;
	}

	public function getSubCategoryInOptions()
	{
		$sub_category = $this->model_sub_category->fetchSubCategory(1);
		$options = '<option value="">Select sub category</option>';
		foreach ($sub_category as $key => $value) {
			$options .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
		}
		return $options;
	}
}
