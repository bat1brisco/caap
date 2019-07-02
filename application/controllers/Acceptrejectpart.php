<?php
  class Acceptrejectpart extends CI_Controller {
    public function index() {
      $data['title'] = 'Manage Parts Posts';

      $this->load->view('templates/header');
      $this->load->view('acceptrejectpart/index', $data);
      $this->load->view('templates/acceptrejectfooter');
    }

    public function fetch_part() {
      $this->load->model("acceptrejectpart_model");
      $fetch_data = $this->acceptrejectpart_model->make_datatables();
      $data = array();
        foreach($fetch_data as $row) {
          $sub_array = array();
          $sub_array[] = $row->brand;
          $sub_array[] = $row->model_name;
          $sub_array[] = '<button type="button" name="accept" id="'.$row->parts_id.'" class="btn btn-warning btn-xs acceptpart">Accept</button>';
          $sub_array[] = '<button type="button" name="delete" id="'.$row->parts_id.'" class="btn btn-danger btn-xs deletepart">Delete</button>';
          $data[] = $sub_array;
        }

      $output = array(
        "draw"                =>     intval($_POST["draw"]),
        "recordsTotal"        =>     $this->acceptrejectpart_model->get_all_data(),
        "recordsFiltered"     =>     $this->acceptrejectpart_model->get_filtered_data(),
        "data"                =>     $data
      );
      echo json_encode($output);
    }

    public function delete_single_part() {
      $this->load->model("acceptrejectpart_model");
      $this->acceptrejectpart_model->delete_single_part($_POST['parts_id']);
      echo 'Data Deleted';
    }

    public function accept_single_part() {
      $this->load->model("acceptrejectpart_model");
      $this->acceptrejectpart_model->accept_single_part($_POST['parts_id']);
      echo 'User Approved';
    }
  }
