<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

    public function index()
    {
        $data["pageTitle"] = "Admin";

        $this->load->view('admin_header', $data);
        $this->load->view('admin_nav', $data);
        $this->load->view('admin_index', $data);
        $this->load->view('admin_footer', $data);
    }

    public function organizer()
    {
        $this->load->database();
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $results_per_page = 10;
        $link = 7;
        $start_from = ($page-1) * $results_per_page;

        $sql_string = "SELECT o.*, "
            . "(SELECT COUNT(*) FROM sessions s WHERE s.organizer_id=o.organizer_id) AS event_amount "
            . "FROM organizers AS o "
            . "ORDER BY o.organizer_id DESC "
            . "LIMIT $start_from, $results_per_page";
        $sql_query = $this->db->query($sql_string);

        $result = $this->db->query("SELECT COUNT(organizer_id) AS total FROM organizers;");
        $row = $result->row();

        $data["total_pages"] = ceil($row->total / $results_per_page);
        $data["current_page"] = $page;
        $data["query_listing"] = $sql_query;

        $this->load->view('admin_header', $data);
        $this->load->view('admin_nav', $data);
        $this->load->view('admin_organizer', $data);
        $this->load->view('admin_footer', $data);
    }

    public function organizer_edit()
    {
        $this->load->database();
        $id = isset($_GET["id"]) ? $_GET["id"] : 1;

        $sql_string = "SELECT o.*, "
            . "(SELECT COUNT(*) FROM sessions s WHERE s.organizer_id=o.organizer_id) AS event_amount "
            . "FROM organizers AS o "
            . "WHERE o.organizer_id=$id";
        $sql_query = $this->db->query($sql_string)->row();
        $data["query_listing"] = $sql_query;

        $this->load->view('admin_header', $data);
        $this->load->view('admin_nav', $data);
        $this->load->view('admin_organizer_edit', $data);
        $this->load->view('admin_footer', $data);
    }

    public function user(){
      $this->load->database();
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      $results_per_page = 10;
      $link = 7;
      $start_from = ($page-1) * $results_per_page;

      $sql_string = "SELECT u.* "
          . "FROM users AS u "
          . "ORDER BY u.user_id DESC "
          . "LIMIT $start_from, $results_per_page";
      $sql_query = $this->db->query($sql_string);

      $result = $this->db->query("SELECT COUNT(user_id) AS total FROM users;");
      $row = $result->row();

      $data["total_pages"] = ceil($row->total / $results_per_page);
      $data["current_page"] = $page;
      $data["query_listing"] = $sql_query;

      $this->load->view('admin_header', $data);
      $this->load->view('admin_nav', $data);
      $this->load->view('admin_user', $data);
      $this->load->view('admin_footer', $data);
    }

    public function sport(){
      $this->load->database();
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      $results_per_page = 10;
      $link = 7;
      $start_from = ($page-1) * $results_per_page;

      $sql_string = "SELECT s.* "
          . "FROM sessions AS s "
          . "ORDER BY s.session_id DESC "
          . "LIMIT $start_from, $results_per_page";
      $sql_query = $this->db->query($sql_string);

      $result = $this->db->query("SELECT COUNT(session_id) AS total FROM sessions;");
      $row = $result->row();

      $data["total_pages"] = ceil($row->total / $results_per_page);
      $data["current_page"] = $page;
      $data["query_listing"] = $sql_query;

      $this->load->view('admin_header', $data);
      $this->load->view('admin_nav', $data);
      $this->load->view('admin_session', $data);
      $this->load->view('admin_footer', $data);
    }

    public function trainer(){
      $this->load->database();
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      $results_per_page = 10;
      $link = 7;
      $start_from = ($page-1) * $results_per_page;

      $sql_string = "SELECT t.* "
          . "FROM trainers AS t "
          . "ORDER BY t.trainer_id DESC "
          . "LIMIT $start_from, $results_per_page";
      $sql_query = $this->db->query($sql_string);

      $result = $this->db->query("SELECT COUNT(trainer_id) AS total FROM trainers;");
      $row = $result->row();

      $data["total_pages"] = ceil($row->total / $results_per_page);
      $data["current_page"] = $page;
      $data["query_listing"] = $sql_query;

      $this->load->view('admin_header', $data);
      $this->load->view('admin_nav', $data);
      $this->load->view('admin_trainer', $data);
      $this->load->view('admin_footer', $data);
    }

    public function booking(){
      $this->load->database();
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      $results_per_page = 10;
      $link = 7;
      $start_from = ($page-1) * $results_per_page;

      $sql_string = "SELECT b.* "
          . "FROM bookings AS b "
          . "ORDER BY b.booking_id DESC "
          . "LIMIT $start_from, $results_per_page";
      $sql_query = $this->db->query($sql_string);

      $result = $this->db->query("SELECT COUNT(booking_id) AS total FROM bookings;");
      $row = $result->row();

      $data["total_pages"] = ceil($row->total / $results_per_page);
      $data["current_page"] = $page;
      $data["query_listing"] = $sql_query;

      $this->load->view('admin_header', $data);
      $this->load->view('admin_nav', $data);
      $this->load->view('admin_booking', $data);
      $this->load->view('admin_footer', $data);
    }

    public function venue(){
      $this->load->database();
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      $results_per_page = 10;
      $link = 7;
      $start_from = ($page-1) * $results_per_page;

      $sql_string = "SELECT v.* "
          . "FROM venues AS v "
          . "ORDER BY v.venue_id DESC "
          . "LIMIT $start_from, $results_per_page";
      $sql_query = $this->db->query($sql_string);

      $result = $this->db->query("SELECT COUNT(venue_id) AS total FROM venues;");
      $row = $result->row();

      $data["total_pages"] = ceil($row->total / $results_per_page);
      $data["current_page"] = $page;
      $data["query_listing"] = $sql_query;

      $this->load->view('admin_header', $data);
      $this->load->view('admin_nav', $data);
      $this->load->view('admin_venue', $data);
      $this->load->view('admin_footer', $data);
    }
}
