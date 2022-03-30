
<link rel="stylesheet" href="<?php echo URLROOT?>/public/css/S_addPlant.css">
<link rel="stylesheet" href="<?php echo URLROOT?>/public/css/S_test2.css">
<?php require APPROOT . '/views/includes/header.php';?>
  
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
        <form method="POST" action="<?php echo URLROOT; ?>/sellers/addPlant">                  
        <div class="input">
            <input type="text" id="pname" name="pname" placeholder="Plant Name" value="" onblur="checkAvailability()" style="width:600px; height:40px; padding:0 10px 0 10px;" required/>
            <span style="color:grey;">
                <?php echo $data['NameError']; ?>
            </span>
        </div>
    
        Add Images:
        <div id="input1">

            <input type="file" id="actual-btn_1" name="img1" hidden/>
	        <label for="actual-btn_1">+</label>
            <br /><br />
	        <span id="file-chosen_1">No file chosen</span>

            <input type="file" id="actual-btn_2" name="img2" hidden/>
	        <label for="actual-btn_2">+</label>
            <br /><br />
	        <span id="file-chosen_2">No file chosen</span>

            <input type="file" id="actual-btn_3" name="img3" hidden/>
	        <label for="actual-btn_3">+</label>
            <br /><br />
	        <span id="file-chosen_3">No file chosen</span>

            <input type="file" id="actual-btn_4" name="img4" hidden/>
	        <label for="actual-btn_4">+</label>
            <br /><br />
	        <span id="file-chosen_4">No file chosen</span>

        </div>

        <div class="input1">
            <input type="text"  name="price" placeholder="Price" value="" onblur="checkAvailability()" style="width:300px; height:40px; padding:0 10px 0 10px;" required />
            <span style="color:grey;">
                <?php echo $data['priceError']; ?>
            </span>

            <input type="text"  name="quantity" placeholder="Quantity" value="" onblur="checkAvailability()" style="width:300px; height:40px; padding:0 10px 0 10px;"  required/>
            <span style="color:grey;">
                <?php echo $data['quantityError']; ?> 
            </span>
        </div>
        <div class="input">
            
            <select id="category" name="category" > 
                <option value="null">Category</option>
                <option value="table">Table Plant</option>
                <option value="potted">Potted Plant</option>
                <option value="house">House Plant</option>
                <option value="indoor">Indoor Plant</option>
                <option value="outdoor">Outdoor Plant</option>
                <option value="outdoor">Other Plant</option>
            </select>
            <span style="color:grey;">
                <?php echo $data['categoryError']; ?>
            </span>
             
            <select id="orderlevel" name="orderlevel"> 
                <option value="null">Select Reorder level</option>
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
            <textarea class="textarea" onkeyup="charCount();" id="textarea" name="description" placeholder="Description Here.." rows="" ></textarea>
            <!--<span class="textarea_count">0/100(Max Character 100)</span>-->    
        </div>
        

        <button class="button" type="submit" >Save</button>

        
        </form>
        
    </div>
    
</div>
<div>

<?php require APPROOT . '/views/includes/footer.php';?>
</div>
<script type="text/javascript">
   /* function charCount(){
        var element=document.getElementById('textarea').value.length;
        document.getElementById('textarea_count').innerHTML=element+"/100 (Max Character 100).";
    }*/
    /*function display_image_name(file_name){
        document.querySelector(".file_info").innerHTML='Selected file:<br>'+file_name;
    }*/
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

