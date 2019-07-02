<?php
  class Acceptrejectuser extends CI_Controller {
    public function index() {
      $data['title'] = 'Manage Registration';

      $this->load->view('templates/header');
      $this->load->view('acceptrejectuser/index', $data);
      $this->load->view('templates/acceptrejectfooter');
    }

    public function fetch_user() {
      $this->load->model("acceptreject_model");
      $fetch_data = $this->acceptreject_model->make_datatables();
      $data = array();
        foreach($fetch_data as $row) {
          $sub_array = array();
          $sub_array[] = $row->fname;
          $sub_array[] = $row->lname;
          $sub_array[] = '<button type="button" name="accept" id="'.$row->user_id.'" class="btn btn-warning btn-xs accept">Accept</button>';
          $sub_array[] = '<button type="button" name="delete" id="'.$row->user_id.'" class="btn btn-danger btn-xs delete">Delete</button>';
          $data[] = $sub_array;
        }

      $output = array(
        "draw"                =>     intval($_POST["draw"]),
        "recordsTotal"        =>     $this->acceptreject_model->get_all_data(),
        "recordsFiltered"     =>     $this->acceptreject_model->get_filtered_data(),
        "data"                =>     $data
      );
      echo json_encode($output);
    }

    public function delete_single_user() {
      $this->load->model("acceptreject_model");
      $this->acceptreject_model->delete_single_user($_POST['user_id']);
      echo 'Data Deleted';
    }

    public function accept_single_user() {
      $this->load->model("acceptreject_model");
      $this->acceptreject_model->accept_single_user($_POST['user_id']);
      echo 'User Approved';
    }
  }
