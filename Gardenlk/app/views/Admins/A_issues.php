<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/A_dp_request.css">
   
     

   </head>

<body>
<?php include_once APPROOT . '/views/includes/A_sidenav.php'; ?> 
  <section class="home-section">
    <nav>
      <div class="sidebar-topic">
        <span class="dashboard">Issues </span>
      </div>
    </nav>

    <div class="home-content">

    <?php foreach($data['contact'] as $issue ): ?>

    <div class="boxes">
        <div class="newreq box">
            <div>
               <div class="row">
                    <div class="column">
                        <p><b>Name:</b> <?php echo $issue->name; ?></p>
                        <p><b>Email:</b> <?php echo $issue->email; ?></p>
                     </div>
                    <div class="column">
                         
                        <p><b>Message:</b> <?php echo $issue->message; ?></p>        
                    </div>  
                </div>
            </div>
        </div> 
        </div><br>
        <?php endforeach; ?> 

        </div>
    </div>



  </section>



</body>
</html>

