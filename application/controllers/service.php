<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -  
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */

  public function check_login()
  {
    if(!UID)
      redirect("login");
  } 

  public function restaurant()
  {
    $this->check_login();
    $restaurant = $this->input->post("restaurant");
    $customer = $this->input->post("customer");
    $date = $this->input->post("date");
    $table_num = $this->input->post("table_num");
    $price = $this->input->post("price");

    $this->restaurant_m->add_service($restaurant, $customer, $date, $table_num, $price);

    $data = array('page' => 'restaurant', 'title' => 'Add Restaurant Service');
    $vdata = array('type' => 'restaurant');
    $this->load->view("header", $data);
    $this->load->view('service_success', $vdata);
    $this->load->view('footer');
  }

  public function massage_room()
  {
    $this->check_login();
    $massage = $this->input->post("massage");
    $customer = $this->input->post("customer");
    $date = $this->input->post("date");
    $details = $this->input->post("details");
    $price = $this->input->post("price");

    $this->massage_room_m->add_service($massage, $customer, $date, $details, $price);

    $data = array('page' => 'massage_room', 'title' => 'Add Massage Service');
    $vdata = array('type' => 'massage_room');
    $this->load->view("header", $data);
    $this->load->view('service_success', $vdata);
    $this->load->view('footer');
  }

  public function sport_facility()
  {
    $this->check_login();
    $sport = $this->input->post("sport");
    $customer = $this->input->post("customer");
    $date = $this->input->post("date");
    $details = $this->input->post("details");
    $price = $this->input->post("price");

    $this->sport_facility_m->add_service($sport, $customer, $date, $details, $price);

    $data = array('page' => 'sport_facility', 'title' => 'Add Sport Service');
    $vdata = array('type' => 'sport_facility');
    $this->load->view("header", $data);
    $this->load->view('service_success', $vdata);
    $this->load->view('footer');
  }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */