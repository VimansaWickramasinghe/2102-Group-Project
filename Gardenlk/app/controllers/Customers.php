<?php

class Customers extends Controller{

    public function __construct() { 
        $this->customerModel = $this->model('Customer'); 
    }


    public function C_AddAddress() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $address = $this->customerModel -> findAllAddress();
        $data = [
            'customer' => $customerDetails,
            'address' =>$address
        ];
         
        $this-> view('customers/C_AddAddress', $data);
    }

    public function C_AddressBook() {
        $customerDetails = $this->customerModel -> showcustomerDetails();

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
        }

        $data = [
            'customer' => $customerDetails,
            'FullName' => '',
            'Line1' => '',
            'Line2' => '',
            'City' => '',
            'PostalCode' => '',
            'ContactNo' => '',
            'NameError' => '',
            'line1Error' => '',
            'line2Error' => '',
            'CityError' => '',
            'PostalCodeError' => '',
            'ContactNoError' => ''

        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'customer' => $customerDetails,
                'user_id' =>$_SESSION['cus_id'],
                'FullName' => trim($_POST['fname']),
                'Line1' => trim($_POST['line1']),
                'Line2' => trim($_POST['line2']),
                'City' => trim($_POST['City']),
                'PostalCode' => trim($_POST['PostalCode']),
                'ContactNo' => trim($_POST['ContactNo']),
                'NameError' => '',
                'line1Error' => '',
                'line2Error' => '',
                'CityError' => '',
                'PostalCodeError' => '',
                'ContactNoError' => ''

            ];

            if(empty($data['FullName'])) {
                $data['NameError'] = 'Name cannot be empty';
            }

            if(empty($data['Line1'])) {
                $data['line1Error'] = 'Please fill the Address';
            }

            if(empty($data['Line2'])) {
                $data['line2Error'] = 'Please fill the Address';
            }

            if(empty($data['City'])) {
                $data['CityError'] = 'Please enter city';
            }

            if(empty($data['ContactNo'])) {
                $data['ContactNoError'] = 'Please fill the Contact Number';
            }

            if(empty($data['NameError']) && empty($data['line1Error']) && empty($data['line2Error']) && empty($data['CityError']) && empty($data['ContactNoError']) )

                if($this->customerModel->addAddress($data))
                {
                    header("Location: " . URLROOT . "/customers/C_AddAddress");
                }else{
                    die("Something went wrong, Please try again!");
                }

        }else{
            $this-> view('Customers/C_AddressBook',$data);
        }
        $this-> view('customers/C_AddressBook',$data);

        
    }


    public function search() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $data = [
            'customer' => $customerDetails
        ];
        $this-> view('customers/search', $data);


    }




    public function C_searchFunction() {
         
        $data = [
            
            'searchName' => '',

        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                 
                'searchName' => trim($_POST['searchItem']), 

            ];
            

            $searchDetails = $this->customerModel -> searchShop($data);
            /* $searchdata = [   
                'searchResult' => $searchDetails, 
            ]; */

            $this-> view('Customers/C_OrdersHistory',$searchDetails);

        } else{

            $customerDetails = $this->customerModel -> showcustomerDetails();
            $order = $this->customerModel -> getCompletedOrderDetails();
    
            $data = [
                'customer' => $customerDetails,
                'order' => $order
            ];
            $this-> view('customers/C_OrdersHistory', $data);

        }



        
    }












    /* public function C_showupdatingAddressDetails(){

        $customerDetails = $this->customerModel -> showcustomerDetails();
        $data = [
            'customer' => $customerDetails,
            'AddressId' =>trim($_POST['addressId'])

        ];
        $address = $this->customerModel -> showaddressDetails($data);
        $data = [
            'customer' => $customerDetails,
            'address' => $address,
        ];


    } */




    /* public function C_UpdateAddress() {
        $customerDetails = $this->customerModel -> showcustomerDetails();

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
        }

        $data = [
            'customer' => $customerDetails,
            'FullName' => '',
            'Line1' => '',
            'Line2' => '',
            'City' => '',
            'PostalCode' => '',
            'ContactNo' => '',
            'NameError' => '',
            'line1Error' => '',
            'line2Error' => '',
            'CityError' => '',
            'PostalCodeError' => '',
            'ContactNoError' => ''

        ];


       
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'customer' => $customerDetails,
                'user_id' =>$_SESSION['cus_id'],
                'FullName' => trim($_POST['fname']),
                'Line1' => trim($_POST['line1']),
                'Line2' => trim($_POST['line2']),
                'City' => trim($_POST['City']),
                'PostalCode' => trim($_POST['PostalCode']),
                'ContactNo' => trim($_POST['ContactNo']),
                'NameError' => '',
                'line1Error' => '',
                'line2Error' => '',
                'CityError' => '',
                'PostalCodeError' => '',
                'ContactNoError' => ''

            ];


             if(empty($data['FullName'])) {
                $data['NameError'] = 'Name cannot be empty';
            }

            if(empty($data['Line1'])) {
                $data['line1Error'] = 'Please fill the Address';
            }

            if(empty($data['Line2'])) {
                $data['line2Error'] = 'Please fill the Address';
            }

            if(empty($data['City'])) {
                $data['CityError'] = 'Please enter city';
            }

            if(empty($data['ContactNo'])) {
                $data['ContactNoError'] = 'Please fill the Contact Number';
            }

            if(empty($data['NameError']) && empty($data['line1Error']) && empty($data['line2Error']) && empty($data['CityError']) && empty($data['ContactNoError']) ){
 
                if($this->customerModel->updateAddress($data))
                {
                    header("Location: " . URLROOT . "/customers/C_AddAddress");
                }else{
                    die("Something went wrong, Please try again!");
                }
 
            }else{

            $this-> view('customers/C_UpdateAddress',$data);
         }
         $this-> view('customers/C_UpdateAddress',$data);

    }
} */



