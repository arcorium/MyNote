<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="Icon" href="asset/mynotelg.png">
    <title>MyNote</title>
</head>
<body>
        <nav>
            <a href="index.php">
                <img class="logo" src="asset/mynotelg.png">
            </a>
            <ul>
                <li><a class="btn-2" href="login.php">Log in</a></li>
            </ul>
        </nav>
    </section>
    <div class="form">
        <form class="form-sz" action="process_signup.php" method="POST">
            <p>Sign Up</p>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    if(isset($_GET['res'])) {
                        $result = $_GET['res'];

                        switch($result)
                        {
                            case 2:
                                echo "<p>User already exist</p>";
                                break;
                            case 3:
                                echo "<p>Password does not match</p>";
                                break;
                            case 4:
                                echo "<p>Internal : Failed to insert user</p>";
                                break;
                        }
                    }
                }
            ?>
            <label>E mail</label>
            <input type="email" placeholder="E-Mail" name="email" id="email" required>

            <label>Username</label>
            <input type="text" placeholder="Username" name="username" id="username" required> <br>

            <label>Password</label>
            <input class="form-pass" type="password" placeholder="Password" name="password" required>
            
            <label>Confirm password</label>
            <input class="form-pass" type="password" placeholder="Confirm password" name="password-cfm" required>

            <div class="tombol">
                <a href="#"><button class="btn-3" type="#">Sign Up</button></a>
            </div>
        </form>
    </div>
</body>
</html>