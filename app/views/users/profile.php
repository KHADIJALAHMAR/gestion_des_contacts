<!-- header -->
<?php require APPROOT .'/views/inc/header.php';?>
<!-- end header -->
    
    <h1>Welcome, <?php echo $data['username'] ?>!</h1>

    <h3>Your profile:</h3>
    <hr>

    <label>Username:</label>
    <span><?php echo $data['username']; ?></span>
    <hr>

    <label>Signup date:</label>
    <span><?php echo $data['created_at']; ?></span>
    <hr>

    <label>Last login:</label>
    <span><?php echo $data['created_at']; ?></span>





<!-- footer -->
<?php require APPROOT .'/views/inc/footer.php'; ?>
<!-- end footer -->