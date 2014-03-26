<?php

class User_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function check_login($username, $password)
    {
        $query = $this->db->from('employee')->join('department','employee.department_id=department.department_id')->where('employee_username', $username)->where('employee_password', $password)->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
            var_dump($row);
        }
        if(count($data))
            return $data;
        return false;
    }
}


// SELECT * FROM employee WHERE employee_username = '$username' AND employee_password = '$password'

// $username = admin\' or 1=1--
// $password = 12345

// SELECT * FROM employee WHERE employee_username = 'admin' or 1=1--' AND employee_password = '12345'

// $restoran_name = "Cihad'in Yeri"

// SELECT * FROM restorans WHERE restoran_name = '$restoran_name'
// SELECT * FROM restorans WHERE restoran_name = 'Cihad'in Yeri'