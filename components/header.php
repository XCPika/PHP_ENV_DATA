<?php 
function logoutForm() {
    echo '
    <section class="nav">
        <form style="height:100%;" action="../components/statistics.php">
            <button class="nav-item" type="submit">Statistics</button>
        </form>
    </section>
    <section class="nav">
        <form style="height:100%;" action="../components/insert_form.php">
            <button class="nav-item" type="submit">Edit Data</button>
        </form>
    </section>
    <section class="nav">
        <form style="height:100%;" action="../process/logout.php">
            <button class="nav-item" type="submit">Logout</button>
        </form>
    </section>';
};

function loginForm() {
    echo '
    <section class="nav">
        <form style="height:100%;" action="../components/login.php">
            <button class="nav-item" type="submit">Login</button>
        </form>
    </section>';
};
 ?>

<!DOCTYPE html>
    <html lang='en'>
        <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link rel='stylesheet' href='../css/reset.css'>
        <link rel='stylesheet' href='../css/shared.css'>
        <link rel='stylesheet' href='../css/header.css'>
        <link rel='stylesheet' href='../css/footer.css'>
        <script src="https://kit.fontawesome.com/1e89b10526.js" crossorigin="anonymous"></script>
        <title> PHP CMS</title>
        </head>
        <body>
        <div class="container">
        <section class="bg">
            <section class="bg-cover">
                <section class="header">
                    <section class="header-l">
                        <img class='icon' src='../img/logo.png'></img>
                        <h1 class='title'><a class='a-reset' href='../index.php'>Portfolio Game Register</a></h1>
                    </section>
                    <section class="header-r">
                        <?php 
                        session_start();
                        if (isset($_SESSION['logged-in'])) { 
                            if ($_SESSION['logged-in']==='logged') {
                               logoutForm();
                            }else {
                                loginForm();
                            }
                        }else {
                            loginForm();
                        }
                        ?>
                    </section>
                </section>
            </section>
        </section>
        <div class='section-seperator'></div>

       