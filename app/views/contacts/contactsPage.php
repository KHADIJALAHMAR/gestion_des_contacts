<!-- header -->
<?php require APPROOT .'/views/inc/header.php';?>
<!-- end header -->

<h1 class="my-sm-5">Contacts</h1>

<!-- contact list -->
<h2 class="my-sm-4">Contacts list:</h2>
<?php
    if ($data) {
        foreach ($data as $value) {
?>
            <hr>
            <div class="row">
                <p class="col-lg-1 font-weight-bold"><?php echo $value->contact_name; ?></p>
                <p class="col-lg-2"><?php echo "+212" . $value->contact_phone; ?></p>
                <p class="col-lg-2"><?php echo $value->conatct_email; ?></p>
                <p class="col-lg-6"><?php echo $value->contact_adress; ?></p>
                <div class="col-lg-1 d-flex flex-column">
                    <a href="#">Update</a>
                    <a href="#">Delete</a>
                </div>
            </div>
<?php
        }
    }else{
        echo "<p>No contacts.</p>";
    }
?>
<!-- end contact list -->

<!-- contact form -->
<h2 class="my-sm-4">Add contact:</h2>
<form class="contactform" action="#" method="post">
    <div class="row" >
        <div class="form-group col">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control <?php echo (!empty($insdata['name_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter name" id="name">
            <span class="invalid-feedback"><?php echo $insdata['name_err']; ?></span>
        </div>
        <div class="form-group col">
            <label for="phone">Phone</label>
            <input type="number" name="phone" class="form-control <?php echo (!empty($insdata['phone_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter phone" id="phone">
            <span class="invalid-feedback"><?php echo $insdata['phone_err']; ?></span>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control <?php echo (!empty($insdata['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter email" id="email">
        <span class="invalid-feedback"><?php echo $insdata['email_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="adress">Adress</label>
        <textarea class="form-control min-height <?php echo (!empty($insdata['adress_err'])) ? 'is-invalid' : ''; ?>" name="adress" placeholder="Enter adress" id="adress"></textarea>
        <span class="invalid-feedback"><?php echo $insdata['adress_err']; ?></span>
    </div>
    <button type="submit" name="save" class="btn btn-primary">Save</button>
</form>
<!-- end contact form -->

<!-- footer -->
<?php require APPROOT .'/views/inc/footer.php'; ?>
<!-- end footer -->