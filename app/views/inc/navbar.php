
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <!-- home and about list -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; echo (isset($_SESSION['"username"'])) ? '/contacts/addShowContacts' : '';?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT;?>/pages/about">About us</a>
          
        </ul>
        <!-- profile and logout list -->
        <ul class="navbar-nav ml-auto <?php echo (isset($_SESSION['"username"'])) ? 'd-flex' : 'd-none'; ?>">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT;?>"><?php echo $_SESSION['"username"']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT;?>/users/logout">Logout</a>
          
        </ul>
        
        
        
      </div>
    </nav> 