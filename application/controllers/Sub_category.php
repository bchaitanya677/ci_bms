<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property $model_sub_category
 */
class Sub_category extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->isNotLoggedIn();
		$this->load->model('model_sub_category');

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
//		$creat = false;

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
			),
			array(
				'field' => 'category_id',
				'label' => 'Category',
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
				if ($this->model_sub_category->create($file['file_name'])) {
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
			$data = $this->model_sub_category->fetchSubCategoryById($id);
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
				),
				array(
					'field' => 'category_id',
					'label' => 'Category',
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
					if ($this->model_sub_category->updateInfo($data, $file['file_name'])) {
						$validator['success'] = true;
						$validator['messages'] = "Successfully updated sub category";
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

	public function fetchSubCategoryForDataTable()
	{
		$data = $this->model_sub_category->fetchSubCategory(1);
		$result = array('data' => array());
		foreach ($data as $key => $value) {
			$edit_button = '<a type="button" data-toggle="modal" data-target="#updateSubCategory" onclick="editSubCategory(' . $value['id'] . ')"> <i class="glyphicon glyphicon-edit"></i> Edit</a>';
			$delete_button = '<a type="button" data-toggle="modal" data-target="#deleteSubCategoryModal" onclick="removeSubCategory(' . $value['id'] . ')"> <i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$result['data'][$key] = array(
				$key + 1,
				$value['name'],
				$value['meta_name'],
				$value['meta_desc'],
				$value['meta_keyword'],
				$value['category_id'],
				$edit_button,
				$delete_button
			);
		}
		echo json_encode($result);
	}

	public function fetchSubCategoryById($id)
	{
		$data = $this->model_sub_category->fetchSubCategoryById($id);
		$return = (object)array(
			'sub_category_id' => $data['id'],
			'name' => $data['name'],
			'meta_desc' => $data['meta_desc'],
			'meta_name' => $data['meta_name'],
			'meta_keyword' => $data['meta_keyword'],
			'category_id' => $data['category_id'],
		);
		echo json_encode($return);
	}

	public function remove($id = null)
	{
		$validator = array('success' => false, 'messages' => array());

		if ($id) {
			$remove = $this->model_sub_category->remove($id);
			if ($remove) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully Removed";
			} else {
				$validator['success'] = false;
				$validator['messages'] = "Error while removing the information";
			}
		} else {
			$validator['success'] = false;
			$validator['messages'] = "Error sub category id is invalid or missing";
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
