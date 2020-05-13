  <?php
  require_once '../process/stat_functions.php';
  require_once '../process/functions.php';
  include ('header.php');
$row = update_get();
$creation = creation_get();
addViews();
?>
  <link rel='stylesheet' href='../css/single.css'>
  <div class="content">
      <h3 class='text'><?php echo $row['title']; ?>.</h3>
      <div class="seperator"></div>
      <div class="single-container">
          <img class="single-img" src=<?php echo "../img/game_logo/".$row['image']; ?>></img>
          <div>
              <h4 class='single-head' style="font-size:1.2rem;">Description</h4>
              <p class="single-desc"><?php echo htmlspecialchars_decode($row['descr']);?></p>
              <div class="single-grid">
                  <h4 class='single-head' style="font-size:1.2rem;">Platforms:</h4>
                  <p class="single-desc"><?php echo htmlspecialchars_decode($row['platform']);?></p>
                  <small class="single-text-dark"><a class="a-reset" href=<?php echo "//".$row['link'];?>>Get the
                          Game</a></small>
              </div>
          </div>
      </div>
      <h3 class='text'>Creation</h3>
      <div class="seperator"></div>
      <div class='text-box'>
          <div class='seperator-v'></div>
          <p class="text s center"><?php echo $creation['small-1']; ?></p>
          <div class='seperator-h'></div>
          <p class="text s"><?php echo $creation['text-1']; ?></p>
      </div>


      <div class='text-box'>

          <p class="text s"><?php echo $creation['text-2']; ?></p>
          <div class='seperator-h'></div>
          <p class="text s center"><?php echo $creation['small-2']; ?></p>
          <div class='seperator-v'></div>
      </div>
  </div>

  <?php
include ('footer.php');
?>