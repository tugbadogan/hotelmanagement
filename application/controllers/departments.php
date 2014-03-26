<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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

	public function add()
	{
		
		if($this->input->post("departmentName"))
		{
			$departmentName = $this->input->post("departmentName");
			$departmentBudget = $this->input->post("departmentBudget");
			
			$this->departments_m->addDepartment($departmentName, $departmentBudget);
			redirect("/departments");
		}

		$data = array('title' => 'Add Department - DB Hotel Management System', 'page' => 'departments');
		$this->load->view('header', $data);
		$departments = $this->departments_m->get_departments();
		$viewdata = array('departments' => $departments);
		$this->load->view('departments/add',$viewdata);
		$this->load->view('footer');
	}

	function delete($department_id)
	{
		$this->departments_m->deleteDepartment($department_id);
		redirect("/departments");
	}

	public function edit($department_id)
	{
		if($this->input->post("departmentName"))
		{
			$departmenName = $this->input->post("departmentName");
			$departmentBudget = $this->input->post("departmentBudget");
			
			$this->departments_m->editEmployee($department_id, $departmenName, $departmentBudget);
			redirect("/departments");
		}
		
		$data = array('title' => 'Edit Department - DB Hotel Management System', 'page' => 'departments');
		$this->load->view('header', $data);

		$department = $this->departments_m->getDepartment($department_id);
		
		$viewdata = array('department'  => $department[0]);

		$this->load->view('departments/edit',$viewdata);

		$this->load->view('footer');
	}

	public function index()
	{
		$departments = $this->departments_m->get_departments();

		$viewdata = array('departments' => $departments);

		$data = array('title' => 'Departments - DB Hotel Management System', 'page' => 'departments');
		$this->load->view('header', $data);
		$this->load->view('departments/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */