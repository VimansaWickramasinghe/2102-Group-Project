<?php

class Users extends Controller{

    public function __construct() { 
        $this->userModel = $this->model('User');
    }


    //Userrole login function ////////////////////////////////////////////////////////////////////////////////////////
    
    public function login() {
        $data = [
        'title' =>'Login Page'
    ];
    $this-> view('users/login', $data);
    }


    //Customer registration function//////////////////////////////////////////////////////////////////////////////////
    
    public function Customer_register() 
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/[a-zA-Z]/";
            $passwordValidation = "/(.{0,7}|[^a-z]|[^\d])/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } else if (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else{
                //Check if email exists.
                if ($this->userModel->findCustomerByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }
            

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } else if(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            }  else if (!preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }



            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->Customer_register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }else{
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
        }
        $this->view('users/Customer_register', $data);
    }




    //Customer login function ////////////////////////////////////////////////////////////////////////////////////////

    public function Customer_login() {

        $data = [
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => '' 
        ];

        //check for post data
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                  $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['pwd']),
                    'emailError' => '',
                    'passwordError' => '' 
                  ];
            //Validate email
            if(empty($data['email'])){
                $data['emailError'] = 'please enter email.';
        }

            //Validate password
            if(empty($data['password'])){
                $data['passwordError'] = 'please enter password.';
            }

            //check if all errors are empty
            if(empty($data['emailError']) && empty($data['passwordError'])){
                $loggedInCustomer = $this->userModel->Customer_login($data['email'], $data['password']);
            
            if ($loggedInCustomer) {
                $this->createCustomerSession($loggedInCustomer);
            } else {
                $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                $this->view('users/Customer_login', $data);
            }
        }  
        }else{
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '' 
            ];
        }   
        
       $this-> view('users/Customer_login', $data);
}

   public function createCustomerSession($user) {
    session_start();
    $_SESSION['cus_id'] = $user->cus_id;
    $_SESSION['FullName'] = $user->FullName;
    $_SESSION['email'] = $user->Email;

    header('location:' . URLROOT . '/pages/index');

    }

    public function logout() {
    unset($_SESSION['cus_id']);
    unset($_SESSION['FullName']);
    unset($_SESSION['Email']);
    if(!empty($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }

    header('location:' . URLROOT . '/users/login');
    }





    //Driver Registration //////////////////////////////////////////////////////////////////////////////////////////
    public function Dregister() {
        $data = [
           'name' =>'',
           'number' =>'',
           'address' =>'',
           'nic' =>'',
           'gender' =>'',
           'email' =>'',
           'vehicle' =>'',
           'vnumber' =>'',
           'password' =>'',
           'confirmPassword' =>'',
           'emailError' =>'',
           'passwordError' => '',
           'confirmPasswordError' => '',
       ];
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'name' => trim($_POST['name']),
                'number' =>trim($_POST['number']),
                'address' =>trim($_POST['address']),
                'nic' =>trim($_POST['nic']),
                'gender' =>($_POST['gender']),
                'email' => trim($_POST['email']),
                'vehicle' =>($_POST['vehicle']),
                'vnumber' =>trim($_POST['vnumber']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findDriverByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } else if(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } else if (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->Dregister($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }

       $this-> view('users/Dregister', $data);

   }






//Driver login
public function Driver_login() {

   $data = [
       'email' => '',
       'password' => '',
       'emailError' => '',
       'passwordError' => '' 
   ];

   //check for post data
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
       // Sanitize POST data
       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             $data = [
               'email' => trim($_POST['email']),
               'password' => trim($_POST['pwd']),
               'emailError' => '',
               'passwordError' => '' 
             ];
       //Validate email
       if(empty($data['email'])){
           $data['emailError'] = 'please enter email.';
   }

       //Validate password
       if(empty($data['password'])){
           $data['passwordError'] = 'please enter password.';
       }

       //check if all errors are empty
       if(empty($data['emailError']) && empty($data['passwordError'])){
           $loggedInDriver = $this->userModel->Driver_login($data['email'], $data['password']);
       
       if ($loggedInDriver) {
           $this->createDriverSession($loggedInDriver);
       } else {
           $data['passwordError'] = 'Password or username is incorrect. Please try again.';

           $this->view('users/Driver_login', $data);
       }
   }  
   }else{
       $data = [
           'email' => '',
           'password' => '',
           'emailError' => '',
           'passwordError' => '' 
       ];
    }   
   
    $this-> view('users/Driver_login', $data);
    }

    public function createDriverSession($user) {
    session_start();
    $_SESSION['driver_id'] = $user->driver_id;
    $_SESSION['fullname'] = $user->fullname;
    $_SESSION['email'] = $user->email;

    header('location:' . URLROOT . '/Drivers/DOrder');

    }

    public function Driverlogout() {
    unset($_SESSION['driver_id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['email']);
    header('location:' . URLROOT . '/users/login');
    }




    //seller registration ///////////////////////////////////////////////////////////////////////////////////////////

    public function Seller_register() {
        $data = [
            'businessName' => '',
            'brNo' => '',
            'businessAddress' => '',
            'city' => '',
            'ownerName' => '',
            'contactNo' => '',
            'email' => '',
            'shopImg' => '',
            'password' => '',
            'confirmPassword' => '',
            'brNoError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'businessName' => trim($_POST['businessName']),
                'brNo' => trim($_POST['brNo']),
                'businessAddress' => trim($_POST['businessAddress']),
                'city' => trim($_POST['city']),
                'ownerName' => trim($_POST['ownerName']),
                'contactNo' => trim($_POST['contactNo']),
                'email' => trim($_POST['email']),
                'shopImg' => trim($_POST['shopImg']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'brNoError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[A-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate br number on letters/numbers
            if (empty($data['brNo'])) {
                $data['brNoError'] = 'Please enter BR Number.';
            } elseif (!preg_match($nameValidation, $data['brNo'])) {
                $data['brNoError'] = 'Name can only contain capital letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findSellerByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = '';//minimum a number should include
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['brNoError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->Seller_register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
            
        }
        $this->view('users/Seller_register', $data);
    }


    




    //Seller login ////////////////////////////////////////////////////////////////////////////////////////////////


    public function Seller_login() {

         

            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '' 
            ];
         
            //check for post data
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
                      $data = [
                        'email' => trim($_POST['email']),
                        'password' => trim($_POST['pwd']),
                        'emailError' => '',
                        'passwordError' => '' 
                      ];
                //Validate email
                if(empty($data['email'])){
                    $data['emailError'] = 'please enter email.';
            }
         
                //Validate password
                if(empty($data['password'])){
                    $data['passwordError'] = 'please enter password.';
                }
         
                //check if all errors are empty
                if(empty($data['emailError']) && empty($data['passwordError'])){
                    $loggedInSeller = $this->userModel->Seller_login($data['email'], $data['password']);
                
                if ($loggedInSeller) {
                    $this->createSellerSession($loggedInSeller);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
         
                    $this->view('users/Seller_login', $data);
                }
            }  
            }else{
                $data = [
                    'email' => '',
                    'password' => '',
                    'emailError' => '',
                    'passwordError' => '' 
                ];
             }   
            
             $this-> view('users/Seller_login', $data);
             }
        
            public function createSellerSession($user) {
             session_start();
             $_SESSION['seller_id'] = $user->seller_id;
             $_SESSION['seller_name'] = $user->businessName;
             $_SESSION['shopimg'] = $user->shopimg;
             $_SESSION['email'] = $user->email;
             $_SESSION['contact'] = $user->contactNo;
         
             header('location:' . URLROOT . '/Sellers/dashboard');
         
             }
         
             public function Sellerlogout() {

             unset($_SESSION['seller_id']);

             unset($_SESSION['email']);
             header('location:' . URLROOT . '/users/login');
             }






//Admin Login ////////////////////////////////////////////////////////////////////////////////////////////
           public function Admin_login() {

            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '' 
            ];
    
            //check for post data
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                      $data = [
                        'email' => trim($_POST['email']),
                        'password' => trim($_POST['password']),
                        'emailError' => '',
                        'passwordError' => '' 
                      ];
                //Validate email
                if(empty($data['email'])){
                    $data['emailError'] = 'please enter email.';
            }
    
                //Validate password
                if(empty($data['password'])){
                    $data['passwordError'] = 'please enter password.';
                }
    
                //check if all errors are empty
                if(empty($data['emailError']) && empty($data['passwordError'])){
                    $loggedInAdmin = $this->userModel->Admin_login($data['email'], $data['password']);
                
                if ($loggedInAdmin) {
                    $this->createAdminSession($loggedInAdmin);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
    
                    $this->view('users/AM_login', $data);
                }
            }  
            }else{

                $data = [
                    'email' => '',
                    'password' => '',
                    'emailError' => '',
                    'passwordError' => '' 
                ];
            }   
            
           $this-> view('users/AM_login', $data);
    }
    
       public function createAdminSession($admin) {
        session_start();
        $_SESSION['admin_id'] = $admin->id;
         $_SESSION['email'] = $admin->email;
    
        header('location:' . URLROOT . '/Admins/A_dashboard');
    
        }
    
        public function Adminlogout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/Admin_login');
        }

        public function AM_login(){

            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '' 
            ];

            $this-> view('users/AM_login',$data);
        }





