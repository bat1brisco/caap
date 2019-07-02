<?php

	class Partslisting_model extends CI_Model {
		public function __construct() {

			$this->load->database();
		}

		public function get_parts($slug = FALSE) {

			if ($slug === FALSE) {
				$query = $this->db->get('parts');
				return $query->result_array();
			}

			$query = $this->db->get_where('parts', array('slug' => $slug));

			return $query->row_array();
		}

		public function create_parts_post($post_image) {
			$slug = url_title($this->input->post('brand'));

			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'price' => $this->input->post('price'),
				'slug' => $slug,
				'category' => $this->input->post('category'),
				'brand' => $this->input->post('brand'),
				'parts_quantity' => $this->input->post('parts_quantity'),
				'notification_listing' => false,
				'color' => $this->input->post('color'),
				'description' => $this->input->post('description'),
				'parts_status' => 'available',
				'model_name' => $this->input->post('model_name'),
				'rfs' => $this->input->post('rfs'),
				'post_image' => $post_image,
				'status' => 'Pending'
			);
			$q = $this->db->insert('parts', $data);
			return 1;
			//return $this->db->insert('parts', $data);
		}

		function fetch_filter_type($type) {
			$this->db->distinct();
			$this->db->select($type);
			$this->db->from('parts');
			$this->db->where('status', 'Approved');

			return $this->db->get();
		}

		function make_query($cateogry, $brand, $color, $model_name) {
				$query = "
				SELECT * FROM parts
				WHERE status = 'Approved'
				";

					if (isset($cateogry)) {
						$cateogry_filter = implode("','", $category);
						$query .= " AND category IN('" . $cateogry_filter . "')";
					}

					if (isset($brand)) {
						$brand_filter = implode("','", $brand);
						$query .= " AND brand IN('" . $brand_filter . "')";
					}

					if (isset($color)) {
						$color_filter = implode("','", $color);
						$query .= " AND color IN('" . $color_filter . "')";
					}

					if (isset($model_name)) {
						$model_name_filter = implode("','", $model_name);
						$query .= " AND model IN('" . $model_name_filter . "')";
					}

					return $query;
		}

		function count_all($category, $brand, $color, $model_name) {
				$query = $this->make_query($category, $brand, $color, $model_name);
				$data = $this->db->query($query);

				return $data->num_rows();
		}

		function fetch_data($limit, $start, $category, $brand, $color, $model_name) {
			$query = $this->make_query($category, $brand, $color, $model_name);

			$query .= ' LIMIT ' . $start . ', ' . $limit;

			$data = $this->db->query($query);

			$output = '';

				if ($data->num_rows() > 0) {
					foreach($data->result_array() as $row) {
						$output .= '

							<div class="col-md-3 text-center">
								<div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>
									<h3 align="center"><strong>' . $row['brand'] .'</strong></h3>
									<h4 style="text-align:center;">'. $row['model_name'] .'</h4>
									<img class="post-thumbnail img-thumbnail" src="assets/images/posts/'. $row['post_image'].'">
									<a class="btn btn-ccap mt-2 mb-2" href="/ccap/partslisting/' .$row['slug'] . '">View Details</a>
								</div>

							</div>

						';
					}
				} else {
					$output = '<h3>No Data Found</h3>';
				}
				return $output;

		}
		public function get_pending_parts(){
			$result  = $this->db->get_where('parts', array('status' => 'Pending'));
			return $result;
		}
		public function parts_approve($id){
			$this->db->set('status', "Approved");
			$this->db->where('parts_id', $id);
			$this->db->update('parts');
			$result = $this->db->get_where('parts', array('parts_id' => $id));
			return $result;
		}
		public function parts_decline($id){
			$this->db->set('status', "Declined");
			$this->db->where('parts_id', $id);
			$this->db->update('parts');
			$result = $this->db->get_where('parts', array('parts_id' => $id));
			return $result;
		}

	}
