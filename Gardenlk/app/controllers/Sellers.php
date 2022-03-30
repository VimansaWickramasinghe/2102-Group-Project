<?php
class Sellers extends Controller {
    public function __construct() {
        $this->sellerModel = $this->model('Seller');
    }
    
    public function plant($id){
        $plantDetails = $this->sellerModel -> showPlantDetailsplant($id);
        $data = [
            'plant' =>$plantDetails
        ];
        $this->view('Sellers/plant',$data);
    }

    
   



    public function dashboard(){


        $details = $this->sellerModel ->viewdash();
        $topPlants=$this->sellerModel->topPlant();
        $completed = $this->sellerModel ->dashboard_complete();
        $cancelled = $this->sellerModel ->dashboard_cancelled();
        $pending = $this->sellerModel -> dashboard_pending();
        $plants = $this->sellerModel -> dashboard_plants();
        $completedCount=$this->sellerModel->completedCount();
        $pendingplantsCount = $this->sellerModel ->pendingplantsCount();
        $pendingCount = $this->sellerModel -> pendingCount();
        $plantsCount = $this->sellerModel -> plantsCount();

        $data = [
            'seller' =>$details,
            'topPlant'=>$topPlants,
            'orders' =>$cancelled,
            'completeCount' =>$completed,
            'pending' =>$pending,
            'plants' =>$plants,
            //'topRating'=>$topRating
            'pendingplantsCount' =>$pendingplantsCount,
            'completeCount' =>$completedCount,
            'pendingCount' =>$pendingCount,
            'plantsCount' =>$plantsCount

        ];
        
        $this->view('Sellers/Dashboard',$data);
    }

   
    public function dashboard_cancelled(){
        $cancelled = $this->sellerModel ->dashboard_cancelled();
        $completedCount=$this->sellerModel->completedCount();
        $pendingplantsCount = $this->sellerModel ->pendingplantsCount();
        $pendingCount = $this->sellerModel -> pendingCount();
        $plantsCount = $this->sellerModel -> plantsCount();
        $details = $this->sellerModel ->viewdash();
        $topPlants=$this->sellerModel->topPlant();
        
        $data = [
            'orders' =>$cancelled,
            'seller' =>$details,
            'topPlant'=>$topPlants,
            'pendingplantsCount' =>$pendingplantsCount,
            'completeCount' =>$completedCount,
            'pendingCount' =>$pendingCount,
            'plantsCount' =>$plantsCount
        ];
        
        $this->view('Sellers/dashboard_cancelled',$data);
    }

    public function dashboard_completed(){
        $completed = $this->sellerModel ->dashboard_complete();
        $completedCount=$this->sellerModel->completedCount();
        $pendingplantsCount = $this->sellerModel ->pendingplantsCount();
        $pendingCount = $this->sellerModel -> pendingCount();
        $plantsCount = $this->sellerModel -> plantsCount();
        $details = $this->sellerModel ->viewdash();
        $topPlants=$this->sellerModel->topPlant();
        $data = [
            'orders' =>$completed,
            'seller' =>$details,
            'topPlant'=>$topPlants,
            'pendingplantsCount' =>$pendingplantsCount,
            'completeCount' =>$completedCount,
            'pendingCount' =>$pendingCount,
            'plantsCount' =>$plantsCount
        ];
        
        $this->view('Sellers/dashboard_completed',$data);
    }

    public function dashboard_pending(){
        $pending = $this->sellerModel -> dashboard_pending();
        $completedCount=$this->sellerModel->completedCount();
        $pendingplantsCount = $this->sellerModel ->pendingplantsCount();
        $pendingCount = $this->sellerModel -> pendingCount();
        $plantsCount = $this->sellerModel -> plantsCount();
        $details = $this->sellerModel ->viewdash();
        $topPlants=$this->sellerModel->topPlant();
        $data = [
            'orders' =>$pending,
            'seller' =>$details,
            'topPlant'=>$topPlants,
            'pendingplantsCount' =>$pendingplantsCount,
            'completeCount' =>$completedCount,
            'pendingCount' =>$pendingCount,
            'plantsCount' =>$plantsCount
        ];
        
        $this->view('Sellers/dashboard_pending',$data);
    }

