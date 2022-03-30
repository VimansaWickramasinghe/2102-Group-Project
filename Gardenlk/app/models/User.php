<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function Customer_register($data){

        $this->db->query('INSERT INTO customer (FullName, Email, Password) VALUES (:username, :email, :password)');
        //Bind Values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute Function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    

        public function Customer_login($email, $password) {
            $this->db->query('SELECT * FROM customer WHERE Email = :email');
    
            //Bind value
            $this->db->bind(':email', $email);
   
            $row = $this->db->single();
    
            $hashedPassword = $row->Password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }
   







        //Find user by email. Email is passed in by the controller 
        public function findCustomerByEmail($email) {
            //Prepared statement
            $this->db->query('SELECT * FROM customer WHERE Email = :email');
    
            //Email param will be binded with the email variable
            $this->db->bind(':email', $email);
    
            //Check if email is already registered
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }








        
	    public function Dregister($data) {
            $this->db->query('INSERT INTO driver (fullname, phoneNo, address, nic, gender, email, vehicel, vehicel_number, password) VALUES(:name, :number, :address, :nic, :gender, :email, :vehicle, :vnumber, :password)');
    
            //Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':number', $data['number']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':vehicle', $data['vehicle']);
            $this->db->bind(':vnumber', $data['vnumber']);
            $this->db->bind(':password', $data['password']);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }








        public function Driver_login($email, $password) {
            $this->db->query('SELECT * FROM driver WHERE email = :email AND status="accept"');
    
            //Bind value
            $this->db->bind(':email', $email);
   
            $row = $this->db->single();
    
            $hashedPassword = $row->password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }
        











        //Find user by email. Email is passed in by the Controller.
    public function findDriverByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM driver WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }













     
    
        public function Seller_register($data) {
            $this->db->query('INSERT INTO seller ( businessName,brNo,businessAddress,city,ownerName,contactNo,email,shopimg, password) VALUES( :businessName,:brNo,:businessAddress,:city,:ownerName,:contactNo,:email,:shopImg, :password)');
    
            //Bind values
           // $this->db->bind(':username', $data['username']);
            $this->db->bind(':businessName', $data['businessName']);
            $this->db->bind(':brNo', $data['brNo']);
            $this->db->bind(':businessAddress', $data['businessAddress']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':ownerName', $data['ownerName']);
            $this->db->bind(':contactNo', $data['contactNo']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':shopImg', $data['shopImg']);
            $this->db->bind(':password', $data['password']);
    
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    










        public function Seller_login($email, $password) {
            $this->db->query('SELECT * FROM seller WHERE email = :email');
    
            //Bind value
            $this->db->bind(':email', $email);
   
            $row = $this->db->single();
    
            $hashedPassword = $row->password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }



         
    





        //Find user by email. Email is passed in by the Controller.
        public function findSellerByEmail($email) {
            //Prepared statement
            $this->db->query('SELECT * FROM seller WHERE email = :email');
    
            //Email param will be binded with the email variable
            $this->db->bind(':email', $email);
    
            //Check if email is already registered
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }




        public function Admin_login($email, $password) {
            $this->db->query('SELECT * FROM admin WHERE email = :email');
    
            //Bind value
            $this->db->bind(':email', $email);
   
            $row = $this->db->single();
    
             $currentPassword = $row->password; 
    
            if ($password == $currentPassword) {
                return $row;
            } else {
                return false;
            }
        }

        //Find user by email. Email is passed in by the controller 
        public function findAdminByEmail($email) {
            //Prepared statement
            $this->db->query('SELECT * FROM admin WHERE email = :email');
    
            //Email param will be binded with the email variable
            $this->db->bind(':email', $email);
    
            //Check if email is already registered
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }


        public function Moderator_login($email, $password) {
            $this->db->query('SELECT * FROM moderator WHERE email = :email');
    
            //Bind value
            $this->db->bind(':email', $email);
   
            $row = $this->db->single();
    
             $currentPassword = $row->password; 
    
            if ($password == $currentPassword) {
                return $row;
            } else {
                return false;
            }
        }

        //Find user by email. Email is passed in by the controller 
        public function findModeratorByEmail($email) {
            //Prepared statement
            $this->db->query('SELECT * FROM moderator WHERE email = :email');
    
            //Email param will be binded with the email variable
            $this->db->bind(':email', $email);
    
            //Check if email is already registered
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }





    }
    


        

