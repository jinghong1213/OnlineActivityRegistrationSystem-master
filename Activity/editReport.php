<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
      
    <link rel="stylesheet" href="../css/style.css" />
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
      
    <link rel="icon" href="../imgs/8th.png" type="image/icon type" />
    <title>Report</title>
</head>

<body>
    <div class="container">

        <header class="blog-header py-3">
            <h1 class="headingfont" align="center"><img class="mr-1 mb-2 " src="../imgs/8th.png" alt="college logo"
                    width="45" height="45">MyCollege</h1>
        </header>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item ">
                        <a class="nav-link" href="Activity.php">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Sembreak.php">Semester Break</a>
                    </li>

                    <li class="nav-item active">
                    <a class="nav-link" href="reportStatus.php">College Helpdesk</a>
                    </li>

                </ul>
                <ul class="navbar-nav mr-1">
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../imgs/profile.png" width="18" height="18">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Profile/profile.php">My Profile</a>
                            <a class="dropdown-item" href="../RegisterLogin/Logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <main class="jumbotron mt-2">
            <h2>Edit Report</h2>
            <?php
            session_start();

            if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in'] == true) {
            ?>
                <form method="post" class="jumbotron mt-3" >
                    <div class="form-group w-25">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Eg: Corona " required />
                    </div>
    
                    <div class="form-group w-25">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" id="location" placeholder="Eg: Block B Wing A "required />
                    </div>
    
                    <div class="form-group w-25">
                        <label for="title">Issue title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Eg: Dirty toilet "required />
                    </div>
    
    
                    <div class="form-group w-25">
                        <label for="type">Issue type:</label>
                        <select id="type" class="form-control">
                            <option value="Safety issues">Safety issues</option>
                            <option value="Appliances issues">Appliances issues</option>
                            <option value="Toilet issues">Toilet issues</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group w-50">
                        <label for="description">Description:</label>
                        <textarea cols="70" class="form-control" rows="10" id="description" required></textarea>
                    </div>
                  
    
                    <div>
                        <br>
                        <p>
                            <button class="btn btn-primary" id="savechanges">Save Changes</button>
                            <a class="btn btn-primary" id="cancel" href="#popup2">Cancel</a></p>
                    </div>
                </form>

    <script type="text/javascript">
      var retrieve = localStorage.getItem("localreport_arr");
                    var report = JSON.parse(retrieve);
                    /*receive the key selected from previous page*/
                    var selectedRep = localStorage.getItem("selectedRep");

                    console.log(report[selectedRep].Name);
                    document.getElementById("name").value = report[selectedRep].Name;
                    document.getElementById("location").value = report[selectedRep].Location;
                    document.getElementById("title").value = report[selectedRep].Title;

                    document.getElementById("type").value = report[selectedRep].Type;
                    document.getElementById("description").value = report[selectedRep].Description;

                    var form = document.querySelector("form");
                    form.onsubmit = function(e) {
                        e.preventDefault();
                        report[selectedRep].Name = document.getElementById("name").value;
                        report[selectedRep].Location = document.getElementById("location").value;
                        report[selectedRep].Title = document.getElementById("title").value;
                        report[selectedRep].Type = document.getElementById("type").value;
                        report[selectedRep].Description = document.getElementById("description").value;
                        var Name1 = document.getElementById("name").value;
                        var Location1 = document.getElementById("location").value;
                        var Title1 = document.getElementById("title").value;
                        var Type1 = document.getElementById("type").value;
                        var Descrip1 = document.getElementById("description").value;  


                            localStorage.setItem("localreport_arr", JSON.stringify(report));
                            window.location.href = 'reportStatus.php';
                        
                    }
  </script>

<?php
            } else { ?>
                <div class="alert alert-info" role="alert">
                    <h4>Sorry, only authenticated user can access this page.</h4>
                    <p><a href="../RegisterLogin/RegisterLogin.php">Log in</a> now.</p>
                </div><?php
                    }
                        ?>
</main>


 <!-- pop out cancel edit confirmation -->
 <div id="popup2" class="overlay">
            <div class="popup" id="yesno">
                <h2></h2>

                <div class="content">
                    <br>
                    </p></a>
                    <p class="mb-5" align="center">Discard all changes?
                    </p>
                    <p align="right">
                        <a class="btn no" id="no" href="#">No</a>&nbsp;&nbsp;
                        <a class="btn" href="reportStatus.php" id="yes">Yes</a></p>
                </div>
            </div>
        </div>
    </div>

<footer class="container text-center font-italic py-2">
Copyright © 2020 - XXX Residential College.
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                    crossorigin="anonymous"></script>

                

</body>

</html>