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
            <img class="logo" src="LOGO_UPNVJATIM.png">
            <ul>
                <li><a class="btn-2" href="signup.php">Sign up</a></li>
            </ul>
        </nav>
    </section>
    <div class="form">
        <form class="form-sz" action="process_login.php" method="POST">
            <p>Login</p>
            <label>Username</label>
            <input type="text" placeholder="" id="username" name="username">

            <label>Password</label>
            <input type="text" placeholder="" id="password" name="password">
            
            <div class="tombol">
                <button class="btn-3" type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>