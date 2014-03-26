<?php

class Sport_facility_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_sportFacilities()
    {
        $query = $this->db->from('sport_facilities')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    }

    function addSportfacility($sportfacilityOpenTime, $sportfacilityCloseTime, $sportfacilityDetails)
    {
        $data = array('sportfacility_open_time' => $sportfacilityOpenTime, 'sportfacility_close_time' => $sportfacilityCloseTime, 'sportfacility_details' => $sportfacilityDetails);
        $this->db->insert('sport_facilities', $data);
        return $this->db->affected_rows();
    }

    function deleteSportfacility($sportfacility_id)
    {
        $this->db->delete('sport_facilities', array('sportfacility_id' => $sportfacility_id));
        return $this->db->affected_rows();
    }

    function editSportfacility($sportfacility_id, $sportfacility_open_time, $sportfacility_close_time, $sportfacility_details)
    {
        $data = array('sportfacility_open_time' => $sportfacility_open_time, 'sportfacility_close_time' => $sportfacility_close_time, 'sportfacility_details' => $sportfacility_details);

        $this->db->where('sportfacility_id', $sportfacility_id);
        $this->db->update('sport_facilities', $data); 
    }

    function get_sportfacility($sportfacility_id)
    {
        $query = $this->db->get_where('sport_facilities', array('sportfacility_id' => $sportfacility_id));
        return $query->result();
    }
    function add_service($sport_facility, $customer, $date, $details, $price)
    {
        $data = array(
            'sportfacility_id' => $sport_facility,
            'customer_id' => $customer,
            'employee_id' => UID,
            'dosport_date' => $date,
            'dosport_details' => $details,
            'dosport_price' => $price
        );
        $this->db->insert('do_sport', $data);
    }
}