public function Reviewed()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'orderID' => $_POST['orderID'],
                'sellerID' => $_POST['sellerID']

            ]; 
            if ($this->customerModel->Reviewed($data)) {
                header("Location: " . URLROOT . "/pages/index");
            } else {
                die("Something went wrong, Please try again!");
            }
        }
    }


public function C_UpdateAddress() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        
        $address = $this->customerModel -> showaddressDetails($_GET['addressid']); //take the gett

        $data = [
            'customer' => $customerDetails,
            'address'=> $address, 
            'NameError' => '',
            'line1Error' => '',
            'line2Error' => '',
            'CityError' => '',
            'PostalCodeError' => '',
            'ContactNoError' => ''

        ];
 
       
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'customer' => $customerDetails,
                'user_id' =>$_SESSION['cus_id'],
                'FullName' => trim($_POST['fname']),
                'Line1' => trim($_POST['line1']),
                'Line2' => trim($_POST['line2']),
                'City' => trim($_POST['City']),
                'PostalCode' => trim($_POST['PostalCode']),
                'ContactNo' => trim($_POST['ContactNo']),
                'NameError' => '',
                'line1Error' => '',
                'line2Error' => '',
                'CityError' => '',
                'PostalCodeError' => '',
                'ContactNoError' => ''

            ];


             if(empty($data['FullName'])) {
                $data['NameError'] = 'Name cannot be empty';
            }

            if(empty($data['Line1'])) {
                $data['line1Error'] = 'Please fill the Address';
            }

            if(empty($data['Line2'])) {
                $data['line2Error'] = 'Please fill the Address';
            }

            if(empty($data['City'])) {
                $data['CityError'] = 'Please enter city';
            }

            if(empty($data['ContactNo'])) {
                $data['ContactNoError'] = 'Please fill the Contact Number';
            }

            if(empty($data['NameError']) && empty($data['line1Error']) && empty($data['line2Error']) && empty($data['CityError']) && empty($data['ContactNoError']) ){
 
                if($this->customerModel->updateAddress($data))
                {
                    header("Location: " . URLROOT . "/customers/C_AddAddress");
                }else{
                    die("Something went wrong, Please try again!");
                }
            
            }else{

                $data = [
                    'customer' => $customerDetails,
                    'address'=> $address, 
                    'NameError' => '',
                    'line1Error' => '',
                    'line2Error' => '',
                    'CityError' => '',
                    'PostalCodeError' => '',
                    'ContactNoError' => ''
        
                ];

            $this-> view('customers/C_UpdateAddress',$data);
         }
        }
        $this-> view('customers/C_UpdateAddress',$data);

    }











    
    public function C_ChangePassword() {

        $customerDetails = $this->customerModel -> showcustomerDetails();
    
            $data = [
                'customer' => $customerDetails,
                'cpassword' =>'',
                'npassword' =>'',
                'cnpassword' =>'',
                'currentPasswordError' =>'',
                'passwordError' =>'',
                'confirmPasswordError' =>''
            ];
    
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'customer' => $customerDetails,
                    'cpassword' => $_POST['cpassword'],
                    'npassword' => $_POST['npassword'],
                    'cnpassword' => $_POST['cnpassword'],
                    'currentPasswordError' =>'',
                    'passwordError' =>'',
                    'confirmPasswordError' =>''
                ];
    
    
                $passwordValidation = "/^(.{0,7}|[^a-z]|[^\d])$/i";
    
                // Validate password on length, numeric values,
                if(empty($data['npassword'])){
                $data['passwordError'] = 'Please enter password.';
              } else if(strlen($data['npassword']) < 6){
                $data['passwordError'] = 'Password must be at least 8 characters';
              } else if (preg_match($passwordValidation, $data['npassword'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
              }
    
                //Validate confirm password
                if (empty($data['cnpassword'])) {
                    $data['confirmPasswordError'] = 'Please enter password.';
                } else {
                    if ($data['npassword'] != $data['cnpassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                    }
                }
    
                if(empty($data['confirmPasswordError'])){
    
                    $customer = $this->customerModel->findCustomerPassword();
    
                    $Passworddata = [
                        'customer' => $customer
                    ];
                    
                   
                    if (password_verify($data['cpassword'], $Passworddata['customer'][0]->password )){
                         // Hash password
                    $data['npassword'] = password_hash($data['npassword'], PASSWORD_DEFAULT);
    
                        if ($this->customerModel->CustomerchangePassword($data)) {
                            //Redirect to the login page
                            header('location: ' . URLROOT . '/customers/C_ChangePassword');
                        } else {
                            die('Something went wrong.');
                        }  
                    }else{
                        $data['currentPasswordError'] = 'Passwords do not match, please try again.';
                    }
                $this-> view('customers/C_ChangePassword', $data);
                }
        }

        $this-> view('customers/C_ChangePassword', $data);
    }






    public function C_Notification() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $data = [
            'customer' => $customerDetails
        ];
        $this-> view('customers/C_Notification', $data);
    }

    public function C_ForgotPassword() {
        $this-> view('customers/C_ForgotPassword');
    }







    public function C_OrdersHistory() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $order = $this->customerModel -> getCompletedOrderDetails();

        $data = [
            'customer' => $customerDetails,
            'order' => $order
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data1 = [
                 
                'searchName' => trim($_POST['searchItem']), 

            ];

            $searchDetails = $this->customerModel -> searchShop($data1);

            $data = [
                'customer' => $customerDetails,
                'order' => $order,
                'search' => $searchDetails
            ];
 
        $this-> view('customers/C_OrdersHistory', $data);
    }
    $this-> view('customers/C_OrdersHistory', $data);

}









   







































    public function C_OrdersToPay() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $data = [
            'customer' => $customerDetails
        ];
        $this-> view('customers/C_OrdersToPay',$data);
    }






    public function C_OrdersToReceive() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $order = $this->customerModel -> getToReceiveOrderDetails();

        $data = [
            'customer' => $customerDetails,
            'order' => $order
        ];

