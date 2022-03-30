
<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['admin_id']) || isset($_SESSION['moderator_id']) || isset($_SESSION['cus_id']) || isset($_SESSION['driver_id']) || isset($_SESSION['seller_id'])) {
            return true;
        } else {
            return false;
        }
    }