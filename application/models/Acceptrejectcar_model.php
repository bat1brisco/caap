<?php
  class Acceptrejectcar_model extends CI_Model {
    var $table = "cars";
    var $select_column = array("car_id", "make", "model");
    var $order_column = array(null, "make", "model", null);

    public function make_query() {
      $this->db->select($this->select_column);
      $this->db->from($this->table);
      $this->db->where('posting_status', 'Pending');

        if(isset($_POST["search"]["value"])) {
          $this->db->or_where("make", $_POST["search"]["value"]);
          $this->db->or_where("model", $_POST["search"]["value"]);
        }

        if(isset($_POST["order"])) {
          $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
          $this->db->order_by('car_id', 'DESC');
        }
    }

    public function make_datatables() {
      $this->make_query();

        if($_POST["length"] != -1) {
          $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function get_filtered_data() {
      $this->make_query();
      $query = $this->db->get();
      return $query->num_rows();
    }

    public function get_all_data() {
      $this->db->select("*");
      $this->db->from($this->table);
      return $this->db->count_all_results();
    }

    public function delete_single_car($car_id) {
      $this->db->where('car_id', $car_id);
      $this->db->delete('cars');
    }

    public function accept_single_car($car_id) {
      $data = array(
        'posting_status' => 'Approved'
      );

      $this->db->where('car_id', $car_id);
      $this->db->update('cars', $data);
    } 

}
