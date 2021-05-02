<!-- header -->
<?php require APPROOT .'/views/inc/header.php';?>
<!-- end header -->
    
    <h1 class="my-sm-5">Welcome, <?php echo $data['username'] ?>!</h1>

    <h3 class="my-sm-4">Your profile:</h3>
    <hr>

    <label class="col-lg-1 font-weight-bold">Username:</label>
    <span class="col-lg-6"><?php echo $data['username']; ?></span>
    <hr>

    <label class="col-lg-1 font-weight-bold">Signup date:</label>
    <span class="col-lg-2"><?php $day = date('l,d F'); echo $day . ' ' . $data['created_at']; ?></span>
    <hr>

    <label class="col-lg-1 font-weight-bold">Last login:</label>
    <span class="col-lg-2"><?php $day1 = date('l,d F Y'); echo $day1 . ' ' . $data['last_login']; ?></span>

<!-- footer -->
<?php require APPROOT .'/views/inc/footer.php'; ?>
<!-- end footer -->