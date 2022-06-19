<?php
  session_start();
  require_once('../connection.php');
  // check session
  if(!isset($_SESSION["logged"]) || !$_SESSION["logged"]){
    header("location: ../login.php");
    exit;
  }

  // Query total task
  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM todolist WHERE `user_id`='$user_id'";
  $res = mysqli_query(connect(), $query);
  $row = mysqli_num_rows($res);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyNote</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="Icon" href="asset/mynotelg.png" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-content">
      <a href="index.php">
        <div class="logo">

          <i class="bx bxl-medium-square"></i>
          <div class="logo_name">MyNote</div>

        </div>
        </a>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <br />
      <ul class="nav">
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="link_name">Settings</span>
          </a>
          <span class="tooltip">Settings</span>
        </li>
        <br />
        <li>
          <a href="../schedule/">
            <i class="bx bxs-school"></i>
            <span class="link_name">Subject</span>
          </a>
          <span class="tooltip">Subject</span>
        </li>
        <li>
          <a href="../todolist/">
            <i class="bx bx-task"></i>
            <span class="link_name">Task</span>
          </a>
          <span class="tooltip">Task</span>
        </li>
        <li>
          <a href="../book/">
            <i class="bx bx-book-open"></i>
            <span class="link_name">Book List</span>
          </a>
          <span class="tooltip">Book List</span>
        </li>
        </br>
        </br>
        </br>
        <li>
          <a href="../logout.php">
            <!-- <i class="bx bx-book-open"></i> -->
            <center>
              <span class="link_name btn">logout</span>              
            </center>
          </a>
          <span class="tooltip">Book List</span>
        </li>
      </ul>
    </div>

    <div class="home_content">
      <div class="welcome">
        <!-- <ul>
                <li>
                    <img src="asset/waving.svg" alt="Hai">
                    <p>Welcome To MyNote!</p>
                </li>
            </ul> -->
        <p><img src="asset/waving.svg" alt="Waving Hand" />Welcome To MyNote!</p>
        <div class="sub-heading">
          <h3>Hello <?php echo $_SESSION['username']?>! Welcome back. Have a nice day</h3>
          <?php
            $diff = $_SESSION['last_login']->diff(new DateTime(date('Y-m-d h:i:s')));
            if ($diff->days > 0)
              echo "<h3>It has been ".$diff->days." days since your last login</h3>";
          ?>
        </div>
        <div class="task">
          <p>Your tasks remaining: <?php echo $row?></p>
        </div>
      </div>
    </div>

    <script>
      let btn = document.querySelector("#btn");
      let sidebar = document.querySelector(".sidebar");
      let srcBtn = document.querySelector(".bx-search");

      btn.onclick = function () {
        sidebar.classList.toggle("active");
      };
      srcBtn.onclick = function () {
        sidebar.classList.toggle("active");
      };
    </script>
  </body>
</html>
