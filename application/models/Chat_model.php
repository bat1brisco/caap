<?php
    class Chat_model extends CI_Model {
        var $table = "users";
        var $select_column = array("user_id", "fname", "lname");
        var $order_column = array(null, "fname", "lname", null);

        public function make_query() {
          $this->db->select($this->select_column);
          $this->db->from($this->table);
          $this->db->where('user_type', 'admin');

            if(isset($_POST["search"]["value"])) {
              $this->db->or_where("fname", $_POST["search"]["value"]);
              $this->db->or_where("lname", $_POST["search"]["value"]);
            }

            if(isset($_POST["order"])) {
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
              $this->db->order_by('user_id', 'DESC');
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
    }