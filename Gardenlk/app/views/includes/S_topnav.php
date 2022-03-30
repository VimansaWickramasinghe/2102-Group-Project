<div><h1 style="padding:0px 0 0 400px">DashBoard </h1></div><br>
         
        <div class="box-list">
            <div class="box2"><?php echo $data['completeCount'][0]->completeCount ?><br>Completed</div>
            <div class="box2"><?php echo $data['pendingCount'][0]->pendingCount ?><br>To Deliver</div>
            <div class="box2"><?php echo $data['pendingplantsCount'][0]->pendingplantsCount ?><br>Pending Plants</div>
            <div class="box2"><?php echo $data['plantsCount'][0]->plantsCount ?><br>Plants</div> <!-- count -->
        </div><br>
        <div class="box-list2">                 <!----------------------------buttons -done ------------------------------->
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_completed" id="text"><div><button name="complete" class="box3" >Completed</button></div></a>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_pending" id="text"><div><button name="pending" class="box3" >To Deliver</button></div></a>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_cancelled" id="text"><div><button name="cancelled" class="box3">Pending Plants</button></div></a>
            <a href="<?php echo URLROOT; ?>/Sellers/dashboard_plants" id="text"><div><button name="plants" class="box3">Plants</button></div></a>
        </div><br>