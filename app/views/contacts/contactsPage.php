<?php require APPROOT .'/views/inc/header.php';?>

<h1>Contacts</h1>
<h2>Contacts list:</h2>
<?php
    if ($data) {
        foreach ($data as $value) {
            echo $value->contact_name ." +212". $value->contact_phone;
            echo "<br>";
        }
    }
?>
<?php require APPROOT .'/views/inc/footer.php'; ?>