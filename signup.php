<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet" />
    <title>Landing Page</title>
  </head>
  <body>
    <nav>
      <div class="main-container">
        <div class="navigation">
          <div class="navigation__logo">
            <h1 class="logo ungu">MyNote</h1>
          </div>
          <div class="navigation_reg-log">
            <ul class="registration">
              <a class="Log-In" href="login.php"><li>Log In</li></a>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <section class="introduction">
      <div class="main-container">
        <div class="content-signup">
          <h3 class="ungu">Sign Up</h3>
          <form action="process_signup.php" method="POST">
            <label for="username">Username</label><br />
            <input type="text" id="username" name="username" /><br /><br />
            <label for="password">Password</label><br />
            <input type="password" id="password" name="password" /><br /><br />
            <label for="password-cfm">Confirmation Password</label><br />
            <input type="password" id="password-cfm" name="password-cfm" /> <br /><br />
            <button>Sign Up</button>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>