    public function dashboard_plants(){
        $plants = $this->sellerModel -> dashboard_plants();
        $completedCount=$this->sellerModel->completedCount();
        $pendingplantsCount = $this->sellerModel ->pendingplantsCount();
        $pendingCount = $this->sellerModel -> pendingCount();
        $plantsCount = $this->sellerModel -> plantsCount();
        $details = $this->sellerModel ->viewdash();
        $topPlants=$this->sellerModel->topPlant();
        $data = [
            'orders' =>$plants,
            'seller' =>$details,
            'topPlant'=>$topPlants,
            'pendingplantsCount' =>$pendingplantsCount,
            'completeCount' =>$completedCount,
            'pendingCount' =>$pendingCount,
            'plantsCount' =>$plantsCount
        ];
        
        $this->view('Sellers/dashboard_plants',$data);
    }
    
    




    public function plantpage(){   
        $plants = $this->sellerModel->AllPlants();
        $data = [
            'plants' => $plants]; 
        
        $this->view('Sellers/plantpage',$data);
    }










public function report(){
    $order = $this->sellerModel->orderDetail();
    $sum = $this->sellerModel->sumDetail();
    /* $solditems = $this->sellerModel->solditems(); */
    $sumsolditems = $this->sellerModel->sumsolditems();
    $ToReceiveCount = $this->sellerModel -> ToReceiveCount();
    $ToReviewCount = $this->sellerModel -> ToReviewCount();
    $CompletedCount = $this->sellerModel -> CompletedCount1();
    $seller =  $this->sellerModel -> seller();
    $orderCount = $this->sellerModel -> orderCount();
    $customerCount = $this->sellerModel -> customerCount();
    $Date = $this->sellerModel -> Date();
    $OrderCountByDate = $this->sellerModel -> OrderCountByDate();
    

    $data = [
        'order' => $order,
        'sum' => $sum,
        /* 'solditems' => $solditems, */
        'sumsolditems' => $sumsolditems,
        'ToReceiveCount' => $ToReceiveCount,
        'ToReviewCount' => $ToReviewCount,
        'CompletedCount' => $CompletedCount,
        'seller'=>$seller,
        'orderCount'=>$orderCount,
        'customerCount'=>$customerCount,
        'Date'=>$Date,
        'OrderCountByDate'=>$OrderCountByDate
        

    ];

  
$this->view('Sellers/report',$data);
}





    public function sellerpage(){
        $sellerDetails = $this->sellerModel->sellerview();
         
        $data = [
            'seller' => $sellerDetails,
        ]; 
        
        $this->view('Sellers/sellerpage',$data);
    }


    public function sellershoppage($id){
        $seller = $this->sellerModel->sellers($id);
        $plants = $this->sellerModel->sellersPlants($id);
        $data = [
            'seller' => $seller,
           'plants' => $plants
        ];
        $this->view('Sellers/sellershoppage',$data);
    }
    




    
    public function store(){
        $plant = $this->sellerModel -> showAllPlants();

        $data = [
            'plant' =>$plant
        ];
        
        $this->view('Sellers/store',$data);
    }



    
    public function orderhistory(){
        $orders=$this->sellerModel ->orders();
        if(isset($_GET['min_date'])){
            $min_date=$_GET['min_date'];
        }else{}
        $data=[
            'orders'=>$orders
        ];

        $this->view('Sellers/orderhistory',$data);
    }



    public function orderDetail($order_id){
        $details=$this->sellerModel->showorderDetails($order_id);
        
        $data=['orders'=>$details];

        $this->view('Sellers/orderDetail',$data);
    }

    
    public function SellerProfile(){
        $details = $this->sellerModel -> viewDetail();
        
        $data = [
            'sellerDetails' =>$details,
            'businessName' => '',
            'contactNo'=>'',
            'businessAddress'=>'',
            'ownerName'=>''
            
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
            'seller_id' =>$_SESSION['seller_id'],
            'businessName' => trim($_POST['bname']),
            'contactNo'=>trim($_POST['ContactNo']),
            'businessAddress'=>trim($_POST['address']),
            'ownerName'=>trim($_POST['ownername'])

        ];

        if($this->sellerModel->updateProfile($data))
                {
                    header("Location: " . URLROOT . "/Sellers/SellerProfile");
                    echo "<script>alert('profile updated')</script>";
                    echo "<script>window.location = 'SellerProfile'</script>";
                }else{
                    die("Something went wrong, Please try again!");
                }

                $this->view('Sellers/sellerProfile',$data);

        }else{

            $data = [
                'sellerDetails' =>$details,
                'businessName' => '',
                'contactNo'=>'',
                'businessAddress'=>'',
                'ownerName'=>''
                
            ];
            
        }
        
