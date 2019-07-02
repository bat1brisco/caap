<?php
  class Acceptrejectpart_model extends CI_Model {
    var $table = "parts";
    var $select_column = array("parts_id", "brand", "model_name");
    var $order_column = array(null, "brand", "model_name", null);

    public function make_query() {
      $this->db->select($this->select_column);
      $this->db->from($this->table);
      $this->db->where('posting_status', 'Pending');

        if(isset($_POST["search"]["value"])) {
          $this->db->or_where("brand", $_POST["search"]["value"]);
          $this->db->or_where("model_name", $_POST["search"]["value"]);
        }

        if(isset($_POST["order"])) {
          $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
          $this->db->order_by('parts_id', 'DESC');
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

    public function delete_single_part($parts_id) {
      $this->db->where('parts_id', $parts_id);
      $this->db->delete('parts');
    }

    public function accept_single_part($parts_id) {
      $data = array(
        'posting_status' => 'Approved'
      );

      $this->db->where('parts_id', $parts_id);
      $this->db->update('parts', $data);
    } 

}
