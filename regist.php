<?php
require "php/config.php";
require "admin/template/header.php";

?>


<div class="row">

  <div class="row_header">

    <br><br><br>
  </div>

  <div class="col-sm-12">
    <div class="col-sm-2">
  </div>
  <div class="col-sm-8" style="text-align:center;">

		<?php

			if (isset($_SESSION['status']) && $_SESSION['status'] == "Admin") {
						require "registracija.php";
				}

				else{
					echo 'Niste registrovani kao admin, ne možete kreirati novog korisnika!';
				}
		?>

</div>
<div class="col-sm-2">
</div>
</div>
</div>


<br><br>


<?php require "admin/template/footer.php"; ?>
