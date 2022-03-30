<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }





    public function index()
    {

        $plants = $this->pageModel->NewArrivals();
        $bestselling = $this->pageModel->BestSelling();
        $toprate = $this->pageModel->TopRated();
        $data = [
            'plants' => $plants,
            'bestselling' => $bestselling,
            'toprate' => $toprate
        ];


        /* if (isset($_POST['add'])){
             
            if(isset($_SESSION['cart'])){
                $item_array_id = array_column($_SESSION['cart'], "product_id");
                
                if(in_array($_POST['product_id'], $item_array_id)){
                    echo "<script>alert('Product is already added in the cart..!')</script>";
                    echo "<script>window.location = '<?php echo URLROOT; ?>/pages/index'</script>";
                }else{

                    $count = count($_SESSION['cart']);
                    $item_array = array(
                        'product_id' => $_POST['product_id']
                    );
                    $_SESSION['cart'][$count] = $item_array;
 
                }
            }else{

                $item_array = array(
                        'product_id' => $_POST['product_id']
                );

                // Create new session variable
                $_SESSION['cart'][0] = $item_array;
             }
        } */

        $this->view('pages/index', $data);
    }



    public function about()
    {
        $this->view('pages/about');
    }



    public function cart(){

        $plants = $this->pageModel->cartItems();
        $data = [
           'plants' => $plants,
            'plantID' => '',
           'quantity' => ''
        ];


        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            
            
            $data = [
            'plants' => $plants,
            'plantID' => $_POST['product_id'],
            'quantity' => $_POST['quantity']
         ];

        $quantity = $this->pageModel->getQuantity($data);

        if($data['quantity'] > $quantity->NoOfPlants){ 
                
            echo "<script>alert('Insufficient Items.sorry...!')</script>";
            echo "<script>window.location = 'plant'</script>";
            $this->view('pages/cart', $data);

        }else{

            //add elements to cart
            if (isset($_POST['add'])) {
                if (isset($_SESSION['cart'])) {
                    $item_array_id = array_column($_SESSION['cart'], "product_id");

                    if (in_array($_POST['product_id'], $item_array_id)) {
                        echo "<script>alert('Product is already added in the cart..!')</script>";
                        echo "<script>window.location = 'cart'</script>";
                    } else {

                        $count = count($_SESSION['cart']);
                        $item_array = array(
                            'product_id' => $_POST['product_id'],
                            'quantity' => $_POST['quantity']
                        );
                        $_SESSION['cart'][$count] = $item_array;
                    }
                } else {

                    $item_array = array(
                        'product_id' => $_POST['product_id'],
                        'quantity' => $_POST['quantity']
                    );

                    // Create new session variable
                    $_SESSION['cart'][0] = $item_array;
                }
            }
            //remove elements from the cart
            if (isset($_POST['remove'])) {

                if ($_GET['action'] == 'remove') {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if ($value["product_id"] == $_GET['id']) {
                            unset($_SESSION['cart'][$key]);
                            echo "<script>alert('Product has been Removed...!')</script>";
                            echo "<script>window.location = 'cart'</script>";
                        }
                    }
                }
            }
            
        } 
    }
        $this->view('pages/cart', $data);
}



            





    public function cartOrder()
    {

        $order = [
            'customer_id' => '',
            'quantity' => '',
            'total' => ''
        ];



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $order = [
                'customer_id' => 0,
                'quantity' => 0,
                'total' => 0
            ];

            if ($this->pageModel->CreateOrder($order)) {
                //Redirect to the login page
                header('location: ' . URLROOT . '/pages/checkout');
            } else {
                die('Something went wrong.');
            }
        } else {

            $order = [
                'customer_id' => '',
                'quantity' => '',
                'total' => ''

            ]; //chaged
            $this->view('Pages/cart', $order);
        }

        $order = $this->pageModel->OrderId();

        $data = ['order' => $order];

        $orderItem = [
            'plantID' => '',
            'quantity' => '',
            'order_id' => '',
            'shopID' => '',
            'plantName' => ''

        ];
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $orderItem = [
                'plantID' => $_POST['plantID'],
                'quantity' => $_POST['quantity'],
                'order_id' => $_POST['order_id'],
                'shopID' => $_POST['shopID'],
                'plantName' => $_POST['plantName']
            ];

            if ($this->pageModel->orderItems($orderItem)) {
                header("Location: " . URLROOT . "/pages/cart");
            } else {
                die("Something went wrong, Please try again!");
            }
        } else {
            $data = [
                'order' => $order
            ];

            $this->view('Pages/cart', $data);
        }
    }


    public function placeOrder()
    {

        $customer_id = $_POST['customer_id'];
        $total = $_POST['total'];
        $items = $_POST['items'];

        $order = [
            'customer_id' =>  $customer_id,
            'total' => $total
        ];

        if ($this->pageModel->CreateOrder($order)) {
             $order = $this->pageModel->OrderId();
            $order =  $order[0]->order_id; 

            foreach ($items as $key => $value) {

                $orderItem = [
                    'plantID' => $value['plantId'],
                    'quantity' => $value['quantity'],
                    'order_id' => $order,
                    'shopID' => $value['shopId'],
                    'plantName' => $value['item_name']
                ];

                
               /*  $availableCount =  $this->pageModel->getInventryQuantity($orderItem);
                $availableCount =  $availableCount->NoOfPlants;

                $updatedInventry = $availableCount - $orderItem['quantity']; */

                   /*  /////////if($availableCount > $orderItem['quantity']){ ////////*/
                        if ($this->pageModel->orderItems($orderItem)){
                            echo 'done';


                           /*  if ($this->pageModel->updateInventry($orderItem, $updatedInventry )) {
                                echo 'InventryUpdated';
                            } else {
                                die("Something went wrong, Please try again!");
                            }  */
                        }
                    

            }
        } else {
            echo  'Something went wrong.';
        }
    }










    public function checkout()
    {

        $billingDetails = $this->pageModel->billingDetails();
        $plants = $this->pageModel->checkoutItems();
/*         $order = $this->pageModel->OrderId();
 */

        $data = [
            'customer' => $billingDetails,
            'plants' => $plants
/*             'order' => $order
 */        ];

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
        }

        /* $orderItem = [
            'plantID' => '',
            'quantity' => '',
            'order_id' => '',
            'shopID' => '',
            'plantName' => ''

        ]; */
        /* if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $orderItem = [
                'plantID' => $_POST['plantID'],
                'quantity' => $_POST['quantity'],
                'order_id' => $_POST['order_id'],
                'shopID' => $_POST['shopID'],
                'plantName' => $_POST['plantName']
            ];

            if ($this->pageModel->orderItems($orderItem)) {
                header("Location: " . URLROOT . "/pages/cart");
            } else {
                die("Something went wrong, Please try again!");
            }
        } else {
            $data = [
                'customer' => $billingDetails,
                'plants' => $plants,
                'order' => $order
            ];

            $this->view('Pages/checkout', $data);
        } */
        $this->view('Pages/checkout', $data);
    }






    public function terms()
    {
        $this->view('Pages/terms');
    }






    public function confirmpayment()
    {
        $this->view('Pages/confirmpayment');
    }








    public function contact()
    {

        $data = [
            'name' => '',
            'email' => '',
            'message' => ''

        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'message' => trim($_POST['msg'])

            ];

            if ($this->pageModel->contact($data)) {
                header("Location: " . URLROOT . "/pages/index");
            } else {
                die("Something went wrong, Please try again!");
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'message' => ''

            ];
        }
        $this->view('pages/contact', $data);
    }









    public function feedback()
    {

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/pages");
        }

        $driver_review = [

            /* 'rate_id' => '', */
            'order_id' => '',
            'driver_id' => '',
            'starRate' => '',
            'feedback_msg' => '',
          
        ];

        $seller_review = [

            /* 'rate_id' => '', */
            'order_id' => '',
            'seller_id' => '',
            'heartRate' => '',
            'feedback_msg' => '',


        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);

            $driverId = $this->pageModel->getDriverId(($_POST['seller_id']),($_POST['order_id']));



            // driver rating
            $driver_review = [
                
                /* 'rate_id' => trim($_POST['rate_id']), */
                'order_id' => trim($_POST['order_id']),
                'driver_id' => $driverId->driver_id,
                'starRate' => trim($_POST['starRate']),
                'feedback_msg' => trim($_POST['feedback_msg_driver']),

            ];
            // seller rating
            $seller_review = [
               /*  'rate_id' => trim($_POST['rate_id']), */
                'order_id' => trim($_POST['order_id']),
                'seller_id' => trim($_POST['seller_id']),
                'heartRate' => trim($_POST['heartRate']),
                'feedback_msg' => trim($_POST['feedback_msg_seller'])
            ];

            // $this->pageModel->feedback1($driver_review)
            // $this->pageModel->feedback1($seller_review)

            if ($this->pageModel->feedback1($driver_review)) {
                if ($this->pageModel->feedback2($seller_review)) {
                   
                    header("Location: " . URLROOT . "/Customers/C_ReviewPlants?seller_id=" . trim($_POST['seller_id']) . "&order_id=" . trim($_POST['order_id']) . "");
                }else{
                die("Something went wrong, Please try again!");
                }
            } else {
                die("Something went wrong, Please try again!");
            }
        } else {

            $driver_review = [

                /* 'rate_id' => '', */
                'order_id' => '',
                'driver_id' => '',
                'starRate' => '',
                'feedback_msg' => '',
              
            ];
    
            $seller_review = [
    
                /* 'rate_id' => '', */
                'order_id' => '',
                'seller_id' => '',
                'heartRate' => '',
                'feedback_msg' => '',
    
    
            ];
        }
 
        $this->view('pages/feedback', $driver_review,$seller_review);
    }




    public function return()
    {
        $this->view('pages/return');
    }

    public function notify()
    {
        $this->view('pages/notify');
    }
}
