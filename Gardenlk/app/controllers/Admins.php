<?php 

class Admins extends Controller{
    public function __construct() { 
        $this->adminModel = $this->model('Admin');
    }
    
    
     public function A_dashboard() {


        $ContactIssueCount = $this->adminModel -> ContactIssuesCount();
        $CustomerCount = $this->adminModel -> CustomerCount();
        $SellerCount = $this->adminModel -> SellersCount();
        $DeliveryPersonCount = $this->adminModel -> DeliveryPersonsCount();
        $ModeratorCount = $this->adminModel -> ModeratorsCount();
        $AdminCount = $this->adminModel -> AdminCount(); 

        $data = [
            'IssueCount' => $ContactIssueCount,
            'CustomerCount' => $CustomerCount,
            'SellerCount' => $SellerCount,
            'DriverCount' => $DeliveryPersonCount,
            'ModeratorCount' => $ModeratorCount,
            'AdminCount' => $AdminCount 

        ];

        $this-> view('admins/A_dashboard', $data);

    } 



    public function A_dp_request() {

        $drivers = $this->adminModel->findAllDrivers();
        $data = [
            'drivers' => $drivers
        ];  

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'driver_id' => trim($_POST['driverId']),
            ];
                if($this->adminModel->AcceptDriver($data))
                {
                    header("Location: " . URLROOT . "/admins/A_dp_request");
                    echo "<script>alert('Delivery Person successfully added...!')</script>";
                    echo "<script>window.location = 'A_dp_request'</script>";
                }else{
                    die("Something went wrong, Please try again!");
                }
        