/* var_dump($order); */
        
        $this-> view('customers/C_OrdersToReceive',$data);
    }





    /* public function C_ReviewPlants() {

        
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $plantDetails = $this->customerModel -> showplantDetails($_GET['seller_id'],$_GET['order_id']);
        $orderDetails = $this->customerModel -> showorderDetails();
        $sellerDetails = $this->customerModel->sellerview();
        $data = [
            'delivery' => $orderDetails,
            'plants' => $plantDetails,
            'customer' => $customerDetails,
            'seller' => $sellerDetails,
        ];

        if(!isLoggedIn()){
            header("Location: " . URLROOT . "/pages");
        }
        
            $data1 = [
                
                'rating_id' =>'',
                'LikeDislike' =>'',
                
                
            ];
        
        if( $_SERVER['REQUEST_METHOD'] == 'POST'){
             
            $_POST = filter_input_array(INPUT_POST);
     
                   $data1 = [
                    'rating_id' => trim($_POST['rating_id']),
                    'LikeDislike' => trim($_POST['LikeDislike']),
                         
                 ];
    
                if($this->pageModel->feedback($data1)) {
                        header("Location: " . URLROOT . "/pages/index");
                    }else{
                        die("Something went wrong, Please try again!");
                    } 
        }else{
    
            $data1 = [
                'rating_id' =>'',
                'LikeDislike' =>'',
                
                            
                ];
            }
        
 
        $this-> view('customers/C_ReviewPlants',$data,$data1);
    } */


    /* public function C_OrdersToReview() {
        $customerDetails = $this->customerModel -> showcustomerDetails();
        $orderDetails = $this->customerModel -> showorderDetails();
        $sellerDetails = $this->customerModel->sellerview();

        $data = [
            'customer' => $customerDetails,
            'delivery' => $orderDetails,
            'seller' => $sellerDetails,
        ];
        
        

        $this-> view('customers/C_OrdersToReview',$data);
    } */
















    



    public function C_ReviewPlants()
    {

        $customerDetails = $this->customerModel->showcustomerDetails();
        $plantDetails = $this->customerModel->showplantDetails($_GET['seller_id'], $_GET['order_id']);
        $orderDetails = $this->customerModel->showorderDetails();
        $sellerDetails = $this->customerModel->sellerview();
        $data = [
            'delivery' => $orderDetails,
            'plants' => $plantDetails,
            'customer' => $customerDetails,
            'seller' => $sellerDetails,
        ];

        $this->view('customers/C_ReviewPlants', $data);
    }





    public function C_ReviewPlantsStore()
    {
        $status = $_POST['status'];
        $orderId = $_POST['orderId'];
        $plantId = $_POST['plantId'];


        $data1 = [
            'order_id' => (int)$orderId,
            'plant_id' => (int)$plantId,
            'LikeDislike' => $status,
        ];

        $records = $this->customerModel->feedbackRecordCount($data1);
        if (count($records) > 0) {
            $this->customerModel->feedbackRecordUpdate($data1);
        } else {
            if ($this->customerModel->feedback($data1)) {
                // header("Location: " . URLROOT . "/pages/index");
            } else {
                die("Something went wrong, Please try again!");
            }
        }
    }


    public function C_OrdersToReview()
    {
        $customerDetails = $this->customerModel->showcustomerDetails();
        $orderDetails = $this->customerModel->showorderDetails();
        $sellerDetails = $this->customerModel->sellerview();

        $data = [
            'customer' => $customerDetails,
            'delivery' => $orderDetails,
            'seller' => $sellerDetails,
        ];
        $this->view('customers/C_OrdersToReview', $data);
    }

    















    public function C_Profile() {

        $customerDetails = $this->customerModel -> showcustomerDetails();

        $data = [
            'customer' => $customerDetails
        ];
 

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fname' => trim($_POST['fname']),
                'district' => trim($_POST['district']),


            ];
                if($this->customerModel->updateProfile($data))
                {
                    header("Location: " . URLROOT . "/customers/C_Profile");
                    echo "<script>alert('profile updated')</script>";
                    echo "<script>window.location = 'C_Profile'</script>";
                }else{
                    die("Something went wrong, Please try again!");
                }

       $this-> view('customers/C_Profile', $data);

        }

        $this-> view('customers/C_Profile', $data);
    }

    public function C_AccountIndex() {

        $customerDetails = $this->customerModel -> showcustomerDetails();
        $address = $this->customerModel -> findAllAddress();
        $orders = $this->customerModel -> showRecentOrders();

        $data = [
            'customer' => $customerDetails,
            'address' =>$address,
            'recentOrders' => $orders
        ];

        $orderdate = [
            'date'=>$data['recentOrders'][0]->createdOn

        ];

/*         $date = $this->customerModel -> getOrderDate($orderdate);
 */

        $this-> view('customers/C_AccountIndex',$data);
    }

    public function C_DefaultAddress() {
        $this-> view('customers/C_DefaultAddress');
    }



}