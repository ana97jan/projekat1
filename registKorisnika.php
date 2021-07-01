<?php
require "php/config.php";
require "korisnik/template/header.php";

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
						require "registracijaKorisnika.php";
				
		?>

</div>
<div class="col-sm-2">
</div>
</div>
</div>


<br><br>


<?php require "admin/template/footer.php"; ?>
