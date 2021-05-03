<!-- header -->
<?php require APPROOT .'/views/inc/header.php';?>
<!-- end header -->
    
    <h1 class="my-sm-5">Welcome, <?php echo $data['username'] ?>!</h1>

    <h3 class="my-sm-4">Your profile:</h3>
    <hr>
    <div class="row">
        <label class="col-lg-3 font-weight-bold">Username:</label>
        <span class="col-lg-3"><?php echo $data['username']; ?></span>
    </div>
    <hr>
    <div class="row">
        <label class="col-lg-3 font-weight-bold">Signup date:</label>
        <span class="col-lg-3"><?php $time = strtotime($data['created_at']); $day = date('D,d M Y G:is +0000', $time); echo $day; ?></span>
    </div>
    <hr>
    <div class="row">
        <label class="col-lg-3 font-weight-bold">Last login:</label>
        <span class="col-lg-3"><?php $time1 = strtotime($data['last_login']); $day1 = date('D,d M Y G:i:s +0000',$time1); echo $day1; ?></span>
    </div>

<!-- footer -->
<?php require APPROOT .'/views/inc/footer.php'; ?>
<!-- end footer -->