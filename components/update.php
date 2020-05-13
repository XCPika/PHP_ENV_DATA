<?php
require_once '../process/functions.php';
include 'header.php';

if (session_status() == 2)  checkSession();
else {
    session_start();
    checkSession();
}

$row = update_get();
?>
<link rel='stylesheet' href='../css/update.css'>
<link rel='stylesheet' href='../css/form.css'>
<div class="content">
    <h3 class='text'>Update the Details of this Game.</h3>
    <div class="seperator"></div>
    <div class="form-content">
        <div class='form-container form-light'>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $row['id'];?>" method='post'>
                <div class='form-group'>
                    <label for='update_title' class='label black'>Title</label>
                    <input type='text' value="<?php echo $row['title'];?>" name='update_title' class='input input-dark' id='update_title'></input>
                    <small class='small dg s'>Make sure each title is different!</small>
                </div>
                <div class='form-together'>
                    <div class='form-group' style='margin-top:0;'>
                        <label for='update_image' class='label black'>Image Name</label>
                        <input type='text' name='update_image' class='input input-dark' id='update_image' value="<?php echo $row['image'];?>"></input>
                        
                    </div>
                    <div></div>
                    <div class='form-group' style='margin-top:0;'>
                        <label for='update_link' class='label black'>Link to the Game</label>
                        <input type='text' name='update_link' class='input input-dark' id='update_link' value="<?php echo $row['link'];?>"></input>
                    </div>
                </div>
                <small class='small dg s'>Images must be added manually, this just to reference the
                            image!</small>
                <div class='form-group'>
                    <label for='update_platform' class='label black'>Platforms</label>
                    <input type='text' name='update_platform' class='input input-dark' id='update_platform' value="<?php echo $row['platform'];?>"></input>
                </div>
                <div class='form-group'>
                    <label for='update_descr' class='label black'>Description</label>
                    <textarea name='update_descr' class='input input-dark' id='update_descr' rows='4' cols='50'><?php echo $row['descr'];?></textarea>
                </div>
                <button type='submit' class='btn'>Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>