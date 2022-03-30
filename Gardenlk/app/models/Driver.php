<?php
class Driver
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function driverInfo()
    {
        $this->db->query("SELECT * FROM driver WHERE email='{$_SESSION['email']}'");

        $results = $this->db->resultSet();

        return $results;
    }

    public function showorderDetails()
    {
        $this->db->query("SELECT * FROM `orderitems` INNER JOIN orders ON orderitems.orderID=orders.order_id GROUP BY shopID,orderID ORDER BY orderitems.orderID;");

        $results = $this->db->resultSet();

        return $results;
    }

    public function showorderDetails1()
    {
        $this->db->query("SELECT * FROM orders  inner join orderitems on orders.order_id=orderitems.orderID INNER JOIN delivery ON orders.order_id=delivery.order_id where orderitems.order_status = 'toReceive' AND delivery.deliverstatus = 'toDeliver' AND delivery.driver_id = '{$_SESSION['driver_id']}' group by orderitems.shopID ORDER BY orders.order_id ASC;");

        $results = $this->db->resultSet();

        return $results;
    }

    public function showorderDetails2()
    {
        $this->db->query("SELECT * FROM orders  inner join orderitems on orders.order_id=orderitems.orderID where orderitems.order_status = 'toReview' group by orderitems.shopID ORDER BY order_id ASC;");

        $results = $this->db->resultSet();

        return $results;
    }

    public function findDriverPassword()
    {

        $this->db->query("SELECT password FROM driver Where driver_id = '{$_SESSION['driver_id']}'");

        $results = $this->db->resultSet();

        return $results;
    }

    public function D_changePassword($data)
    {

        $this->db->query("UPDATE driver SET password = :newpassword WHERE driver_id = '{$_SESSION['driver_id']}'");

        $this->db->bind(':newpassword', $data['new_password']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getShopDetails($seller_id)
    {

        $this->db->query("SELECT * FROM orderitems inner join seller on orderitems.shopID = seller.seller_id where orderitems.shopID=:sellerID limit 1;");

        $this->db->bind(':sellerID', $seller_id);

        $results = $this->db->resultSet();
        

        return $results;
        
    }

    public function showorderviewDetails()
    {
        $this->db->query("SELECT * FROM `orderitems` INNER JOIN orders ON orderitems.orderID=orders.order_id LEFT JOIN seller ON orderitems.shopID=seller.seller_id LEFT JOIN plants ON orderitems.plantID=plants.plant_id INNER JOIN delivery ON orderitems.orderID=delivery.order_id where orderitems.order_status = 'toReceive' AND delivery.order_id=orderitems.orderID AND delivery.seller_id=orderitems.shopID;");

        $results = $this->db->resultSet();

        return $results;
    }

    public function showorderviewDetails1()
    {
        $this->db->query("SELECT * FROM `orderitems` INNER JOIN orders ON orderitems.orderID=orders.order_id LEFT JOIN seller ON orderitems.shopID=seller.seller_id LEFT JOIN plants ON orderitems.plantID=plants.plant_id INNER JOIN delivery ON orderitems.orderID=delivery.order_id where orderitems.order_status = 'toDeliver' AND delivery.order_id=orderitems.orderID AND delivery.seller_id=orderitems.shopID;");

        $results = $this->db->resultSet();

        return $results;
    }


    public function showcustomerDetails($order_id)
    {
        // $this->db->query("SELECT * FROM `orders` INNER JOIN customer ON orders.customer_id=customer.cus_id INNER JOIN customer_address on orders.customer_id=customer_address.user_id  where orders.order_id=:order_id AND orders.order_status='toReceive' limit 1;");
        $this->db->query("SELECT * FROM `orders` INNER JOIN customer ON orders.customer_id=customer.cus_id INNER JOIN customer_address on orders.customer_id=customer_address.user_id  where orders.order_id=:order_id limit 1;");
        $this->db->bind(':order_id', $order_id);

        $results = $this->db->resultSet();
        

        return $results;
    }
    public function toDeliver($data)
    {

        $this->db->query("INSERT into delivery (`order_id`, `seller_id`, `driver_id`, `deliverstatus`) VALUES ( :order_id, :seller_id, :driver_id, :deliverstatus);");

        $this->db->bind('order_id', $data['order_id']);
        $this->db->bind('seller_id', $data['seller_id']);
        $this->db->bind('driver_id', $_SESSION['driver_id']);
        $this->db->bind('deliverstatus', 'todeliver');
       

        if ($this->db->execute()) {
            $this->db->query("UPDATE orderitems set order_status='toDeliver' where orderID=:order_id AND shopID=:seller_id   ;");

            $this->db->bind(':order_id', $data['order_id']);
            $this->db->bind(':seller_id', $data['seller_id']); 
            $this->db->execute();
            return true;
        } else {
            return false;
        }
    }

    public function Accepted($data)
    {

        $this->db->query("UPDATE delivery set deliverstatus='delivered' where order_id=:order_id AND seller_id=:seller_id   ;");

        $this->db->bind(':order_id', $data['order_id']);
        $this->db->bind(':seller_id', $data['seller_id']);

        if ($this->db->execute()) {
            $this->db->query("UPDATE orderitems set order_status='toReview' where orderID=:order_id AND shopID=:seller_id   ;");

            $this->db->bind(':order_id', $data['order_id']);
            $this->db->bind(':seller_id', $data['seller_id']); 
            $this->db->execute();
            return ('location: ' . URLROOT . '/drivers/Dhistory');
        } else {
            return false;
        }
    }
}
