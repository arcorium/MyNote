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
  $query = "SELECT * FROM day";
  $day = mysqli_query(connect(), $query);

  $is_edit = false;

  if ($_SERVER["REQUEST_METHOD"] == "GET")
  {
    if (isset($_GET['id']))
    {
      $is_edit = true;
      $jadwal_id = $_GET['id'];

      $query = "SELECT jadwal_pelajaran.nama_jadwal, day.day_id, jadwal_pelajaran.waktu_mulai, jadwal_pelajaran.waktu_selesai, jadwal_pelajaran.jadwal_id
      FROM jadwal_pelajaran INNER JOIN day ON jadwal_pelajaran.day_id = day.day_id 
      WHERE jadwal_pelajaran.user_id = '$user_id' AND jadwal_pelajaran.jadwal_id = '$jadwal_id'";

      $result = mysqli_query(connect(), $query);
      $data = mysqli_fetch_array($result);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyNote</title>
    <link rel="stylesheet" href="schedule_form.css" />
    <link rel="Icon" href="asset/mynotelg.png" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-content">
        <div class="logo">
          <i class="bx bxl-medium-square"></i>
          <div class="logo_name">MyNote</div>
        </div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <!-- <div class="src">
        <i class="bx bx-search"></i>
        <input class="ph" type="text" placeholder="Search..." />
      </div> -->
      <br />

      <ul class="nav">
        <!-- <li>
          <a href="#">
            <i class="bx bx-news"></i>
            <span class="link_name">Updates</span>
          </a>
          <span class="tooltip">Updates</span>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="link_name">Settings</span>
          </a>
          <span class="tooltip">Settings</span>
        </li>
        <br />
        <li>
          <a href="#">
            <i class="bx bxs-log-in"></i>
            <span class="link_name">Getting Started</span>
          </a>
          <span class="tooltip">Getting Started</span>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-list-ul"></i>
            <span class="link_name">Feature</span>
          </a>
          <span class="tooltip">Feature</span>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bxs-school"></i>
            <span class="link_name">Subject</span>
          </a>
          <span class="tooltip">Subject</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-task"></i>
            <span class="link_name">Task</span>
          </a>
          <span class="tooltip">Task</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-book-open"></i>
            <span class="link_name">Book List</span>
          </a>
          <span class="tooltip">Book List</span>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-layer-plus"></i>
            <span class="link_name">Add Page</span>
          </a>
          <span class="tooltip">Add Page</span>
        </li> -->
        <br /><br><br><br><br><br><br><br><br><br>
        <!-- <li>
          <a href="#">
            <i class="bx bx-trash"></i>
            <span class="link_name">Trash</span>
          </a>
          <span class="tooltip">Trash</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-list-plus"></i>
            <span class="link_name">Icon List</span>
          </a>
          <span class="tooltip">Icon List</span>
        </li> -->
        <li>
          <a href="#">
            <i class='bx bx-power-off'></i>
            <span class="link_name">Log out</span>
          </a>
          <span class="tooltip">Log out</span>
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
        <section class="new-course">
          <div class="container">
            <div class="keterangan">
                <p>Schedule</p>
            </div>
            <div class="add-new-course">
              <div class="input">
                  <?php 
                  if ($is_edit)
                  {
                    echo "<form action='edit_schedule.php' method='POST'>";
                    echo "<input type='hidden' name='jadwal_id' value='$jadwal_id'/>";
                  }
                  else
                  {
                    echo "<form action='add_schedule.php' method='POST'>";
                  }
                  ?>
                  <div class="label">
                    <label for="course-name"><h4>Name</h4></label>
                  </div>
                  <div class="field">
                    <input type="text" placeholder="Name" name="subject" <?php if ($is_edit) echo "value='$data[0]'";?> required/>
                  </div>
                  <div class="label">
                    <label for="day"><h4>Day</h4></label>
                  </div>
                  <div class="field dropdown">
                    <select name="day" id="day" required>
                    <?php 
                      foreach ($day as $b)
                      {
                        $conf = '';
                        if ($is_edit && $data[1] == $b['day_id']) $conf = 'selected';

                        echo "<option value='".$b['day_id']."'$conf>" .$b['day']. "</option>";
                      }
                    ?>
                    </select>
                  </div>
                  <div class="label">
                    <label for="time"><h4>Time</h4></label>
                  </div>
                  <div class="field">
                    <span><label class="small" for="time">From</label></span>
                    <input type="time" placeholder="Ex. 12.00" name="time_start" <?php if ($is_edit) echo "value='$data[2]'";?> required/>
                    <span><label class="small" for="time">To</label></span>
                    <span><input type="time" placeholder="Ex. 12.00" name="time_end" <?php if ($is_edit) echo "value='$data[3]'";?> required/></span>
                  </div>
                  <div class="submit">
                    <button class="btn-up" type="submit"><?php if ($is_edit) echo 'Edit'; else echo 'Add';?></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
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
