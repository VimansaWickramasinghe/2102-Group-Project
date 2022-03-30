
<link rel="stylesheet" href="<?php echo URLROOT?>/public/css/S_addPlant.css">
<link rel="stylesheet" href="<?php echo URLROOT?>/public/css/S_test2.css">
<?php require APPROOT . '/views/includes/header.php';?>
  <style>
    
#file-chosen_1 {
    margin: 100px 0 0 -160px;
    font-family: sans-serif;
    width: 100px;
}

#file-chosen_2 {
    margin: 100px 0 0 -160px;
    font-family: sans-serif;
    width: 100px;
}

#file-chosen_3 {
    margin: 100px 0 0 -160px;
    font-family: sans-serif;
    width: 100px;
}

#file-chosen_4 {
    margin: 100px 0 0 -160px;
    font-family: sans-serif;
    width: 100px;
}
#input1 {
    display: flex;
    padding: 10px 0 10px 25px;
    margin: 0 0 0 20px;

}
     
  </style>
<body>
<div></div>
<div class="container">
    <div class="left"> 
        <div>
            <a href="<?php echo URLROOT ?>/Sellers/store"> <img src="<?php echo URLROOT ?>/public/img/back.png" class="backbtn"></a>
        
        </div><div>
        <img src="<?php echo URLROOT ?>/public/img/addplantimg.png" style="width:550px; height:552px; margin:50px 50px 0 0px "></div>
    </div>
    <div class="rightform">
        <h2 style="text-align:center">Add Plant</h2>
    

    <!--FORM  -->    
        <form action="<?php echo URLROOT; ?>/sellers/updatePlant/<?php echo $data['plant']->plant_id ?>" method="post" enctype="multipart/form-data">
                
                
        <div class="input">
            <input type="text" id="pname" name="pname" placeholder="" value="<?php echo $data['plant']->pname?>" onblur="checkAvailability()" style="width:600px; height:40px; padding:0 10px 0 10px;" required/>
            <span style="color:grey;">
                <?php echo $data['NameError']; ?>
            </span>
        </div>
    
        Add Images:

        <div id="input1">
            
-->         <input type="file" id="actual-btn_1" name="img1" hidden/>
	        <label for="actual-btn_1">+</label>
            <br /><br />
	        <span id="file-chosen_1"><?php echo $data['plant']->img1?></span>

            <input type="file" id="actual-btn_2" name="img2" hidden/>
	        <label for="actual-btn_2">+</label>
            <br /><br />
	        <span id="file-chosen_2"><?php echo $data['plant']->img2?></span>

            <input type="file" id="actual-btn_3" name="img3" hidden/>
	        <label for="actual-btn_3">+</label>
            <br /><br />
	        <span id="file-chosen_3"><?php echo $data['plant']->img3?></span>

            <input type="file" id="actual-btn_4" name="img4" hidden/>
	        <label for="actual-btn_4">+</label>
            <br /><br />
	        <span id="file-chosen_4"><?php echo $data['plant']->img4?></span>

        
        </div>

        <div class="input1">
            <input type="text"  name="price" placeholder="" value="<?php echo $data['plant']->price?>" onblur="checkAvailability()" style="width:300px; height:40px; padding:0 10px 0 10px;"  multiple="" required />
            <span style="color:grey;">
                <?php echo $data['priceError']; ?>
            </span>

            <input type="text"  name="quantity" placeholder="" value="<?php echo $data['plant']->NoOfPlants?>" onblur="checkAvailability()" style="width:300px; height:40px; padding:0 10px 0 10px;"  multiple="" required/>
            <span style="color:grey;">
                <?php echo $data['quantityError']; ?> 
            </span>
        </div>
        <div class="input">
            
            <select id="category" name="category"> 
                <option ><?php echo $data['plant']->category?></option>
                <option value="table">Table Plant</option>
                <option value="potted">Potted Plant</option>
                <option value="house">House Plant</option>
                <option value="indoor">Indoor Plant</option>
                <option value="outdoor">Outdoor Plant</option>
            </select>
            <span style="color:grey;">
                <?php echo $data['categoryError']; ?>
            </span>
             
            <select id="orderlevel" name="orderlevel"> 
                <option ><?php echo $data['plant']->orderlevel?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
              
        </div>
        <div>
            <textarea class="textarea" onkeyup="charCount();" id="textarea" name="description"  rows="" ><?php echo $data['plant']->description?></textarea>
            <!--<span class="textarea_count">0/100(Max Character 100)</span>-->    
        </div>
        

        <button class="button" type="submit" id="submitbtn">Save</button>

        
        </form>
        
    </div>
    
</div>
<div>

<?php require APPROOT . '/views/includes/footer.php';?>
</div><!--
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/addPlant.js"></script>
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/addPlant2.js"></script>-->
<script type="text/javascript">
    function charCount(){
        var element=document.getElementById('textarea').value.length;
        document.getElementById('textarea_count').innerHTML=element+"/100 (Max Character 100).";
    }
    function display_image_name(file_name){
        document.querySelector(".file_info").innerHTML='Selected file:<br>'+file_name;
    }
    const actualBtn1 = document.getElementById('actual-btn_1');
    const fileChosen1 = document.getElementById('file-chosen_1');
    actualBtn1.addEventListener('change', function(){fileChosen1.textContent = this.files[0].name})

    const actualBtn2 = document.getElementById('actual-btn_2');
    const fileChosen2 = document.getElementById('file-chosen_2');
    actualBtn2.addEventListener('change', function(){fileChosen2.textContent = this.files[0].name})

    const actualBtn3 = document.getElementById('actual-btn_3');
    const fileChosen3 = document.getElementById('file-chosen_3');
    actualBtn3.addEventListener('change', function(){fileChosen3.textContent = this.files[0].name})

    const actualBtn = document.getElementById('actual-btn_4');
    const fileChosen = document.getElementById('file-chosen_4');
    actualBtn4.addEventListener('change', function(){fileChosen4.textContent = this.files[0].name})
</script>
</body>

