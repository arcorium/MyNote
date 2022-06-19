<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyNote</title>
    <link rel="stylesheet" href="form.css">
    <link rel="Icon" href="asset/mynotelg.png" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <i class='bx bxl-medium-square'></i>
                <div class="logo_name">MyNote</div>
            </div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <div class="src">
            <i class='bx bx-search' ></i>
            <input class="ph" type="text" placeholder="Search...">
        </div><br>

        <ul class="nav">
            <li>
                <a href="#">
                    <i class='bx bx-news'></i>
                    <span class="link_name">Updates</span>
                </a>
                <span class="tooltip">Updates</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li><br>
            <li>
                <a href="#">
                    <i class='bx bxs-log-in'></i>
                    <span class="link_name">Getting Started</span>
                </a>
                <span class="tooltip">Getting Started</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-list-ul'></i>
                    <span class="link_name">Feature</span>
                </a>
                <span class="tooltip">Feature</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-school'></i>
                    <span class="link_name">Course</span>
                </a>
                <span class="tooltip">Course</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-task'></i>
                    <span class="link_name">Task</span>
                </a>
                <span class="tooltip">Task</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-book-open'></i>
                    <span class="link_name">Book List</span>
                </a>
                <span class="tooltip">Book List</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-layer-plus'></i>
                    <span class="link_name">Add Page</span>
                </a>
                <span class="tooltip">Add Page</span>
            </li><br>
            <li>
                <a href="#">
                    <i class='bx bx-trash'></i>
                    <span class="link_name">Trash</span>
                </a>
                <span class="tooltip">Trash</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-list-plus'></i>
                    <span class="link_name">Icon List</span>
                </a>
                <span class="tooltip">Icon List</span>
            </li>
        </ul>
    </div>

    <div class="home_content">
        <div class="text">
            <div class="keterangan">
                <p>Tambah Buku</p>
            </div>
            <div class="form">
                <form class="form-sz" action="#" method="#">
                        <label>Book Name</label><br>
                        <input type="text" placeholder="Input your book name..." name="#"><br><br>
                    <div class="file-input">
                        <label>Drop your file</label><br>
                        <input type="file" name="#"><br><br>
                    </div>
                    <div class="tombol">
                        <button class="btn-up" type="submit">Save</button>
                        <a class="btn-up" href="#">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let btn = document.querySelector('#btn');
        let sidebar= document.querySelector('.sidebar');
        let srcBtn = document.querySelector('.bx-search');

        btn.onclick = function(){
            sidebar.classList.toggle('active');
        }
        srcBtn.onclick = function(){
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>