       $this-> view('moderators/A_dp_request', $data);

        }

        $this-> view('admins/A_dp_request', $data);

    }


    public function A_dp_requestCancelled() { 

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'driver_id' => trim($_POST['driverId']),
            ];
                if($this->adminModel->CancelDriver($data))
                {
                    header("Location: " . URLROOT . "/admins/A_dp_request");
                    echo "<script>alert('Delivery Person removed...!')</script>";
                    echo "<script>window.location = 'A_dp_request'</script>";
                }else{
                    die("Something went wrong, Please try again!");
                }
        
       $this-> view('moderators/A_dp_request', $data);

        }

        $this-> view('admins/A_dp_request', $data);

    }


    

    public function A_users_customer() {
        $data = [
            'title' =>'Login Page'
        ];

        $cus = $this->adminModel->findAllCustomers();
        $data = [
            'customers' => $cus
        ];  

        $this-> view('admins/A_users_customer', $data);

    }




    public function A_users_admin() {
        $data = [
            'title' =>'Login Page'
        ];

        $admin = $this->adminModel->findAllAdmins();
        $data = [
            'admins' => $admin
        ];
        $this-> view('admins/A_users_admin', $data);

    }


    public function A_users_delivery() {
        $data = [
            'title' =>'Login Page'
        ];

        $drivers = $this->adminModel->findAllApprovedDrivers();
        $data = [
            'drivers' => $drivers
        ]; 
        $this-> view('admins/A_users_delivery', $data);

    }


    public function A_users_moderator() {
        $data = [
            'title' =>'Login Page'
        ];

        $moderators = $this->adminModel->findAllModerators();
        $data = [
            'moderators' => $moderators
        ];
        $this-> view('admins/A_users_moderator', $data);

    }


    public function A_users_seller() {
        $data = [
            'title' =>'Login Page'
        ];

        $seller = $this->adminModel->findAllSellers();
        $data = [
            'sellers' => $seller
        ];
        $this-> view('admins/A_users_seller', $data);

    }

    public function A_settings() {

        $data = [
            'cpassword' =>'',
            'npassword' =>'',
            'cnpassword' =>'',
            'currentPasswordError' =>'',
            'passwordError' =>'',
            'confirmPasswordError' =>'',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                
                'cpassword' => $_POST['cpassword'],
                'npassword' => $_POST['npassword'],
                'cnpassword' => $_POST['cnpassword'],
                'currentPasswordError' =>'',
                'passwordError' =>'',
                'confirmPasswordError' =>'',
            ];


            //Validate confirm password
            if (empty($data['cnpassword'])) {
                $data['confirmPasswordError'] = 'Please enter confirm password.';
            } else {
                if ($data['npassword'] != $data['cnpassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            if(empty($data['confirmPasswordError'])){
                $admin = $this->adminModel->findAdminPassword();

                $Passworddata = [
                    'admin' => $admin
                ];
var_dump($Passworddata);
                if ($data['cpassword'] == $Passworddata['admin'][0]->password ){
                    if ($this->adminModel->A_changePassword($data)) {
                        //Redirect to the login page
                        header('location: ' . URLROOT . '/admins/A_dashboard');
                    } else {
                        die('Something went wrong.');
                    }  
            } else{
                $data['currentPasswordError'] = 'Passwords do not match, please try again.';
            }
        $this-> view('admins/A_settings', $data);
            }
    }
    $this-> view('admins/A_settings', $data);
}




public function A_issues() {
    $data = [
        'title' =>'Login Page'
    ];

    $contact = $this->adminModel -> contactIssues();

    $data = [
        'contact' =>$contact,
    ];
   

    $this-> view('admins/A_issues', $data);

}





















public function A_users_adduser_admin() {
    $data = [
        'email' => '',
        'password' => '',
        'repassword' => '',
        'emailError' => '',
        'passwordError' => '',
        'confirmPasswordError' => ''
    ];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Process form
    // Sanitize POST data
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data = [
            
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'repassword' => trim($_POST['repassword']),
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        
        $nameValidation = "/^[a-zA-Z0-9]*$/";
        $passwordValidation = "/^(.{0,7}|[^a-z]|[^\d])$/i";


        //Validate email
        if (empty($data['email'])) {
            $data['emailError'] = 'Please enter email address.';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = 'Please enter the correct format.';
        } else{
            //Check if email exists.
            if ($this->adminModel->findAdminByEmail($data['email'])) {
            $data['emailError'] = 'Email is already taken.';
            }
        }
        

       // Validate password on length, numeric values,
        if(empty($data['password'])){
          $data['passwordError'] = 'Please enter password.';
        } else if(strlen($data['password']) < 6){
          $data['passwordError'] = 'Password must be at least 8 characters';
        } /* else if (!preg_match($passwordValidation, $data['password'])) {
          $data['passwordError'] = 'Password must be have at least one numeric value.';
        } */

        //Validate confirm password
         if (empty($data['repassword'])) {
            $data['confirmPasswordError'] = 'Please enter password.';
        } else {
            if ($data['password'] != $data['repassword']) {
            $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
            }
        }

        // Make sure that errors are empty
        if (empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

            // Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
            //Register user from model function
            if ($this->adminModel->A_users_adduser_admin($data)) {
                //Redirect to the login page
                header('location: ' . URLROOT . '/admins/A_dashboard');
            } else {
                die('Something went wrong.');
            }
        }
    }
    $this-> view('admins/A_users_adduser_admin', $data);

}







public function A_users_adduser_customer() {
    $data = [
        'Fullname' => '',
        'Email' => '',
        'Password' => '',
        'repassword' => '',
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
            'Fullname' => trim($_POST['Fullname']),
            'Email' => trim($_POST['Email']),
            'Password' => trim($_POST['Password']),
            'repassword' => trim($_POST['repassword']),
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        $nameValidation = "/^[a-zA-Z0-9]*$/";
        $passwordValidation = "/^(.{0,7}|[^a-z]|[^\d])$/i";

        //Validate username on letters/numbers
        if (empty($data['Fullname'])) {
            $data['usernameError'] = 'Please enter Fullname.';
        } /* else if (!preg_match($nameValidation, $data['username'])) {
            $data['usernameError'] = 'Name can only contain letters and numbers.';
        } */

        //Validate email
        if (empty($data['Email'])) {
            $data['emailError'] = 'Please enter email address.';
        } else if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = 'Please enter the correct format.';
        } else{
            //Check if email exists.
            if ($this->adminModel->findCustomerByEmail($data['Email'])) {
            $data['emailError'] = 'Email is already taken.';
            }
        }
        

       // Validate password on length, numeric values,
        if(empty($data['Password'])){
          $data['passwordError'] = 'Please enter password.';
        } else if(strlen($data['Password']) < 6){
          $data['passwordError'] = 'Password must be at least 8 characters';
        } /* else if (!preg_match($passwordValidation, $data['password'])) {
          $data['passwordError'] = 'Password must be have at least one numeric value.';
        } */

        //Validate confirm password
         if (empty($data['repassword'])) {
            $data['confirmPasswordError'] = 'Please enter password.';
        } else {
            if ($data['Password'] != $data['repassword']) {
            $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
            }
        }

        // Make sure that errors are empty
        if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

            // Hash password
            $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);
        
            //Register user from model function
            if ($this->adminModel->A_users_adduser_customer($data)) {
                //Redirect to the login page
                header('location: ' . URLROOT . '/admins/A_dashboard');
            } else {
                die('Something went wrong.');
            }
        }
    }
    $this-> view('admins/A_users_adduser_customer', $data);

}



    public function A_users_adduser_delivery(){

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
        

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                  $data = [
                    'name' => trim($_POST['fname']),
                    'number' =>trim($_POST['cnumber']),
                    'address' =>trim($_POST['address']),
                    'nic' =>trim($_POST['nnumber']),
                    'gender' =>($_POST['gender']),
                    'email' => trim($_POST['email']),
                    'vehicle' =>($_POST['vtype']),
                    'vnumber' =>trim($_POST['vnumber']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['repassword']),
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
                    if ($this->adminModel->findDriverByEmail($data['email'])) {
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
                    if ($this->adminModel->A_users_adduser_delivery($data)) {
                        //Redirect to the login page
                        header('location: ' . URLROOT . '/admins/A_dashboard');
                    } else {
                        die('Something went wrong.');
                    }
                }
            }
    
           $this-> view('admins/A_users_adduser_delivery', $data);



        /* $data = [
            'title' =>'Login Page'
        ];
        $this-> view('admins/A_users_adduser_delivery', $data); */

    }








    public function A_users_adduser_moderator() {
        $data = [
            'email' => '',
            'password' => '',
            'repassword' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'repassword' => trim($_POST['repassword']),
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]|[^\d])$/i";


            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else{
                //Check if email exists.
                if ($this->adminModel->findModeratorByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }
            

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } else if(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } /* else if (!preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            } */

            //Validate confirm password
             if (empty($data['repassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['repassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            
                //Register user from model function
                if ($this->adminModel->A_users_adduser_moderator($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/admins/A_dashboard');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this-> view('admins/A_users_adduser_moderator', $data);

    }

    public function A_users_adduser_seller() {
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
                if ($this->adminModel->findSellerByEmail($data['email'])) {
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
                if ($this->adminModel->A_users_adduser_seller($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/admins/A_dashboard');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this-> view('admins/A_users_adduser_seller', $data);

    }

    public function A_users_adduser() {
        $data = [
            'title' =>'Login Page'
        ];
        $this-> view('admins/A_users_adduser', $data);

    }

    

    public function A_users_updateuser_admin() {
        $data = [
            'title' =>'Login Page'
        ];
        $this-> view('admins/A_users_updateuser_admin', $data);

    }

    public function A_users_updateuser_customer() {
        
            
        

        if (isset($_POST['update'])) {
            
              $updateId=$_GET['id'];
    }

    $cus = $this->adminModel->findCustomerDetails($updateId);
        $data = [
            'title' =>'Login Page',
            'customerDetails' => $cus
        ]; 

        $this-> view('admins/A_users_updateuser_customer', $data);

    }

    public function A_users_updateuser_delivery() {
        $data = [
            'title' =>'Login Page'
        ];
        $this-> view('admins/A_users_updateuser_delivery', $data);

    }

    public function A_users_updateuser_moderator() {
        $data = [
            'title' =>'Login Page'
        ];
        $this-> view('admins/A_users_updateuser_moderator', $data);

    }

    public function A_users_updateuser_seller() {
        $data = [
            'title' =>'Login Page'
        ];
        $this-> view('admins/A_users_updateuser_seller', $data);

    }

    public function A_DeleteUser() {

        $data = [
            'title' =>'Login Page',
            'deleteId' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                  $data = [
                    'deleteId' => trim($_POST['deleteId'])
                  ];

         if($this->adminModel -> DeleteUser($data)){
             
            header('location: ' . URLROOT . '/admins/A_users_customer');
         }else{
            die('Something went wrong.');
         }

    }
}



    
}