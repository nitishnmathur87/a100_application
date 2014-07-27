<?php

class Apprentices {
    private $db;
    private $db;
    private $first_name; 
    private $last_name; 
    private $email_address; 
    private $password;
    private $major;
    private $graduation_date;
    private $address;
    private $city;
    private $state;
    private $zip_code;
    private $mobile_phone;
    private $linked_profile;
    private $online_portfolio;
    private $work_status;
    private $age;
    private $schedule;
    private $complete;
    private $active;
    private $other;
    
    
    public function _construct($fname, $lname, $email="", $pwd, $major, $g_date, $address, 
            $city, $state, $zip, $phone, $profile, $portfolio, $work_status, $age=0, $schedule, 
            $complete, $active, $other){
        $this->first_name=fname;
        $this->last_name =lname;
        $this->email_address=$email;
        $this->password = pwd; 
        $this->major = $major;
        $this->graduation_date = $g_date;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip_code = $zip;
        $this->mobile_phone = $phone;
        $this->linked_profile=$profile;
        $this->online_portfolio = $portfolio;
        $this->work_status = $work_status;
        $this->age = age; 
        $this->schedule = $schedule;
        $this->complete = $complete;
        $this->active = $active;
        $this->other = $other;
    }
       
  

    public function __construct($database) {
        $this->db = $database;
    }

    public function email_exists($email) {

        $stmt = $this->db->prepare("SELECT COUNT(`apprentice_id`) FROM `apprentice` WHERE `email_address`= ?");
        $stmt->bindValue(1, $email);

        try {
            $stmt->execute();
            $rows = $stmt->fetchColumn();
            if ($rows == 1) { return true;} 
            else { return false; }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_apprentice($id) {
        $stmt = $this->db->prepare("SELECT * FROM `apprentice` WHERE `apprentice_id`= ?");
        $stmt->bindValue(1, $id);

        try {
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_apprentices() {
        $stmt = $this->db->prepare("SELECT * FROM `apprentice` ORDER BY `created_date` DESC");
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $query->fetchAll();
    }
    
    public function get_zipcode($zip) {
        $stmt = $this->db->prepare("SELECT * FROM 'apprentice' WHERE 'zip_code' = ?");
        $stmt->bindValue(1, $zip);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
           $e->getMessage();
        }
        return $query->fetchAll();
    }
    
    public function update_apprentice(){
        
    }
    
//    public function insert_apprentice(){
//      $stmt = $db->prepare("INSERT INTO apprentice(apprentice_id, first_name,last_name,email_address,password, major, graduation_date, address, city, state, zip_code, mobile_phone, linkedin_profile, eighteen_older, work_status, created_date, active, other) 
//                        VALUES(:null, :first_name,:last_name,:email_address,:password,:major, :graduation_date, :address, :city, :state, :zip_code, :mobile_phone, :linkedin_profile, :eighteen_older, :work_status, :created_date, :active, :other)");
//     try{
//      $stmt->execute(array(':field1' => $field1, ':field2' => $field2, ':field3' => $field3, ':field4' => $field4, ':field5' => $field5));
//     }
//     catch (PDOException $e){ $e->getMessage() ;} 
//      $affected_rows = $stmt->rowCount();  
//        
//    }
//    
   }