        $this->view('Sellers/sellerProfile',$data);
    }

    /* public function SellerChangePwd(){
             
        $this->view('Sellers/SellerChangePwd');
    } */

    public function notification(){
        $this->view('Sellers/notification');
    }


    public function addPlant() {
        $data = [
            'seller_id' => '',
            'pname' => '',
            'img1'=>'',
            'img2'=>'',
            'img3'=>'',
            'img4'=>'',
            'price' => '',
            'quantity' => '',
            'category' => '',
            'orderlevel' => '',
            'description' => '',
            'NameError' => '',
            //'img1Error'=>'',
            'priceError' => '',
            'quantityError' =>'',
            'categoryError'=>''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
            'seller_id' =>$_SESSION['seller_id'],
            'pname' => trim($_POST['pname']),
            'img1'=>$_POST['img1'],
            'img2'=>$_POST['img2'],
            'img3'=>$_POST['img3'],
            'img4'=>$_POST['img4'],
            'price' => trim($_POST['price']),
            'quantity' => trim($_POST['quantity']),
            'category' => trim($_POST['category']),
            'orderlevel' => trim($_POST['orderlevel']),
            'description' => trim($_POST['description']),
            'NameError' => '',
            'priceError' => '',
           // 'img1Error'=>'',
            'quantityError'=>'',
            'categoryError'=>''
            ];
            if(empty($data['pname'])) {
                $data['NameError'] = 'Name cannot be empty';
            }

            if(empty($data['price'])) {
                $data['priceError'] = 'Please fill the Price';
            }

            if(empty($data['quantity'])) {
                $data['quantityError'] = 'Please fill the Quantity';
            }

            if(empty($data['category'])) {
                $data['categoryError'] = 'Please select a category';
            }
           /* if(empty($data['img1'])) {
                $data['img1Error'] = 'Please select atleast one image';
            }*/
            if(empty($data['NameError']) && empty($data['priceError']) && empty($data['quantityError']) && empty($data['categoryError'])/* && (empty($data['img1']))*/)

               if($this->sellerModel->addPlant($data))
                {   header('location: ' . URLROOT . '/sellers/store'); //redirect to
                      
                }else{
                    
                    echo "<script>alert('Something went wrong, Please try again!'); </script>";
                }
            
        }else{
            $this-> view('Sellers/addPlant',$data);
        }

        $this->view('Sellers/addPlant');
    }





    function updatePlant($plant_id){
        $plant=$this->sellerModel->findPlantById($plant_id);

        /*if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
        }elseif($plant->seller_id != $_session['seller_id']){
            header("Location: " . URLROOT . "/users/login");
        }*/
        

        $data=[
            'plant' => $plant,
            'ShopName' =>'',
            'pname' => '',
            'img1'=>'',
            'img2'=>'',
            'img3'=>'',
            'img4'=>'',
            'price' =>'',
            'quantity' => '',
            'category' =>'',
            'orderlevel' => '',
            'description' =>'',
            'NameError'=> '',
            'priceError' => '',
            'img1Error'=>'',
            'quantityError'=>'',
            'categoryError'=>''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'plant_id'=>$plant_id,
                'plant' => $plant,
                'seller_id' =>$_SESSION['seller_id'],
                'ShopName' => $_SESSION['seller_name'],
                'pname' => trim($_POST['pname']),
                'img1'=>$_FILES['img1'],
                'img2'=>$_FILES['img2'],
                'img3'=>$_FILES['img3'],
                'img4'=>$_FILES['img4'],
                'price' => trim($_POST['price']),
                'quantity' => trim($_POST['quantity']),
                'category' => trim($_POST['category']),
                'orderlevel' => trim($_POST['orderlevel']),
                'description' => trim($_POST['description']),
                'NameError' => '',
                'priceError' => '',
                'img1Error'=>'',
                'quantityError'=>'',
                'categoryError'=>''
            ];
            if(empty($data['pname'])) {
                $data['NameError'] = 'Name cannot be empty';
            }
            
            if(empty($data['price'])) {
                $data['priceError'] = 'Please fill the Price';
            }

            if(empty($data['quantity'])) {
                $data['quantityError'] = 'Please fill the Quantity';
            }

            if(empty($data['category'])) {
                $data['categoryError'] = 'Please select a category';
            }
            
            if(empty($data['img1Error'])) {
                $data['img1Error'] = 'Please insert a image';
            }
            if(empty($data['NameError']) && empty($data['priceError']) && empty($data['quantityError']) && empty($data['categoryError'])){

                if($this->sellerModel->updatePlant($data)){
                   
                    header("location: " . URLROOT . "/sellers/store"); //redirect to
                      
                }else{
                    
                    die ('Something went wrong, Please try again!');
                }
            
        }else{
                $this-> view('Sellers/updatePlant',$data);
        }
        }

        $this->view('Sellers/updatePlant',$data);
    }
