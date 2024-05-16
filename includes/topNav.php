<?php
$parentDirectoryUrl = dirname($_SERVER['REQUEST_URI']);
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo $parentDirectoryUrl;?>">Crop Recommendation</a></li>
        <li><a href="seed-rate.php">Seeds Calculation</a></li>
      </ul>
    </div>
  </div>
</nav>