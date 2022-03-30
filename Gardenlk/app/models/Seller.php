<?php
    class Seller {
        private $db;
         

        public function __construct() {
            $this->db = new Database;
        }
        
        public function showAllPlants(){
    
            $this->db->query("SELECT plant_id,pname, NoOfPlants, category, description, orderlevel,img1 FROM plants WHERE status = 'accept' AND seller_id=' {$_SESSION['seller_id'] }' ");   
            $results = $this->db->resultSet();
            return $results;
        }



        public function showPlantDetailsplant($id){
    
            $this->db->query("SELECT * FROM plants INNER JOIN seller on plants.seller_id = seller.seller_id WHERE plant_id = :plant_id "); 
            $this->db->bind(':plant_id', $id);  
            $row = $this->db->single();
            return $row;
        }
        


        public function dashboard(){
            /*$complete=$this->db->query("SELECT * FROM orders WHERE seller_id=' {$_SESSION['seller_id'] }' AND order_status='success'");
            $pending=$this->db->query("SELECT COUNT (*) FROM orders WHERE seller_id=' {$_SESSION['seller_id'] }' AND order_status='pending'");
            $plant=$this->db->query("SELECT COUNT (*) FROM plants WHERE seller_id=' {$_SESSION['seller_id'] }'");*/
            $results = $this->db->resultSet();
            return $results;
        }
        public function dashboard_cancelled(){ //pending plants details
            $this->db->query("SELECT * FROM plants where seller_id= '{$_SESSION['seller_id']}' and status='pending' ");
            $results = $this->db->resultSet();
            return $results;
        }

        public function dashboard_complete(){
            $this->db->query("SELECT * FROM orders JOIN orderitems ON orders.order_id = orderitems.orderID join customer_address on orders.customer_id=customer_address.user_id where orderitems.shopID= '{$_SESSION['seller_id']}' && orders.order_status='completed' GROUP BY order_id ");
            $results = $this->db->resultSet();
            return $results;
        }

        public function dashboard_pending(){
            $this->db->query("SELECT * FROM orders JOIN orderitems ON orders.order_id = orderitems.orderID join customer_address on orders.customer_id=customer_address.user_id where orderitems.shopID= '{$_SESSION['seller_id']}' and orders.order_status='toReceive' GROUP BY order_id ");
            $results = $this->db->resultSet();
            return $results;
        }

        public function dashboard_plants(){
            $this->db->query("SELECT * FROM plants WHERE seller_id=' {$_SESSION['seller_id'] }' AND status='accept'");
            $results = $this->db->resultSet();
            return $results;
        }

        public function completedCount(){
            $this->db->query("SELECT COUNT(order_id) AS completeCount FROM orders Inner JOIN orderitems ON orders.order_id = orderitems.orderID where orderitems.shopID= '{$_SESSION['seller_id']}' and orders.order_status='completed'");
            $results = $this->db->resultSet();
            return $results;
        }
        public function pendingCount(){
            $this->db->query("SELECT COUNT(order_id) AS pendingCount FROM orders inner JOIN orderitems ON orders.order_id = orderitems.orderID where orderitems.shopID= '{$_SESSION['seller_id']}' and orders.order_status='toReceive'");
           $results = $this->db->resultSet();
            return $results;
        }
        public function pendingplantsCount(){
            $this->db->query("SELECT COUNT(plant_id) AS pendingplantsCount From plants where seller_id= '{$_SESSION['seller_id']}' and status='pending' ");
            $results = $this->db->resultSet();
            return $results;
        }
        public function plantsCount(){
            $this->db->query("SELECT COUNT(plant_id) AS plantsCount FROM plants WHERE seller_id=' {$_SESSION['seller_id'] }' and status='accept' ");
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function showPlantDetails($id){
    
            $this->db->query("SELECT * FROM plants WHERE plant_id = :plant_id "); 
            $this->db->bind(':plant_id', $id);  
            $results = $this->db->resultSet();
            return $results;
        }

        /* public function updateSellerDetails($id){
            $this->db->query("UPDATE seller set set businessName=':businessName',contactNo=':contactNo', ownerName=':ownerName' WHERE seller_id=' {$_SESSION['seller_id'] }'");
            $this->db->bind(':seller_id', $data['seller_id']);
            $this->db->bind(':businessName', $data['businessName']);
            $this->db->bind(':contactNo', $data['contactNo']);
            $this->db->bind(':ownerName', $data['ownerName']);
            $this->db->bind(':city', $data['citye']);

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        } */

        public function sumDetail(){
    
            $this->db->query("SELECT  SUM(total)as sum from orders;"); 
              
            $results = $this->db->resultSet();
            return $results;
        } 
      

        public function sumsolditems(){
    
            $this->db->query("SELECT SUM(quantity)as sumsolditems from orderitems;"); 
              
            $results = $this->db->resultSet();
            return $results;
        } 

        public function ToReceiveCount()
        {
            $this->db->query('SELECT  COUNT(*) as Count FROM orderitems where order_status =  "toReceive" ;');
            $results = $this->db->resultSet();
            return $results;
        }

        public function ToReviewCount()
        {
            $this->db->query('SELECT  COUNT(*) as Count FROM orderitems where order_status = "toReview";');
            $results = $this->db->resultSet();
            return $results;
        }

        public function CompletedCount1()
        {
            $this->db->query('SELECT  COUNT(*) as Count FROM orderitems where order_status =  "completed" ;');
            $results = $this->db->resultSet();
            return $results;
        }

        public function seller()
        {
            $this->db->query("SELECT * FROM seller where seller_id='{$_SESSION['seller_id']}' ");
            $results = $this->db->resultSet();
            return $results;
        }

        public function orderCount()
        {
            $this->db->query("SELECT COUNT(order_id) as Count FROM orders;");
            $results = $this->db->resultSet();
            return $results;
        }

        
        public function customerCount ()
        {
            $this->db->query("SELECT COUNT(DISTINCT customer_id) as Count FROM orders;");
            $results = $this->db->resultSet();
            return $results;
        }  
        
        public function Date ()
        {
            $this->db->query("SELECT createdOn from orders /* where orders.createdOn > now() -  interval 30 day  */ ;");
            $results = $this->db->resultSet();
            return $results;
        }  

        public function OrderCountByDate ()
        {
            $this->db->query("SELECT COUNT(order_id) as Count FROM orders GROUP by Orders.CreatedOn;");
            $results = $this->db->resultSet();
            return $results;
        }















        public function viewDetail(){
            $this->db->query("SELECT * FROM seller WHERE seller_id=' {$_SESSION['seller_id'] }' ");
            $results = $this->db->resultSet();
            return $results;
        }
        public function viewDash(){
            $this->db->query("SELECT * FROM seller WHERE seller_id=' {$_SESSION['seller_id'] }' ");
            $results = $this->db->resultSet();
            return $results;
        }
        public function topPlant(){


            $this->db->query("SELECT * FROM plants WHERE seller_id=' {$_SESSION['seller_id'] }'order by price >500 ASC LIMIT 1;");
            $results = $this->db->resultSet();
            return $results;
        }
        public function topRating(){
            $this->db->query("SELECT * FROM plants WHERE seller_id=' {$_SESSION['seller_id'] }'order by price >500 ASC LIMIT 1;");
            $results = $this->db->resultSet();
            return $results;
        }

        public function updateProfile($data){
        $this->db->query("UPDATE seller SET businessName = :bname, businessAddress = :address, ownerName = :oname, contactNo = :contactNo  WHERE seller_id = '{$_SESSION['seller_id']}'");

        $this->db->bind(':bname', $data['businessName']);
        $this->db->bind(':contactNo', $data['contactNo']);
        $this->db->bind(':address', $data['businessAddress']);
        $this->db->bind(':oname', $data['ownerName']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
        }

        public function addPlant($data){
            $this->db->query('INSERT INTO plants (plant_id,seller_id,pname,img1,img2,img3,img4,price,NoOfPlants,category,orderlevel,description) VALUES (:plant_id, :seller_id, :pname, :img1,:img2, :img3,:img4, :price, :quantity, :category,:orderlevel,:description)');
                 
            $this->db->bind('plant_id', $data['plant_id']);
            $this->db->bind('seller_id', $data['seller_id']);
            $this->db->bind('pname', $data['pname']);
            $this->db->bind('img1', $data['img1']);
            $this->db->bind('img2', $data['img2']);
            $this->db->bind('img3', $data['img3']);
            $this->db->bind('img4', $data['img4']);
            $this->db->bind('price', $data['price']);
            $this->db->bind('quantity', $data['quantity']);
            $this->db->bind('category', $data['category']);
            $this->db->bind('orderlevel', $data['orderlevel']);
            $this->db->bind('description', $data['description']);

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }

        }
        public function findPlantById($plant_id){
            $this->db->query("SELECT * FROM plants WHERE plant_id=:plant_id ;");

            $this->db->bind(':plant_id',$plant_id);

            $row=$this->db->single();
            return $row;
        }
        public function updatePlant($data){
            $this->db->query("UPDATE plants set pname=:pname, price=:price,NoOfPlants=:quantity, category=:category, description=:description,orderlevel=:orderlevel,img1=:img1,img2=:img2,img3=:img3,img4=:img4 where plant_id=:plant_id");

            $this->db->bind(':plant_id', $data['plant_id']);
            /*$this->db->bind(':seller_id', $data['seller_id']);*/
            $this->db->bind(':pname', $data['pname']);
            $this->db->bind(':img1', $data['img1']);
            $this->db->bind(':img2', $data['img2']);
            $this->db->bind(':img3', $data['img3']);
            $this->db->bind(':img4', $data['img4']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':orderlevel', $data['orderlevel']);
            $this->db->bind(':description', $data['description']);

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
            
        }
        public function viewPlantDetail($plant_id){
            $this->db->query("SELECT FROM plants WHERE plant_id=:plant_id");

            $this->db->bind(':plant_id',$plant_id);
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function deletePlant($data){
            $this->db->query("DELETE from plants WHERE plant_id=:plant_id");

            $this->db->bind(':plant_id',$data['plant_id']);
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        public function flowerPlants(){
    
            $this->db->query('SELECT * FROM plants WHERE category = "flower" ORDER BY plant_id DESC;');   
            $results = $this->db->resultSet();
            return $results;
        }


        public function otherPlants(){
    
            $this->db->query('SELECT * FROM plants WHERE category = "other" ORDER BY plant_id DESC;');   
            $results = $this->db->resultSet();
            return $results;
        }

        public function housePlants(){
    
            $this->db->query('SELECT * FROM plants WHERE category = "indoor" ORDER BY plant_id DESC;');   
            $results = $this->db->resultSet();
            return $results;
        }

        public function outdoorPlants(){
    
            $this->db->query('SELECT * FROM plants WHERE category = "outdoor" ORDER BY plant_id DESC;');   
            $results = $this->db->resultSet();
            return $results;
        }

        public function pottedPlants(){
    
            $this->db->query('SELECT * FROM plants WHERE category = "potted" ORDER BY plant_id DESC;');   
            $results = $this->db->resultSet();
            return $results;
        }

        public function tablePlants(){
    
            $this->db->query('SELECT * FROM plants WHERE category = "table" ORDER BY plant_id DESC;');   
            $results = $this->db->resultSet();
            return $results;
        }

        public function AllPlants(){
    
            $this->db->query('SELECT * FROM plants ORDER BY plant_id DESC;');   
            $results = $this->db->resultSet();
            return $results;
        }

        public function sellerview(){ //sellerpage
    
            $this->db->query("SELECT * FROM seller INNER JOIN  plants ON seller.seller_id= plants.seller_id GROUP BY seller.seller_id ORDER BY seller.seller_id DESC;");
            
            $results = $this->db->resultSet();
            return $results;
            
        }

        /* public function sellersPlantDetails(){
    
            $this->db->query("SELECT * FROM plants ;");
            $results = $this->db->resultSet();
            return $results;
            
        } */
        
         

         public function sellersPlants($id){
    
            $this->db->query("SELECT * FROM plants WHERE seller_id = :seller_id "); 
            $this->db->bind(':seller_id', $id);  
            $results = $this->db->resultSet();
            return $results;
        } 

        public function sellers($id){
    
            $this->db->query("SELECT * FROM seller WHERE seller_id = :seller_id "); 
            $this->db->bind(':seller_id', $id);  
            $row = $this->db->single();
            return $row;
        }

        public function show_drivers(){
            //$this->db->query("SELECT * FROM driver join customer_address on customer_address.City= driver.city join orders on orders.customer_id=customer_address.user_id  group by driver_id");
            $this->db->query("SELECT * FROM driver group by driver_id");
            $results = $this->db->resultSet();
            return $results;
        }
        /*public function searchByDate($fromDate,$toDate){
            $this->db->query("SELECT * FROM orders JOIN orderitems ON orders.order_id = orderitems.orderID join customer_address on orders.customer_id=customer_address.user_id where orderitems.shopID= '{$_SESSION['seller_id']}' GROUP BY order_id between '$fromDate' and '$toDate'");
            $results = $this->db->resultSet();
            return $results;
        }*/


        public function orderDetail(){
    
            $this->db->query("SELECT * FROM orders left JOIN (SELECT orderid,SUM(quantity) AS solditems FROM orderitems GROUP BY orderid) solditems ON solditems.orderid = orders.order_id INNER JOIN customer ON orders.customer_id = customer.cus_id AND orders.createdon > now() - interval 30 day order by order_id asc;"); 
              
            $results = $this->db->resultSet();
            return $results;
        }

        public function orders(){
            $this->db->query("SELECT * FROM orders JOIN orderitems ON orders.order_id = orderitems.orderID join customer_address on orders.customer_id=customer_address.user_id where orderitems.shopID= '{$_SESSION['seller_id']}' GROUP BY order_id ");
           // $this->db->query("SELECT orders.order_id, orders.customer_id, orders.quantity, orders.total, orders.payment_status, orders.createdOn, orderitems.orderID, orderitems.itemName, orderitems.shopID, customer.cus_id, customer.FullName FROM orderitems JOIN orders ON orders.order_id=orderitems.order_id JOIN customer ON customer.cus_id=orders.customer_id GROUP BY order_id ");
            $results = $this->db->resultSet();
            return $results;
        }
        public function showorderDetails($order_id){
            $this->db->query("SELECT * FROM orders JOIN orderitems ON orders.order_id = orderitems.orderID join customer_address on orders.customer_id=customer_address.user_id WHERE order_id = :order_id");
            
            $this->db->bind(':order_id', $order_id); 

            $row=$this->db->resultSet();
            return $row;
        }
        public function deleteOrder(){
            $this->db->query("DELETE * from plant");
        }
        public function findSellerById($seller_id){
            $this->db->query("SELECT * FROM seller WHERE seller_id=:seller_id ;");

            $this->db->bind(':seller_id',$seller_id);

            $row=$this->db->single();
            return $row;

        }

        public function findSellerPassword(){
        
            $this->db->query("SELECT password FROM seller Where seller_id = '{$_SESSION['seller_id']}'");
    
            $results = $this->db->resultSet();
            
            return $results;
        }

        public function S_changePassword($data){

            $this->db->query("UPDATE seller SET password = :newpassword WHERE seller_id = '{$_SESSION['seller_id']}'");

            $this->db->bind(':newpassword', $data['npassword']);
         

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        
        }
        public function searchByDate($data){
            $this->db->query("SELECT createdOn FROM orders JOIN orderitems ON orders.order_id = orderitems.orderID join customer_address on orders.customer_id=customer_address.user_id where orderitems.shopID= '{$_SESSION['seller_id']}' GROUP BY order_id between min_date and max_date");
            $this->db->bind(':min_date',$data['createdOn']);
            $this->db->bind(':max_date',$data['createdOn']);

            $results = $this->db->resultSet();
            

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }
        
    }
 ?>