/*************************************************Delete plant******************************* */

    public function deletePlant($plant_id){
        //$plant=$this->sellerModel->findPlantById($plant_id);

        /*if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
        }elseif($plant->seller_id != $_session['seller_id']){
            header("Location: " . URLROOT . "/users/login");
        }*/
        
 
        $data=[
            //'plant' => $plant,
            'plant_id'=>$plant_id
            /*'ShopName' =>'',
            'pname' => '',
            'img1'=>'',
            'img2'=>'',
            'img3'=>'',
            'img4'=>'',
            'price' =>'',
            'quantity' => '',
            'category' =>'',
            'orderlevel' => '',
            'description' =>'',
            'NameError'=> '',
            'priceError' => '',
            'img1Error'=>'',
            'quantityError'=>'',
            'categoryError'=>''*/
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($this->sellerModel->deletePlant($data)){
                header("location: " . URLROOT . "/sellers/dashboard/"); //redirect to
                      
            }else{
                
                die ('Something went wrong, Please try again!');
            }
        }
    }





    public function category_otherPlant(){
        $plants = $this->sellerModel->otherPlants();
        $data = [
            'plants' => $plants
        ];    
        $this->view('Sellers/category_otherPlant',$data);
    }
    


    public function category_flowerPlant(){
        $plants = $this->sellerModel->flowerPlants();
        $data = [
            'plants' => $plants]; 
        
        $this->view('Sellers/category_flowerPlant',$data);
    }

    public function category_housePlant(){
        $plants = $this->sellerModel->housePlants();
        $data = [
            'plants' => $plants]; 
        
        $this->view('Sellers/category_housePlant',$data);
    }

    public function category_outdoorPlant(){
        $plants = $this->sellerModel->outdoorPlants();
        $data = [
            'plants' => $plants]; 
        
        $this->view('Sellers/category_outdoorPlant',$data);
    }

    public function category_pottedPlant(){
        $plants = $this->sellerModel->pottedPlants();
        $data = [
            'plants' => $plants]; 
        
        $this->view('Sellers/category_pottedPlant',$data);
    }

    public function category_tablePlant(){
        $plants = $this->sellerModel->tablePlants();
        $data = [
            'plants' => $plants]; 
        
        $this->view('Sellers/category_tablePlant',$data);
    }




    public function showDrivers(){
        $drivers = $this->sellerModel->show_drivers();
        $data=[
            'drivers'=>$drivers
        ];
        $this->view('Sellers/showDrivers',$data);
    }

    public function SellerChangePwd() {

        $data = [
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
                
                'cpassword' => $_POST['cpassword'],
                'npassword' => $_POST['npassword'],
                'cnpassword' => $_POST['cnpassword'],
                'currentPasswordError' =>'',
                'passwordError' =>'',
                'confirmPasswordError' =>''
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
                $seller = $this->sellerModel->findSellerPassword();

                $Passworddata = [
                    'seller' => $seller
                ];

                if ($data['cpassword'] == $Passworddata['seller'][0]->password ){
                    if ($this->sellerModel->S_changePassword($data)) {
                        //Redirect to the login page
                        header('location: ' . URLROOT . '/seller/dashboard');
                    } else {
                        die('Something went wrong.');
                    }  
            } else{
                $data['currentPasswordError'] = 'Passwords do not match, please try again.';
            }
        $this-> view('seller/SellerChangePwd', $data);
            }
        }
        $this-> view('seller/SellerChangePwd', $data);
    }



}