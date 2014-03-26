<?php

class Employee_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_employees()
    {
        $query = $this->db->from('employee')->join('department', 'department.department_id=employee.department_id')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
        }
        if(count($data))
            return $data;
        return false;
    } 

    function addEmployee($username, $password, $firstname, $lastname, $telephone, $email, $departmentid, $employee_type, $employee_salary, $employee_hiring_date)
    {
        $data = array('employee_username' => $username, 'employee_password' => $password, 'employee_firstname' => $firstname, 'employee_lastname' => $lastname, 'employee_telephone' => $telephone, 'employee_email' => $email, 'department_id' => $departmentid, 'employee_type' => $employee_type, 'employee_salary' => $employee_salary, 'employee_hiring_date' => $employee_hiring_date);
        $this->db->insert('employee', $data);
        return $this->db->affected_rows();
    } 

    function deleteEmployee($employee_id)
    {
        $this->db->delete('employee', array('employee_id' => $employee_id));
        return $this->db->affected_rows();
    }

    function editEmployee($employee_id, $username, $password, $firstname, $lastname, $telephone, $email, $department_id, $employee_type, $employee_salary, $employee_hiring_date)
    {
        $data = array('employee_username' => $username, 'employee_password' => $password, 'employee_firstname' => $firstname, 'employee_lastname' => $lastname, 'employee_telephone' => $telephone, 'employee_email' => $email, 'department_id' => $department_id, 'employee_type' => $employee_type, 'employee_salary' => $employee_salary, 'employee_hiring_date' => $employee_hiring_date);

        $this->db->where('employee_id', $employee_id);
        $this->db->update('employee', $data); 
    }

    function getEmployee($employee_id)
    {
        $query = $this->db->get_where('employee', array('employee_id' => $employee_id));
        return $query->result();
    }

    function getDepartments()
    {
        $query = $this->db->from('department')->get();
        $data = array();

        foreach ($query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
        }
        if(count($data))
            return $data;
        return false;
    }   
}
