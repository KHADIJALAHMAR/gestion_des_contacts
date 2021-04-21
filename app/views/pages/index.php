<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-flud">
<div class="container">
<h1 class="display-3"> <?php echo $data['title']; ?> </h1>
<p class="lead"><?php echo $data['description']; ?></p>
<p class="lead">If you're a newcomer join us down below, or if you already have an account Login to access your contacts.</p>
<div class="row">
            <div class="col">
            <a href="<?php echo URLROOT; ?>/users/signup" class="btn btn-success btn-block">don't have an account? sign up</a>
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
</div>
</div>

<?php require APPROOT .'/views/inc/footer.php'; ?>
