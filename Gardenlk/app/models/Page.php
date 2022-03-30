
<?php
class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }




    public function contact($data)
    {

        $this->db->query('INSERT INTO `contactus` (name, email, message) VALUES(:name, :email, :message)');

        //Bind values

        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('message', $data['message']);

        //Execute function

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




    public function NewArrivals()
    {

        $this->db->query('SELECT * FROM plants WHERE status ="accept" ORDER BY plant_id DESC LIMIT 8;');

        $results = $this->db->resultSet();

        return $results;
    }


    public function BestSelling()
    {

        $this->db->query('SELECT * FROM plants INNER JOIN orderitems on plants.plant_id = orderitems.plantID GROUP BY orderID HAVING COUNT(quantity) > 1 LIMIT 8');

        $results = $this->db->resultSet();

        return $results;
    }



    public function TopRated()
    {

        $this->db->query('SELECT * FROM plants WHERE status ="accept" ORDER BY plant_id DESC LIMIT 8;');

        $results = $this->db->resultSet();

        return $results;
    }


    public function cartItems()
    {

        $this->db->query('SELECT * FROM plants inner join seller on plants.seller_id = seller.seller_id ORDER BY plant_id DESC;');

        $results = $this->db->resultSet();

        return $results;
    }


    public function CreateOrder($order)
    {

        $this->db->query('INSERT INTO orders (customer_id, total) VALUES (:customer_id, :total)');


        $this->db->bind('customer_id', $order['customer_id']);
        $this->db->bind('total', $order['total']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }











    public function getDriverId($sellerid,$orderid){

        $this->db->query('SELECT driver_id FROM delivery where seller_id = :seller_id AND order_id = :order_id ;');

        $this->db->bind(':seller_id', $sellerid );
        $this->db->bind(':order_id', $orderid);

        $results = $this->db->single();
        
        return $results;



}

             

    public function feedback1($driver_review){

        $this->db->query('INSERT INTO `driver_rate`(order_id,driver_id,starRate,feedback_msg) VALUES(:order_id, :driver_id, :starRate, :feedback_msg)');
        {
            
             //Bind values
             /* $this->db->bind('rate_id', $driver_review['rate_id']); */
             $this->db->bind('order_id', $driver_review['order_id']);
             $this->db->bind('driver_id', $driver_review['driver_id']);
             $this->db->bind('starRate', $driver_review['starRate']);
             $this->db->bind('feedback_msg', $driver_review['feedback_msg']);
            
             //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            } 
            
        }

    }

    public function feedback2($seller_review){

        $this->db->query('INSERT INTO `shop_rate`(order_id,seller_id,heartRate,feedback_msg) VALUES(:order_id, :seller_id, :heartRate, :feedback_msg)');
        {
            
             //Bind values
            /*  $this->db->bind('rate_id', $seller_review['rate_id']); */
             $this->db->bind('order_id', $seller_review['order_id']);
             $this->db->bind('seller_id', $seller_review['seller_id']);
             $this->db->bind('heartRate', $seller_review['heartRate']);
             $this->db->bind('feedback_msg', $seller_review['feedback_msg']);
             
             //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            } 
            
        }

    }









 





    public function orderItems($orderItem)
    {

        $this->db->query('INSERT INTO orderitems (orderID, itemName, plantID, shopID, quantity) VALUES (:order_id, :plantName, :plantID, :shopID, :quantity )');


        $this->db->bind('order_id', $orderItem['order_id']);
        $this->db->bind('plantID', $orderItem['plantID']);
        $this->db->bind('quantity', $orderItem['quantity']);
        $this->db->bind('shopID', $orderItem['shopID']);
        $this->db->bind('plantName', $orderItem['plantName']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function getQuantity($data){

        $this->db->query('SELECT NoOfPlants from plants WHERE plant_id = :plant_id '); 
        $this->db->bind(':plant_id', $data['plantID']);

        $results = $this->db->single();

        return $results;
 
    }

    public function getInventryQuantity($orderItem)
    {

        $this->db->query('SELECT NoOfPlants from plants WHERE plant_id = :plantID');
        
        
        $this->db->bind(':plantID', $orderItem['plantID']);
        

        $results = $this->db->single();

        return $results;
    }



    public function updateInventry($orderItem,$updatedInventry){

        $this->db->query("UPDATE plants SET NoOfPlants = :updatedInventry WHERE plant_id = :plantID");

        $this->db->bind(':plantID', $orderItem['plantID']);
        $this->db->bind(':quantity', $orderItem['quantity']);
        $this->db->bind(':updatedInventry', $updatedInventry);

 
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }



    public function orderId()
    {

        $this->db->query("SELECT order_id FROM orders WHERE customer_id='{$_SESSION['cus_id']}' ORDER BY order_id DESC LIMIT 1;");

        $results = $this->db->resultSet();

        return $results;
    }




    public function feedback($data)
    {

        $this->db->query('INSERT INTO `ratings`(rating_id,LikeDislike,feedback_msg1,starRate,feedback_msg2,heartRate,feedback_msg3) VALUES(:rating_id,:LikeDislike, :feedback_msg1, :starRate, :feedback_msg2, :heartRate, :feedback_msg3)'); {

            //Bind values
            $this->db->bind('rating_id', $data['rating_id']);
            $this->db->bind('LikeDislike', $data['LikeDislike']);
            $this->db->bind('feedback_msg1', $data['feedback_msg1']);
            $this->db->bind('starRate', $data['starRate']);
            $this->db->bind('feedback_msg2', $data['feedback_msg2']);
            $this->db->bind('heartRate', $data['heartRate']);
            $this->db->bind('feedback_msg3', $data['feedback_msg3']);

            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function checkoutItems()
    {

        $this->db->query('SELECT * FROM plants ORDER BY plant_id DESC;');
        $results = $this->db->resultSet();
        return $results;
    }

    public function billingDetails()
    {

        $this->db->query("SELECT * FROM customer inner join customer_address on customer.cus_id = customer_address.user_id  WHERE customer.cus_id='{$_SESSION['cus_id']}'");

        $results = $this->db->resultSet();

        return $results;
    }



    public function checkout()
    {

        $this->db->query('SELECT * FROM plants ORDER BY plant_id DESC;');
        $results = $this->db->resultSet();
        return $results;
    }
}
