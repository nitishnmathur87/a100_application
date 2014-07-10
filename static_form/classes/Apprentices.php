<?php

class Apprentices {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function email_exists($email_address) {

        $stmt = $this->db->prepare("SELECT * FROM `apprentice` WHERE `email_address`= ?");
        $stmt->bindValue(1, $email_address);

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

