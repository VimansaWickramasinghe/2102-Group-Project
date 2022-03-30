<?php
class Customer {

    private $db;

    public function __construct() {
            $this->db = new Database;
    }
    

    public function findAllAddress() {
        $this->db->query("SELECT * FROM customer_address WHERE user_id='{$_SESSION['cus_id']}'");

        $results = $this->db->resultSet();
        
        return $results;
    }

    public function addAddress($data) {
        $this->db->query('INSERT INTO customer_address (user_id, FullName, Line1, Line2, City, PostalCode, ContactNo) VALUES (:user_id, :FullName, :Line1, :Line2, :City, :PostalCode, :ContactNo)');
        
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('FullName', $data['FullName']);
        $this->db->bind('Line1', $data['Line1']);
        $this->db->bind('Line2', $data['Line2']);
        $this->db->bind('City', $data['City']);
        $this->db->bind('PostalCode', $data['PostalCode']);
        $this->db->bind('ContactNo', $data['ContactNo']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
    


    public function showaddressDetails($data){

        $this->db->query("SELECT * FROM customer_address Where id =:id");

        $this->db->bind(':id', $data);
    
            $results = $this->db->single();
            
            return $results;

    }

    public function updateAddress($data) {
        $this->db->query("UPDATE customer_address SET FullName=:FullName, Line1=:Line1, Line2=:Line2, City=:City, PostalCode=:PostalCode, ContactNo=:ContactNo WHERE user_id = '{$_SESSION['cus_id']}'");
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':FullName', $data['FullName']);
        $this->db->bind(':Line1', $data['Line1']);
        $this->db->bind(':Line2', $data['Line2']);
        $this->db->bind(':City', $data['City']);
        $this->db->bind(':PostalCode', $data['PostalCode']);
        $this->db->bind(':ContactNo', $data['ContactNo']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
     
    
    public function findCustomerPassword(){
        $this->db->query("SELECT password FROM customer Where cus_id = '{$_SESSION['cus_id']}'");
    
            $results = $this->db->resultSet();
            
            return $results;
    }

    public function CustomerchangePassword($data){

        $this->db->query("UPDATE customer SET password = :newpassword WHERE cus_id = '{$_SESSION['cus_id']}'");

        $this->db->bind(':newpassword', $data['npassword']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function updateProfile($data){
        $this->db->query("UPDATE customer SET FullName = :newname, district = :district WHERE cus_id = '{$_SESSION['cus_id']}'");

        $this->db->bind(':newname', $data['fname']);
        $this->db->bind(':district', $data['district']);


        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function getToReceiveOrderDetails(){

/*         $this->db->query("SELECT * FROM orderitems LEFT join orders on orders.order_id = orderitems.order_id left JOIN seller on seller.seller_id=orderitems.seller_id group by orderitems.seller_id,orderitems.order_id;");
 */
        $this->db->query("SELECT * FROM ((orders inner join orderitems on orders.order_id = orderitems.orderID) inner join seller on seller.seller_id= orderitems.shopID) WHERE orders.customer_id = '{$_SESSION['cus_id']}' AND orderitems.order_status = 'toReceive' GROUP BY orderitems.shopID,orderitems.orderID ORDER BY createdOn DESC;");
    
            $results = $this->db->resultSet();
            return $results;
    }

    public function getCompletedOrderDetails(){
        $this->db->query("SELECT * FROM ((orders inner join orderitems on orders.order_id = orderitems.orderID) inner join seller on seller.seller_id= orderitems.shopID) WHERE orders.customer_id = '{$_SESSION['cus_id']}' AND orders.order_status = 'completed' ORDER BY createdOn DESC;");
    
            $results = $this->db->resultSet();
            return $results;
    }

    /* public function showcustomerDetails(){

        $this->db->query("SELECT * FROM customer WHERE cus_id='{$_SESSION['cus_id']}'");

        $results = $this->db->resultSet();
        
        return $results;

    } 

    public function  showorderDetails(){

        $this->db->query("SELECT * FROM orderitems inner join plants,orders  ORDER BY orders.order_id  ASC;");

        $results = $this->db->resultSet();
        
        return $results;

    }
    
    
    public function  showplantDetails($seller_id,$order_id){

        $this->db->query("SELECT * FROM (((orderitems 
        inner join orders on orders.order_id=orderitems.orderID)
        inner join seller on seller.seller_id=orderitems.shopID)
        inner join plants on plants.plant_id=orderitems.plantID)
        WHERE seller.seller_id=:sid AND
        orders.order_id=:oid AND orders.customer_id='{$_SESSION['cus_id']}';");


        $this->db->bind(':sid', $seller_id);
        $this->db->bind(':oid',$order_id);

        $results = $this->db->resultSet();
        
        return $results;

    } 
    
    public function sellerview(){ 
    
        $this->db->query("SELECT * FROM (orderitems INNER JOIN orders on orders.order_id = orderitems.orderID) INNER JOIN seller on seller.seller_id=orderitems.shopID WHERE orders.customer_id = '{$_SESSION['cus_id']}' AND orders.order_status ='toReview' group by orderitems.shopID,orderitems.orderID;");
        $results = $this->db->resultSet();
        return $results;
        
    } */


    public function C_OrdersToReveiw($data){
        $this->db->query('INSERT INTO `ratings`(rating_id,LikeDislike) VALUES(:rating_id,:LikeDislike)');
        {
            
             //Bind values
             $this->db->bind('rating_id', $data['rating_id']);
             $this->db->bind('LikeDislike', $data['LikeDislike']);
             
             //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            } 
            
        }

    }














    /* public function showcustomerDetails()
    {

        $this->db->query("SELECT * FROM customer WHERE cus_id='{$_SESSION['cus_id']}'");

        $results = $this->db->resultSet();

        return $results;
    }

    public function  showorderDetails()
    {

        $this->db->query("SELECT * FROM orderitems inner join plants,orders  ORDER BY orders.order_id  ASC;");

        $results = $this->db->resultSet();

        return $results;
    }

    public function  showplantDetails($seller_id, $order_id)
    {

        $this->db->query("SELECT * FROM (((orderitems 
        inner join orders on orders.order_id=orderitems.orderID)
        inner join seller on seller.seller_id=orderitems.shopID)
        inner join plants on plants.plant_id=orderitems.plantID)
        WHERE seller.seller_id=:sid AND
        orders.order_id=:oid AND orders.customer_id='{$_SESSION['cus_id']}';");


        $this->db->bind(':sid', $seller_id);
        $this->db->bind(':oid', $order_id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function sellerview()
    {

        $this->db->query("SELECT * FROM orderitems INNER join orders on
         orders.order_id = orderitems.orderID INNER JOIN 
         seller on seller.seller_id=orderitems.shopID inner join 
         delivery on orderitems.orderID=delivery.order_id WHERE
          orders.customer_id='{$_SESSION['cus_id']}' AND
            delivery.deliverstatus = 'delivered' group by
             orderitems.shopID,orderitems.orderID  order by orderitems.orderID;"); 
        


        $results = $this->db->resultSet();
        return $results;
    } */




    
    public function showcustomerDetails()
    {

        $this->db->query("SELECT * FROM customer WHERE cus_id='{$_SESSION['cus_id']}'");

        $results = $this->db->resultSet();

        return $results;
    }

    public function  showorderDetails()
    {

        $this->db->query("SELECT * FROM orderitems inner join plants,orders  ORDER BY orders.order_id  ASC;");

        $results = $this->db->resultSet();

        return $results;
    }



    public function searchShop($data1){

            $this->db->query("SELECT * FROM ((orders inner join orderitems on orders.order_id = orderitems.orderID) inner join seller on seller.seller_id= orderitems.shopID) WHERE orders.customer_id = '{$_SESSION['cus_id']}' AND orders.order_status = 'completed' AND seller.businessName = ':searchName' ORDER BY createdOn DESC;");
        

            $this->db->bind(':searchName', $data1['searchName']);

                $results = $this->db->resultSet();
                return $results;
        }
    


    public function  showplantDetails($seller_id, $order_id)
    {

        $this->db->query("SELECT * FROM (((orderitems 
        inner join orders on orders.order_id=orderitems.orderID)
        inner join seller on seller.seller_id=orderitems.shopID)
        inner join plants on plants.plant_id=orderitems.plantID)
        WHERE seller.seller_id=:sid AND
        orders.order_id=:oid AND orders.customer_id='{$_SESSION['cus_id']}';");


        $this->db->bind(':sid', $seller_id);
        $this->db->bind(':oid', $order_id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function Reviewed($data)
    {

        $this->db->query("UPDATE orderitems set order_status='completed' where orderID=:orderID AND shopID=:sellerID ;");

        $this->db->bind(':orderID', $data['orderID']);
        $this->db->bind(':sellerID', $data['sellerID']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function sellerview()
    {

        $this->db->query("SELECT * FROM orderitems INNER join orders on orders.order_id = orderitems.orderID INNER JOIN seller on seller.seller_id=orderitems.shopID inner join delivery on orderitems.orderID=delivery.order_id WHERE orders.customer_id='{$_SESSION['cus_id']}' AND  delivery.deliverstatus = 'delivered' AND orderitems.order_status='toReview' group by orderitems.shopID,orderitems.orderID  order by orderitems.orderID;");

        $results = $this->db->resultSet();
        return $results;
    }



    
    public function  feedback($data1)
    {

        $this->db->query('INSERT INTO `ratings`(order_id,plant_id,LikeDislike) VALUES(:order_id,:plant_id,:LikeDislike)'); {

            //Bind values
            $this->db->bind('order_id', $data1['order_id']);
            $this->db->bind('plant_id', $data1['plant_id']);
            $this->db->bind('LikeDislike', $data1['LikeDislike']);

            //Execute function
            if ($this->db->execute()) {
                return  true;
            } else {
                return false;
            }
        }
    }
    public function  feedbackRecordCount($data1)
    {

        $this->db->query('SELECT * FROM `ratings` WHERE  order_id=:order_id AND plant_id=:plant_id'); {

            //Bind values
            $this->db->bind('order_id', $data1['order_id']);
            $this->db->bind('plant_id', $data1['plant_id']);

            //Execute function

            $results = $this->db->resultSet();
            return $results;
        }
    }
    public function  feedbackRecordUpdate($data1)
    {

        $this->db->query('UPDATE ratings SET LikeDislike=:LikeDislike WHERE order_id=:order_id AND plant_id=:plant_id'); {

            //Bind values
            $this->db->bind('order_id', $data1['order_id']);
            $this->db->bind('plant_id', $data1['plant_id']);
            $this->db->bind('LikeDislike', $data1['LikeDislike']);

            //Execute function 

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }





 /*  $this->db->query("SELECT * FROM orderitems INNER join orders
         on orders.order_id = orderitems.orderID INNER JOIN seller
          on seller.seller_id=orderitems.shopID inner join delivery
           on orderitems.orderID=delivery.order_id WHERE
            orders.customer_id='{$_SESSION['cus_id']}' AND
             deliverstatus = 'delivered' group by
              orderitems.shopID,orderitems.orderID  order by orderitems.orderID;"); */

/* $this->db->query("SELECT * FROM orderitems INNER JOIN orders on orders.order_id = orderitems.orderID INNER JOIN
seller on seller.seller_id=orderitems.shopID Inner JOIN delivery on delivery.order_id=orderitems.orderID WHERE
orders.customer_id='{$_SESSION['cus_id']}' AND
delivery.deliverstatus = 'delivered' AND
orders.order_status ='toReview'
group by orderitems.shopID,orderitems.orderID;"); */

/* $this->db->query("SELECT * FROM (((orderitems INNER JOIN orders on orders.order_id = orderitems.orderID) INNER JOIN
seller on seller.seller_id=orderitems.shopID) Inner JOIN delivery on orderitems.orderID=delivery.order_id) WHERE
orders.customer_id='{$_SESSION['cus_id']}' AND
deliverstatus = 'delivered' AND
orders.order_status ='toReview' AND
group by orderitems.shopID,orderitems.orderID;"); */







    
     
    


















    public function showRecentOrders(){

        $this->db->query("SELECT * FROM (orders inner join orderitems on orders.order_id = orderitems.orderID ) inner join plants on plants.plant_id = orderitems.plantID WHERE orders.customer_id = '{$_SESSION['cus_id']}' order by orders.createdOn DESC limit 2 ;");

        $results = $this->db->resultSet();
        
        return $results;

    }

       public function getOrderDate($date){

        


        $this->db->query("SELECT DATEADD(day, 7, '()') AS DateAdd;");

        $results = $this->db->resultSet();
        
        return $results;

    } 




        
/*     SELECT DATEADD(day, 7, '2017/08/25') AS DateAdd; 
 */
}



?>
