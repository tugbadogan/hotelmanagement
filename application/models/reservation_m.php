<?php

class Reservation_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_available_rooms($room_type, $checkin_date, $checkout_date)
    {
        $query = $this->db->query("CALL get_available_rooms('$room_type','$checkin_date','$checkout_date')");
        
        $this->db->reconnect();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    }

    public function add_reservation($data, $date=NULL)
    {
        $data['reservation_date'] = $date;
        $query = $this->db->insert('reservation', $data);
//        return $query->affected_rows();
    }
}
