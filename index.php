<?php include ('components/header.php'); 
      require_once 'process/stat_functions.php';
      require_once 'process/functions.php';
      addViews(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<link rel='stylesheet' href='../css/card.css'>
<div class='container'>
      <div class="grid_container">
        <?php getAllData(); ?>
      </div>
</div>

<script type="text/javascript">
      var screenW = screen.width;
      var screenH = screen.height;
      var envi = navigator.userAgent;

      $.ajax({
            type: "POST",
            url: 'process/env_process.php',
            data: {screenW: screenW, screenH: screenH, envi: envi},

            success: function(response) {

                  var data = JSON.parse(response);

                  if (data.success == 1) {
                        alert("Data has been captured");
                  } else {
                        alert("Data failed to capture.");
                  }
            }
     
      })

</script>

<?php include ('components/footer.php'); ?>