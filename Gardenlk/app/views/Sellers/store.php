<link rel="stylesheet" href="../public/css/S_store.css" >
<body>
<div>
<?php require APPROOT . '/views/includes/header.php';?>
</div>

<div class="container">
     <a href="<?php echo URLROOT ?>/Sellers/dashboard"><h4 style="margin-left:80px;"><img src="<?php echo URLROOT ?>/public/img/back.png"></h4></a>     
    <div class="row1">
        
        <h1><img src="<?php echo URLROOT ?>/public/img/shop3.jpg" class="shop-icon" >Cactus Shop - Inventory</h1>
    </div><br>
            
    <div class="row2">
        <div>
        <input type="submit" name="addplant" class="button" value="Add Plant" onclick="location.href='<?php echo URLROOT; ?>/Sellers/addPlant'"/>
        <input type="text" name="search" placeholder="Search..." class="search">
        </div> 
    </div>
        
    <div class="row3" id="ex1">
        <table>
            <tr >
                <th>Plant Id</th>
                <th>Plant Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Remove/Hide/Update</th>
                <th>Re-order level</th>
            </tr>
            <?php foreach($data['plant'] as $plant): ?>  
            <tr>
            <td><?php echo $plant->plant_id; ?></td>
            <td><?php echo $plant->pname; ?></td>
            <td><img src="<?php echo URLROOT ?>/public/img/<?php echo $plant->img1; ?>"  style="height:80px; width: 80px" alt="no image"></td>
            <td><?php echo $plant->description; ?></td>
            <td><?php echo $plant->category; ?></td>
            <td><?php echo $plant->NoOfPlants; ?></td>
            <td>
<!--                  <input type="submit" name="remove" class="btn2" value="Hide" /><br>
 -->                
                <form action="<?php echo URLROOT . '/Sellers/deletePlant/'.$plant->plant_id ?>" method="post"> 
                <input type="hidden" /><br>
                <input type="submit" name="delete" class="btn1" value="Remove" /><br>
                </form>
                <button type="submit" name="addplant" style="text-decoration: none;" class="updatebtn"><a href="<?php echo URLROOT . '/Sellers/updatePlant/'.$plant->plant_id?>">Update</a> </button> 
                <?php ?>
                
                
             
            
            </td>
            <td><?php echo $plant->orderlevel; ?></td>
            </tr>
            
            <?php endforeach; ?>
             
        </table>          

    </div>    
</div><br>
</body>
 </html>
