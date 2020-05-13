<?php require_once 'connections.php';
$conn = connect("game_data");

function checkSession() {
    if (isset($_SESSION['logged-in'])) { 
        if ($_SESSION['logged-in']!=='logged') header ("Location: http://127.0.0.1/components/login.php");
    } else { header ("Location: http://127.0.0.1/components/login.php"); }
};

function getAllData(){
    $conn = connect("game_data");
    $result = mysqli_query($conn, "SELECT * FROM games");
    if (mysqli_num_rows($result) > 0) {
        echo "<h3 class='text'>All Games</h3>
            <div class='seperator'></div>
            <div class=card-container>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo'
                <div class="card">
                    <h4 class="card-title"><a class="a-reset" href="single.php?id='.$row['id'].'">'.$row['title'].'</a></h3>
                    <div class="card-seperator"></div>
                    
                    <div class="card-sep1"></div>
                    <img class="card-img" src="../img/game_logo/'.$row['image'].'">
                    <div class="btn-area">
                    <h5 class="card-title" style="font-size:1rem;">Description:</h5>
                    <p class="card-desc">'.generatePreviewDesc($row, 'descr', 100).'</p>
                    <small class="card-text-dark"><a class="a-reset" href="//'.$row['link'].'">Get the Game</a></small>
                    <div class="btn-group">
                    
                        <a href="/components/single.php?id='.$row['id'].'" class="btn-d left" role="button" aria-pressed="true">View</a>
                        <a href="/components/update.php?id='.$row['id'].'" class="btn-d right" role="button" aria-pressed="true">Edit</a>
                    </div>
                    </div>
                </div>
            ';
        };
        echo '</div>';
    } else "<h3>Out Database is not working</h3>";
};

function getEditData() {
    $conn = connect("game_data");
    $get_data = mysqli_query($conn, "SELECT * FROM games");
    if (mysqli_num_rows($get_data) > 0) {
        echo '<div class="edit-container grided">
               <h3 class="label black titled">Edit Data</h2>
                ';
        while ($row = mysqli_fetch_assoc($get_data)) {
            echo '
            <p class="black">' .$row['title'].'</p>
            <div class="selectors">
            <a class="center" href="../components/update.php?id='.$row['id'].'">Edit</a>
            <p class="center black"> | </p>
            <a class="center" href="../process/delete.php?id='.$row['id'].'">Remove</a>
            </div>';
        } echo '</div>';
    } else echo '<h4>There are currently no games</h4>';
};

function update_get(){
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $conn = connect("game_data");
        $id = $_GET['id'];
        $get_id = mysqli_query($conn, "SELECT * FROM games WHERE id='$id'");
        if (mysqli_num_rows($get_id)===1) {
            return(mysqli_fetch_assoc($get_id));
        }
    }
};

function creation_get(){
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $conn = connect("game_data");
        $id = $_GET['id'];
        $get_id = mysqli_query($conn, "SELECT * FROM creation WHERE id='$id'");
        if (mysqli_num_rows($get_id)===1) {
            return(mysqli_fetch_assoc($get_id));
        } else {
            $test['small-1'] = "This game has no creation data";
            $test['small-2'] = "Consult an admin and they will rectify this issue.";
            $test['text-1'] = "This data must be entered manually";
            $test['text-2'] = "I have not got round to the creation data insert form but I fully plan on doing so";
            return $test;
        }
    }
};

function delete() {
    $conn = connect("game_data");
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $gameID = $_GET['id'];
        $delete_query = mysqli_query($conn, "DELETE FROM games WHERE id='$gameID'");
        if ($delete_query) {
            echo "<script>alert('Data deleted');window.location.href = '../index.php';</script>";
            exit;
        } else {
            echo "<script>alert('There was a problem deleting this data');window.location.href = '../components/insert_form.php';</script>";
            exit;
        }
    }
};

function generatePreviewDesc($row, string $get, int $size) {
    return htmlspecialchars_decode(substr($row[$get],0, $size)). '...';
};

if(isset($_POST['update_title']) && isset($_POST['update_descr']) && isset($_POST['update_image']) && isset($_POST['update_platform']) && isset($_POST['update_link'])){
    if(!empty($_POST['update_title']) && !empty($_POST['update_descr']) && !empty($_POST['update_image']) && !empty($_POST['update_platform']) && !empty($_POST['update_link'])){
        $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_title']));
        $descr = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_descr']));  
        $image = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_image']));  
        $platform = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_platform']));  
        $link = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_link']));  
        $id = $_GET['id'];
        $update_query = mysqli_query($conn, "UPDATE games SET title='$title', descr='$descr', image='$image', platform='$platform', link='$link' WHERE id=$id");
        if ($update_query) {
            echo "<script>alert('Data updated');window.location.href = '../index.php';</script>";
                exit;
        } else {
            echo "<script>alert('Data was not updated!');window.location.href = '../index/php';</script>";
            exit;
        }
    } else {
        echo '<script>alert("Please fill all fields");window.location.href = "'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'";</script>';
        exit;
    }
};

if(isset($_POST['title']) && isset($_POST['descr']) && isset($_POST['image']) && isset($_POST['platform']) && isset($_POST['link'])){
    if(!empty($_POST['title']) && !empty($_POST['descr']) && !empty($_POST['image']) && !empty($_POST['platform']) && !empty($_POST['link'])){
        $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
        $descr = mysqli_real_escape_string($conn, htmlspecialchars($_POST['descr']));  
        $image = mysqli_real_escape_string($conn, htmlspecialchars($_POST['image']));  
        $platform = mysqli_real_escape_string($conn, htmlspecialchars($_POST['platform']));  
        $link = mysqli_real_escape_string($conn, htmlspecialchars($_POST['link']));  
        $check_title = mysqli_query($conn, "SELECT 'title' from games WHERE content = '$title'");
        if (mysqli_num_rows($check_title) > 0) {
            echo '<div style="width:50vw;height:50vh;><h4>This game has already been stored</h4></div>';
        } else {
            $insert_query = mysqli_query($conn, "INSERT INTO games (title, descr, image, platform, link) VALUES('$title', '$descr', '$image', '$platform', '$link')");
            if ($insert_query) {
                echo "<script>alert('Data inserted');window.location.href = '../index.php';</script>";
                exit;
            } else {
                echo "<script>alert('Data was not inserted!');window.location.href = '../components/insert_form.php';</script>";
                exit;
            };
        };
    } else {
        echo '<script>alert("Please fill all fields");window.location.href = "../components/insert_form.php";</script>';
        exit;
    }
};

?>