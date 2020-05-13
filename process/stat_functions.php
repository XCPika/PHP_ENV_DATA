<?php require_once 'connections.php';

function showGameViews(){
    $conn = connect("game_data");
    $result = mysqli_query($conn, "SELECT * FROM games");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $id = getViews($row['id']);
            echo '<p class="p right pad">'.$row['title'].' :</p>
                  <p class="p left pad">'.$id.'</p>';
        }
    }
  
}

function getViews(int $ID) {
    $conn = connect("statistics");
    $result = mysqli_query($conn, "SELECT * FROM views WHERE id=$ID");
    $row = mysqli_fetch_array($result);
    if (isset($row['count'])) {
        return $row['count'];
    } else {
        return 0;
    }
}

function checkRows(int $ID) {
    $conn = connect("statistics");
    $result = mysqli_query($conn, "SELECT * FROM views WHERE id=$ID");
    $row = mysqli_fetch_array($result);
    if (isset($row['count'])) {
        $update_query = "UPDATE views SET count=count+1 WHERE id=$ID";
        mysqli_query($conn, $update_query);
        return;
    }
    $update_query = "INSERT INTO `views` (`id`, `count`) VALUES ($ID, '1');";
    mysqli_query($conn, $update_query);
    mysqli_close($conn);
};

function captureEnv(string $res, string $envi) {
    $conn = connect("statistics");
    $insert = "INSERT INTO environment (screen_res, environment) VALUES ('$res', '$envi')";
    mysqli_query($conn, $insert);
}

function addViews() {
    $conn = connect("statistics");
    $check_query = "SELECT * FROM views";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        $ID = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 0;
        checkRows((int)$ID);
    } else {
        $create = "CREATE TABLE views (
            id int,
            count int
        )";
        mysqli_query($conn, $create);
        checkRows((isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 0);
    };
}



?>