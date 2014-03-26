<?php

class Report_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function today_stats()
    {
        $date = date('Y-m-d');
        $query = $this->db->query("CALL todays_service_count('$date')");
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[$row->type] = $row->amount;
        }
        if(count($data))
            return $data;
        return false;
    }

    function search_customers($query)
    {
        $query = $this->db->from("customer")->like('customer_firstname', $query)->or_like('customer_lastname', $query)->get();
        $data = array();
        foreach ($query->result() as $res) {
            $data[] = $res;
        }
        return $data;
    }

    function get_customer_freq_list() {
        $this->db->reconnect();
        $query = $this->db->select("customer.* , SUM(  `room_sales_price` +  `total_service_price` ) as total_paid, COUNT(*) as checkin_count")
                ->from("room_sales")->join("customer", "customer.customer_id = room_sales.customer_id")
                ->group_by("customer_id")->order_by('checkin_count','DESC')->order_by('total_paid','DESC')->get();
        $data = array();
        foreach ($query->result() as $res) {
            $data[] = $res;
        }
        return $data;
    }

    function get_customer_most_paid() {
/*        $query = $this->db->select("customer.* , SUM(  `room_sales_price` +  `total_service_price` ) as total_paid")
                ->from("room_sales")->join("customer", "customer.customer_id = room_sales.customer_id")
                ->group_by("customer_id")->having('total_paid = MAX(total_paid)')->get();*/
        $query = $this->db->query(
            "SELECT * , COUNT(*) as checkin_count,  SUM(  `room_sales_price` +  `total_service_price` ) AS total_paid
            FROM room_sales
            JOIN (
                SELECT MAX( total_paid ) AS max_paid
                FROM (                
                    SELECT customer_id, SUM(  `room_sales_price` +  `total_service_price` ) AS total_paid
                    FROM room_sales
                    GROUP BY  `customer_id`
                ) AS SRS
            ) AS MRS
            LEFT JOIN customer ON customer.customer_id = room_sales.customer_id
            GROUP BY room_sales.customer_id HAVING total_paid = max_paid"// HAVING total_paid = max_paid
        );
        $data = array();
        foreach ($query->result() as $res) {
            $data[] = $res;
        }
        return $data;
    }

    function get_next_week_freq() {
        $dates = array();
        $freq_counts = array();
        for($day = 1; $day<=7; ++$day) {
            $date = date("Y-m-d",strtotime("+$day day"));
            $query = $this->db->query("SELECT COUNT(*) as count FROM reservation WHERE checkin_date <= '$date' AND checkout_date >= '$date'");
            $row = $query->row_array(0);
            $dates[] = $date;
            $freq_counts[] = intval($row['count']);
        }
        return array('dates' => $dates, 'freq_counts' => $freq_counts);

    }
}
