<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property $model_category
 */
class Category extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->isNotLoggedIn();

		$this->load->model('model_category');

	}

	/*
*------------------------------------
* inserts the category information
* into the database
*------------------------------------
*/
	public function create()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'meta_name',
				'label' => 'Meta Name',
				'rules' => 'required'
			),
			array(
				'field' => 'meta_desc',
				'label' => 'Meta Description',
				'rules' => 'required'
			),
			array(
				'field' => 'meta_keyword',
				'label' => 'Meta Keyword',
				'rules' => 'required'
			),
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() === true) {
			$file = do_upload();
			if (isset($file['error'])) {
				$validator['success'] = false;
				$validator['messages'] = $file['error'];
			} else {
				if ($this->model_category->create($file['file_name'])) {
					$validator['success'] = true;
					$validator['messages'] = "Successfully added";
				} else {
					$validator['success'] = false;
					$validator['messages'] = "Error while inserting the information into the database";
				}
			}
		} else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		} // /else

		echo json_encode($validator);
	}

	public function update($id = null)
	{
		if ($id) {
			$data = $this->model_category->fetchCategoryById($id);
			$validator = array('success' => false, 'messages' => array());
			$validate_data = array(
				array(
					'field' => 'meta_name',
					'label' => 'Meta Name',
					'rules' => 'required'
				),
				array(
					'field' => 'meta_desc',
					'label' => 'Meta Description',
					'rules' => 'required'
				),
				array(
					'field' => 'meta_keyword',
					'label' => 'Meta Keyword',
					'rules' => 'required'
				),
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				)
			);
			$this->form_validation->set_rules($validate_data);
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			if ($this->form_validation->run() === true) {
				$file = do_upload();
				if (isset($file['error'])) {
					$validator['success'] = false;
					$validator['messages'] = $file['error'];
				} else {
					if ($this->model_category->updateInfo($data, $file['file_name'])) {
						$validator['success'] = true;
						$validator['messages'] = "Successfully Updated category";
					} else {
						$validator['success'] = false;
						$validator['messages'] = "Error while inserting the information into the database";
					}
				}

			} else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);
				}
			} // /else

			echo json_encode($validator);
		} else {
			echo 'id not found';
		}
	}

	public function fetchCategoryForDataTable()
	{
		$data = $this->model_category->fetchCategory(1);
		$result = array('data' => array());
		foreach ($data as $key => $value) {
			$edit_button = '<a type="button" data-toggle="modal" data-target="#updateCategoryModal" onclick="editCategory(' . $value['id'] . ')"> <i class="glyphicon glyphicon-edit"></i> Edit</a>';
			$delete_button = '<a type="button" data-toggle="modal" data-target="#deleteCategoryModal" onclick="removeCategory(' . $value['id'] . ')"> <i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$result['data'][$key] = array(
				$key + 1,
				$value['name'],
				$value['meta_name'],
				$value['meta_desc'],
				$value['meta_keyword'],
				$edit_button,
				$delete_button
			);
		}
		echo json_encode($result);
	}

	public function fetchCategoryById($category_id)
	{
		$data = $this->model_category->fetchCategoryById($category_id);
		$category = (object)array(
			'category_id' => $data['id'],
			'name' => $data['name'],
			'meta_desc' => $data['meta_desc'],
			'meta_name' => $data['meta_name'],
			'meta_keyword' => $data['meta_keyword'],
		);
		echo json_encode($category);
	}

	public function remove($category_id = null)
	{
		$validator = array('success' => false, 'messages' => array());

		if ($category_id) {
			$remove = $this->model_category->remove($category_id);
			if ($remove) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully Removed";
			} else {
				$validator['success'] = false;
				$validator['messages'] = "Error while removing the information";
			}
		} else {
			$validator['success'] = false;
			$validator['messages'] = "Error Category id is invalid or missing";
		}

		echo json_encode($validator);
	}

	/*
*------------------------------------
* returns the uploaded image url
*------------------------------------
*/
	public function uploadImage()
	{
		$type = explode('.', $_FILES['photo']['name']);
		$type = $type[count($type) - 1];
		$url = 'uploads/images/categories/' . uniqid(rand()) . '.' . $type;
		if (in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
			if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
				if (move_uploaded_file($_FILES['photo']['tmp_name'], $url)) {
					return $url;
				} else {
					return false;
				}
			}
		}
	}

}
