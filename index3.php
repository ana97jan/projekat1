<?php
require "php/config.php";
require "admin/template/header.php";

?>


<div id="container">

  <div class="container_header">
          <br>
    <h1 ;>Admin panel</h1>
    <br>
    </div>
  <div class="col-sm-10">
	
            <div class="col-sm-5">

    <img src="img/admin.png" width="400">
    <br>
          </div>
		  <div class="col-sm-5" style="padding-bottom:330px">

            <h2> Dobro došli, <?php echo $_SESSION['username'] ?>, izaberite neku od opcija za ažuriranje sadržaja sajta! </h2>

        </div>
            

  </div>



</div>



<?php

require "admin/template/footer.php"; ?>
