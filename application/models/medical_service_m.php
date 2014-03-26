<?php

class Medical_service_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_medicalServices()
    {
        $query = $this->db->from('medical_service')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    }

    function addMedicalservice($medicalserviceOpenTime, $medicalserviceCloseTime, $medicalserviceDetails)
    {
        $data = array('medicalservice_open_time' => $medicalserviceOpenTime, 'medicalservice_close_time' => $medicalserviceCloseTime, 'medicalservice_details' => $medicalserviceDetails);
        $this->db->insert('medical_service', $data);
        return $this->db->affected_rows();
    }

    function deleteMedicalservice($medicalservice_id)
    {
        $this->db->delete('medical_service', array('medicalservice_id' => $medicalservice_id));
        return $this->db->affected_rows();
    }

    function editMedicalservice($medicalservice_id, $medicalservice_open_time, $medicalservice_close_time, $medicalservice_details)
    {
        $data = array('medicalservice_open_time' => $medicalservice_open_time, 'medicalservice_close_time' => $medicalservice_close_time, 'medicalservice_details' => $medicalservice_details);

        $this->db->where('medicalservice_id', $medicalservice_id);
        $this->db->update('medical_service', $data); 
    }

    function get_medicalservice($medicalservice_id)
    {
        $query = $this->db->get_where('medical_service', array('medicalservice_id' => $medicalservice_id));
        return $query->result();
    }

}
