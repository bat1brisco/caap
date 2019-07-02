<?php
  class Acceptrejectcar extends CI_Controller {
    public function index() {
      $data['title'] = 'Manage Car Posts';

      $this->load->view('templates/header');
      $this->load->view('acceptrejectcar/index', $data);
      $this->load->view('templates/acceptrejectfooter');
    }

    public function fetch_car() {
      $this->load->model("acceptrejectcar_model");
      $fetch_data = $this->acceptrejectcar_model->make_datatables();
      $data = array();
        foreach($fetch_data as $row) {
          $sub_array = array();
          $sub_array[] = $row->make;
          $sub_array[] = $row->model;
          $sub_array[] = '<button type="button" name="accept" id="'.$row->car_id.'" class="btn btn-warning btn-xs acceptcar">Accept</button>';
          $sub_array[] = '<button type="button" name="delete" id="'.$row->car_id.'" class="btn btn-danger btn-xs deletecar">Delete</button>';
          $data[] = $sub_array;
        }

      $output = array(
        "draw"                =>     intval($_POST["draw"]),
        "recordsTotal"        =>     $this->acceptrejectcar_model->get_all_data(),
        "recordsFiltered"     =>     $this->acceptrejectcar_model->get_filtered_data(),
        "data"                =>     $data
      );
      echo json_encode($output);
    }

    public function delete_single_car() {
      $this->load->model("acceptrejectcar_model");
      $this->acceptrejectcar_model->delete_single_car($_POST['car_id']);
      echo 'Data Deleted';
    }

    public function accept_single_car() {
      $this->load->model("acceptrejectcar_model");
      $this->acceptrejectcar_model->accept_single_car($_POST['car_id']);
      echo 'User Approved';
    }
  }
