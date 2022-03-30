
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/A_navbar.css">
    

<div class="sidebar">
    <div class="head-details">
      <span class="head_name">Admin</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="<?php echo URLROOT; ?>/admins/A_dashboard"> <!-- class="active" -->
            <i></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/admins/A_dp_request">
            <i></i>
            <span class="links_name">Delivery person <br>requests</span>
        </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/admins/A_users_customer">
            <i></i>
            <span class="links_name">Users</span>
          </a>
        </li>
        <li>
        <a href="<?php echo URLROOT; ?>/admins/A_issues">
            <i></i>
            <span class="links_name">Issues</span>
          </a>
        </li>
        
        <li class="settings">
          <a href="<?php echo URLROOT; ?>/admins/A_settings">
            <i></i>
            <span class="links_name">Settings</span>
          </a>
        </li>
        <li class="log_out">
          <a href="<?php echo URLROOT; ?>/users/Adminlogout">
            <i></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>