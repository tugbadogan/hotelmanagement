<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tugbadeneme extends CI_Controller {

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

  public function index()
  {
    echo "<pre>";
    // $this->user_m->check_login("cihad","12345");
    //$this->employee_m->addEmployee("ali", "abc", "Ali", "Abc", "123456789", "x@x.com.tr", 3, "waiter", 1000, "12.12.2013");
    $this->employee_m->addEmployee("ayse", "123", "Ayse", "Al", "123456789", "ayse@ayse.com.tr", 3, "waiter", 1000, "22.12.2013");
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */