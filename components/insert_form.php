<?php include ('header.php');
    require_once '../process/functions.php'; 
      
    if (session_status() == 2)  checkSession();
    else {
        session_start();
        checkSession();
    }; 
?>

<link rel='stylesheet' href='../css/form.css'>
<div class="content">
    <h3 class='text'>Register a new game.</h3>
    <div class="seperator"></div>
    <section id="insert">
    <div class="form-content">
        <div class='form-container form-light'>
            <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post'>
                <div class='form-group'>
                    <label for='title' class='label black'>Title</label>
                    <input type='text' name='title' class='input input-dark' id='title' placeholder='Title'></input>
                    <small class='small dg s'>Make sure each title is different!</small>
                </div>
                <div class='form-together'>
                    <div class='form-group' style='margin-top:0;'>
                        <label for='image' class='label black'>Image Name</label>
                        <input type='text' name='image' class='input input-dark' id='image'
                            placeholder='test_image.png'></input>

                    </div>
                    <div></div>
                    <div class='form-group' style='margin-top:0;'>
                        <label for='link' class='label black'>Link to the Game</label>
                        <input type='text' name='link' class='input input-dark' id='link'
                            placeholder='Link to the game'></input>
                    </div>

                </div>
                <small class='small dg s'>Images must be added manually, this just to reference the
                    image!</small>
                <div class='form-group'>
                    <label for='platform' class='label black'>Platforms</label>
                    <input type='text' name='platform' class='input input-dark' id='platform'
                        placeholder='Switch, PS4, PC...'></input>
                </div>
                <div class='form-group'>
                    <label for='descr' class='label black'>Description</label>
                    <textarea name='descr' class='input input-dark' id='descr' rows='4' cols='50'
                        placeholder='Please write a description'></textarea>
                </div>
                <button type='submit' class='btn'>Submit</button>
            </form>

        </div>
        <?php getEditData(); ?>
    </div>
    </section>

</div>
<?php 
    include ('footer.php'); 
?>