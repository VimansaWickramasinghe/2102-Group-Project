
<?php require APPROOT . '/views/includes/header.php';?>
<link rel="stylesheet" href="../public/css/S_orderHistory.css" >
<script src="<?php echo URLROOT ?>/public/css/js/orderHistory.js"></script>
<style>
    .container {                        
    display: flex;
    margin-top: 50px;
}
.box-head {
    width: 98%;
    height: 25px;
    background: #9abd94;
    margin: 20px 0 0 50px;
    /* -webkit-box-shadow:0 10px 6px -2px #6f7274; */
    display: flex;
    border-radius: 12px;
}
.box-data{
    width: 98%;
    height:85px;
    background: #9abd94;
    margin: 20px 0 0 50px;
    /* -webkit-box-shadow:0 10px 6px -2px #6f7274; */
    display: flex;
    border-radius: 12px;
}
#box-row2 {
    margin: 24px 0 0 20px;
}
</style>
<script>
    function search(){
    var list=document.getElementId("list");
    document.getElementId("search").value=list.options[list.selectedIndex].text;
    }
</script>
<body>
<div class="container">
<?php require APPROOT . '/views/includes/S_sidenav.php';?>

    <!-- <div class="column-left">
        <div class="column-left-uprow">
            <div class="uprow">
                <img src="<?php echo URLROOT ?>/public/img/shop1.png" style="width:100px; height:100px;"/>
            </div>
            <div class="uprow">
                <h5 style="padding:10px 0 0 10px">Hello</h5>
                <h2 style="padding:30px 0 0 0" ><?php echo $_SESSION['seller_name'] ?></h2>
            </div>      
        </div>
        <div class="box1"><ul>
            <a href="<?php echo URLROOT ?>/Sellers/dashboard"><li><div class="box1-row">Dashboard</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/orderhistory"><li><div class="box1-row" id="active">Orders</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/store"><li><div class="box1-row">Store</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/notification"><li><div class="box1-row" >Notification</div></li></a>
            <a href="<?php echo URLROOT ?>/Sellers/report"><li><div class="box1-row">Report</div></li></a>
            <div class="orderimage"><img src="<?php echo URLROOT ?>/public/img/orderhisimg.png" style="width:300px; height:380px"></div>
        </div>    
    </div>

    <div class="vertical"></div> -->
    <div class="column-right">
        <div><h1 style="padding:0px 0 0 400px">Orders</h1></div><br>
        <div>
            <!-- <span id="search">Search By: 
                <select id="list" onchange="search()" class="dropdown-content">
                    <option><a href="#abc">All</a></option>
                    <option><a href="#abc">Date</a></option>
                    <option><a href="#abc">Name</a></option>
                </select>
            </span> <!-------------------Date search---------------------------->
            
               <!-- <span class="search">From: <input type="date" id="min" name="min" class="" data-date-format="yyyy-mm-dd">  </span>
               <span class="search">To: <input type="date" id="max" name="max" class="datepicker" data-date-format="yyyy-mm-dd">  </span>
             -->
            
        </div>
        <div id="ex1">
            <table id="my-table">
            <thead>
                <tr class="box-head">
                    <th style="width:20%;" class="topic-text">Order Date</th>
                    <th style="width:20%;" class="topic-text">Total</th>
                    <th style="width:20%;" class="topic-text">Status</th>
                    <th style="width:20%;" class="topic-text">Name</th>
                    <th style="width:20%;" class="topic-text">&nbsp;&nbsp;&nbsp;</th>
                </tr>
            </thead>
            <tbody><?php foreach($data['orders'] as $orders ) : ?>
                <tr class="box-data">
                    <td style="width:20%;" id="box-row2"><?php echo $orders->createdOn; ?></td>
                    <td style="width:20%;" id="box-row2"><?php echo $orders->total; ?></td>
                    <td style="width:20%;" id="box-row2"><?php echo $orders->payment_status; ?></td>
                    <td style="width:20%;" id="box-row2"><?php echo $orders->FullName; ?></td>
                    <td style="width:20%;">
                    <form action="<?php echo URLROOT . '/Sellers/delete'. $orders->order_id ?>" method="post">
                        <!-- <button class="button" style="background-color:#154614;">delete</button> --></form>
                        <a href="<?php echo URLROOT . '/Sellers/orderDetail/'.$orders->order_id ?>"><button class="button" style="background-color:#306C00;" >view</button></a>
                    </td>
                </tr><?php endforeach; ?>
            </tbody>
           <!-- <?php /*foreach($data['orders'] as $orders ) :*/ ?>
            
            <div class="box">
                <div style="width:20%;" class="box-column">
                    <h5 id="box-row2" class="topic-text">Order Date</h5>
                    <h5 id="box-row2"><?php //echo $orders->createdOn; ?></h5>
                </div>            
                <div style="width:20%;" class="box-column" >
                    <h4 id="box-row2" class="topic-text">Total</h4>
                    <h5 id="box-row2"><?php ////echo $orders->total; ?></h5>
                    <h5 id="box-row2">Card</h5>
                </div>
                <div style="width:20%;" class="box-column" >
                    <h5 id="box-row2" class="topic-text">Status</h5>
                    <h5 id="box-row2"><?php // echo $orders->payment_status; ?></h5>
                </div>
                <div style="width:20%;" class="box-column">
                    <h5 id="box-row2" class="topic-text">Name</h5>
                    <h5 id="box-row2"><?php //echo $orders->FullName; ?></h5>
                </div>
                <div style="width:20%;" class="box-button" >
                    <button class="button" style="background-color:#154614;">delete</button>
                    <a href="<?php // echo URLROOT ?>/Sellers/orderDetail"><button class="button" style="background-color:#306C00;" function="orderDetail($id)">view</button></a>
                    
                </div>
            </div>
            <?php /*endforeach; */?>--->
            </table>
        </div>
        <script type='text/javascript'>
//datepicker
            $('.input-daterange input').each(function() {
                 $(this).datepicker('clearDates');
            });
// Set up your table
            table = $('#my-table').DataTable({
                paging: false,
                info: false
            });
// Extend dataTables search
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#min-date').val();
                    var max = $('#max-date').val();
                    var createdAt = data[0] || 0; // Our date column in the table
                    if ((min == "" || max == "") ||(moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))) {
                        return true;
                    }
                    return false;
                }
            );
// Re-draw the table when the a date range filter changes
            $('.date-range-filter').change(function() {
                table.draw();
            });
            $('#my-table_filter').hide();
  </script>
    </div>
</div>
<div><?php require APPROOT . '/views/includes/footer.php';?></div>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
/*
function myFunction() {
  document.getElementById("search").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.button')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}*/
</script>
</body>