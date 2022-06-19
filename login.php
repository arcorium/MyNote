<?php
  session_start();
  // check session
  if(isset($_SESSION["logged"]) && $_SESSION["logged"]){
    header("location: dashboard/index.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>MyNote</title>
</head>
<body>
        <nav>
            <a href="index.php">
                <img class="logo" src="asset/mynotelg.png">
            </a>
            <ul>
                <li><a class="btn-2" href="signup.php">Sign up</a></li>
            </ul>
        </nav>
    </section>
    <div class="form">
        <form class="form-sz" action="process_login.php" method="POST">
            <p>Login</p>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    if(isset($_GET['res'])) {
                        $result = $_GET['res'];

                        switch($result)
                        {
                            case 1:
                                echo "<p>Username or Password does not match</p>";
                                break;
                            case 2:
                                echo "<p>Account created successfully</p>";
                                break;
                        }
                    }
                }
            ?>
            <label>Username or E-mail</label>
            <input type="text" placeholder="" id="username" name="username" required>

            <label>Password</label>
            <input type="password" placeholder="" id="password" name="password" required>
            
            <div class="tombol">
                <button class="btn-3" type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>