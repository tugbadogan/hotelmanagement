<?php

class Massage_room_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_massageRooms()
    {
        $query = $this->db->from('massage_room')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    }

    function addMassageroom($massageroomOpenTime, $massageroomCloseTime, $massageroomDetails)
    {
        $data = array('massageroom_open_time' => $massageroomOpenTime, 'massageroom_close_time' => $massageroomCloseTime, 'massageroom_details' => $massageroomDetails);
        $this->db->insert('massage_room', $data);
        return $this->db->affected_rows();
    }

    function deleteMassageroom($massageroom_id)
    {
        $this->db->delete('massage_room', array('massageroom_id' => $massageroom_id));
        return $this->db->affected_rows();
    }

    function editMassageroom($massageroom_id, $massageroom_open_time, $massageroom_close_time, $massageroom_details)
    {
        $data = array('massageroom_open_time' => $massageroom_open_time, 'massageroom_close_time' => $massageroom_close_time, 'massageroom_details' => $massageroom_details);

        $this->db->where('massageroom_id', $massageroom_id);
        $this->db->update('massage_room', $data); 
    }

    function get_massageroom($massageroom_id)
    {
        $query = $this->db->get_where('massage_room', array('massageroom_id' => $massageroom_id));
        return $query->result();
    }

    function add_service($massage_room, $customer, $date, $details, $price)
    {
        $data = array(
            'massageroom_id' => $massage_room,
            'customer_id' => $customer,
            'employee_id' => UID,
            'massage_date' => $date,
            'massage_details' => $details,
            'massage_price' => $price
        );
        $this->db->insert('massage_service', $data);
    }
}

