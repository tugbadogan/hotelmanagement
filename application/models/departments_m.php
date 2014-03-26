<?php

class Departments_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_departments()
    {
        $query = $this->db->from('department')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    } 

    function addDepartment($departmentName, $departmentBudget)
    {
        $data = array('department_name' => $departmentName, 'department_budget' => $departmentBudget);
        $this->db->insert('department', $data);
        return $this->db->affected_rows();
    }

    function deleteDepartment($department_id)
    {
        $this->db->delete('department', array('department_id' => $department_id));
        return $this->db->affected_rows();
    }

    function editEmployee($department_id, $departmentName, $departmentBudget)
    {
        $data = array('department_name' => $departmentName, 'department_budget' => $departmentBudget);

        $this->db->where('department_id', $department_id);
        $this->db->update('department', $data); 
    }

    function getDepartment($department_id)
    {
        $query = $this->db->get_where('department', array('department_id' => $department_id));
        return $query->result();
    }

}
