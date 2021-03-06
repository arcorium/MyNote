<?php
  session_start();
  require_once('../connection.php');
  // check session
  if(!isset($_SESSION["logged"]) || !$_SESSION["logged"]){
    header("location: ../login.php");
    exit;
  }

  $user_id = $_SESSION['user_id'];
  
  $query = "SELECT day.day, jadwal_pelajaran.waktu_mulai, jadwal_pelajaran.waktu_selesai, jadwal_pelajaran.nama_jadwal ,jadwal_pelajaran.jadwal_id
  FROM jadwal_pelajaran INNER JOIN day ON jadwal_pelajaran.day_id = day.day_id 
  WHERE jadwal_pelajaran.user_id = '$user_id'";

  $result = mysqli_query(connect(), $query);
  $data = mysqli_fetch_all($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyNote</title>
    <link rel="stylesheet" href="Schedule.css" />
    <link rel="Icon" href="asset/mynotelg.png" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-content">
      <a href="../dashboard/index.php">
        <div class="logo">

          <i class="bx bxl-medium-square"></i>
          <div class="logo_name">MyNote</div>

        </div>
        </a>
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
          <a href="../dashboard/index.php">
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
          <a href="">
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
        <!-- <li>
          <a href="#">
            <i class="bx bx-layer-plus"></i>
            <span class="link_name">Add Page</span>
          </a>
          <span class="tooltip">Add Page</span>
        </li> -->
        <br/>
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
          <a href="../logout.php">
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
        <!-- <section class="new-course">
          <div class="container">
            <div class="add-new-course">
              <div class="heading">
                <h1>Add New Course</h1>
              </div>
              <div class="input">
                <form action="#">
                  <div class="label">
                    <label for="course-name"><h4>Course Name</h4></label>
                  </div>
                  <div class="field">
                    <input type="text" placeholder="Enter Your Course Name" />
                  </div>
                  <div class="label">
                    <label for="day"><h4>Day</h4></label>
                  </div>
                  <div class="field dropdown">
                    <select name="day" id="day">
                      <option value="sun">SUN</option>
                      <option value="mon">MON</option>
                      <option value="tue">TUE</option>
                      <option value="wed">WED</option>
                      <option value="thr">THR</option>
                      <option value="fri">FRI</option>
                      <option value="sat">SAT</option>
                    </select>
                  </div>
                  <div class="label">
                    <label for="time"><h4>Time</h4></label>
                  </div>
                  <div class="field">
                    <span><label class="small" for="time">From</label></span>
                    <input type="text" placeholder="Ex. 12.00" />
                    <span><label class="small" for="time">To</label></span>
                    <span><input type="text" placeholder="Ex. 12.00" /></span>
                  </div>
                  <div class="submit">
                    <a href="#"><input type="button" value="Save" /></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section> -->

        <section class="course-schedule">
          <div class="container">
            <div class="schedule">
              <div class="heading">
                <h1>Subject Schedule</h1>
                <!-- <a class="add-btn" href="#"></i>Add Schedule</a> -->
              </div>
              <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET")
                {
                  if (isset($_GET['res']))
                  {
                    $result = $_GET['res'];
                    $style = 'color:orange';
                    $str = '';
                    switch ($result)
                    {
                      case 0:
                        $str = 'Subject Created';
                        $style = 'color:greenyellow';
                        break;
                      case 2:
                        $str = 'Subject Not Created, Subject already exist';
                        break;
                      case 3:
                        $str = 'Subject Not Created, There is time crash between another subject';
                        break;
                      case 4:
                        $str = 'Subject Not Created, Internal Error';
                        break;
                      case 5:
                        $str = 'Removed 1 Subject';
                        break;
                      case 6:
                        $str = 'Edited 1 Subject';
                        $style = 'color:greenyellow';
                        break;
                    }
                    echo "
                    <div class='label'>
                    <p style='$style'>$str</p>
                    </div>";
                  }
                }

                ?>
              <div class="table">
                <table>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Day</th>
                      <th>Time</th>
                      <th>Course Name</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $index = 0;
                    foreach ($data as $d)
                    {
                      $index += 1;
                      echo "<tr>";
                      echo "<td>$index</td>";
                      echo "<td>$d[0]</td>";
                      echo "<td>$d[1] - $d[2]</td>";
                      echo "<td>$d[3]</td>";

                      echo "<td><form action='edit_schedule.php' method='post'>
                      <a href='schedule_form.php?id=$d[4]'><i class='bx bxs-edit'></i></a>
                      </form>  </td>
                      
                      <td><form action='remove_schedule.php' method='post'>
                      <a href='remove_schedule.php?id=$d[4]'><i class='bx bx-trash'></i></a>
                      </form> </td>";

                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
                <a class="add-btn" href="schedule_form.php"></i>Add Schedule</a>
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
