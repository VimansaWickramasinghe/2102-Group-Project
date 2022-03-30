<div class="col1">

    <div class="uprow">
        <h4>Hello!</h4>
        <?php foreach ($data['customer'] as $customers) : ?>
            <h2 style="padding:30px 10px 0 0"><b><?php echo $customers->FullName ?></b></h2>
    </div>
    <!-- navigation -->
    <div class="btn">

        <a href="<?php echo URLROOT ?>/Customers/C_AccountIndex">
            <div class="btn-row">My Account</div>
        </a>
        <a href="<?php echo URLROOT ?>/Customers/C_OrdersHistory">
            <div class="btn-row">My Orders</div>
        </a>
        <a href="<?php echo URLROOT ?>/users/logout">
            <div class="btn-row">Logout</div>
        </a>
    </div>

</div>
<?php endforeach ?>