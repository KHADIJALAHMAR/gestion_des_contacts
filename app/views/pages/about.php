<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-flud">
    <div class="container">
        <h1 class="display-3"> <?php echo $data['title']; ?> </h1>
        <p class="lead"><?php echo $data['description']; ?></p>
        <p class="lead"> version: <strong><?php echo $data['version']; ?></strong></p>
        <p class="lead"> developed by: <strong><?php echo $data['devs']; ?></strong></p>

    </div>
    
</div>
<?php require APPROOT .'/views/inc/footer.php'; ?>