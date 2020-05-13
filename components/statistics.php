  <?php
  require_once '../process/stat_functions.php';
  require_once '../process/functions.php';
  include ('header.php');
?>
  <link rel='stylesheet' href='../css/grid.css'>
  <link rel='stylesheet' href='../css/text.css'>
  <div class="content">
      <h3 class='text'>Statistics</h3>
      <div class="seperator"></div>
      <div class="grid col-2 center pad">
      <p class='p right pad' style="margin-bottom:1%">Index :</p>
      <p class='p left pad'><?php echo getViews(0)?></p>
      <p class='p pad T uline' style="margin-bottom:1%">Games</p>
      <?php showGameViews() ?>
      </div>
  </div>

  <?php
include ('footer.php');
?>