//Moderator Login ////////////////////////////////////////////////////////////////////////////////////////////

public function Moderator_login() {

    $data = [
        'email' => '',
        'password' => '',
        'emailError' => '',
        'passwordError' => '' 
    ];

    //check for post data
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => '' 
              ];
        //Validate email
        if(empty($data['email'])){
            $data['emailError'] = 'please enter email.';
    }

        //Validate password
        if(empty($data['password'])){
            $data['passwordError'] = 'please enter password.';
        }

        //check if all errors are empty
        if(empty($data['emailError']) && empty($data['passwordError'])){
            $loggedInModerator = $this->userModel->Moderator_login($data['email'], $data['password']);
        
        if ($loggedInModerator) {
            $this->createModeratorSession($loggedInModerator);
        } else {
            $data['passwordError'] = 'Password or username is incorrect. Please try again.';

            $this->view('users/AM_login', $data);
        }
    }  
    }else{

        $data = [
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => '' 
        ];
    }   
    
   $this-> view('users/AM_login', $data);
}

public function createModeratorSession($moderator) {
session_start();
$_SESSION['moderator_id'] = $moderator->id;
 $_SESSION['email'] = $moderator->email;

header('location:' . URLROOT . '/Moderators/M_review_plant');

}

public function Moderatorlogout() {
unset($_SESSION['moderator_id']);
unset($_SESSION['email']);
header('location:' . URLROOT . '/users/AM_login');
}

/* public function AM_login(){

    $data = [
        'email' => '',
        'password' => '',
        'emailError' => '',
        'passwordError' => '' 
    ];

    $this-> view('users/AM_login',$data);
} */



}


     

    

