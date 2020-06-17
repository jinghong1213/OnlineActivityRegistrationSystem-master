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
            <h2>Report an Issue</h2>
            <?php
            session_start();

            if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in'] == true) {
            ?>

                <a class="btn" id="appbtn1" href="report.php">
                    <h5><img class="mb-1" src="../imgs/caution.png" height="20" width="20">Make a new report</h5>
                </a>

                <h4>Report History</h4>

                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Location</th>

                                <th>Issue title</th>
                                <th>Issue type</th>
                                
                                <th>Status</th>
                            </tr>
                        <tbody>
                            <script type="text/javascript">
                                var retrieve = localStorage.getItem("localreport_arr");
                                var report = JSON.parse(retrieve);


                                /*Sample input*/
                               
                                var selectedRep = localStorage.getItem("selectedRep");

                                if (selectedRep == null) {

                                    var re1 = [{
                                        
                                        Name: "Ahmad",
                                        Location: "Block B wing A",
                                        Title: "Unflushable toilet",
                                        Type: "Toilet issue",
                                        Description: "Unflushable and caused unwanted smell",
                                        Status: "Pending"
                                    }, {
                                        
                                        Name: "Lisa",
                                        Location: "Block E wing B",
                                        Title: "Strangers appear",
                                        Type: "Safety issue",
                                        Description: "Dark shadow appear these days outside the window of girls area",
                                        Status: "In Progress"
                                    }, {
                                       
                                        Name: "Sylvia",
                                        Location: "Block E wing A E109",
                                        Title: "Fan malfunction",
                                        Type: "Appliances issue",
                                        Description: "The fan is not working, please come to us ASAP",
                                        Status: "Completed"
                                    }];
                                    if (report == null) {
                                        report = re1;
                                        localStorage.setItem("localreport_arr", JSON.stringify(report));

                                    } else if (report.length == 1) {
                                        Array.prototype.push.apply(report, re1);
                                        localStorage.setItem("localreport_arr", JSON.stringify(report));

                                    }

                                }






                                for (var i = 0; i <= report.length - 1; i++) {
                                    document.write("<tr>");
                                    document.write("<td>" + (i + 1) + "</td>");
                                    document.write("<td>" + report[i].Name + "</td>");

                                    document.write("<td>" + report[i].Location + "</td>");
                                    document.write("<td>" + report[i].Title + "</td>");
                                    document.write("<td>" + report[i].Type + "</td>");
                                    document.write("<td><a  class=' button' id='" + i + "' onclick='disp(" + i + ")' href='#popup1'>" +
                                        report[i].Status + "</a></td>");
                                    document.write("</tr>");
                                }
                            </script>

                        </tbody>
                        </thead>
                    </table>

                    <!-- pop out report details -->
                    <div id="popup1" class="overlay">

                        <div class="popup">
                            <h2>Report Summary</h2>
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <br>
                                <p id="report_sum">Name: 
                                    <p id="name"></p>
                                </p>
                                
                                <p id="report_sum">Location: 
                                    <p id="location"></p>
                                </p>
                                <p id="report_sum">Title: 
                                    <p id="title"></p>
                                </p>
                                <p id="report_sum">Type:
                                    <p id="type"></p>
                                </p>
                                <p id="report_sum">Description: <textarea class="w-100" style="border: none; resize: none;" id="description"></textarea></p>
                                <p id="report_sum">Status:</p>
                                    <p id="Status"></p>
                                
                                    
                                        <p>
                                            <button class="btn btn-primary" id="edit" href="editReport.php">Edit</button>
                                            <a style="float:right" class="btn btn-primary" id="cancel" href="#popup2">Cancel</a></p>
                                 
                               

                                <script type="text/javascript">
                                    var clicked;

                                    function disp(no) {
                                        clicked = no;
                                        localStorage.setItem("selectedRep", no);
                                        console.log(no);
                                        document.getElementById("name").textContent = report[clicked].Name;
                                        document.getElementById("location").textContent = report[clicked].Location;
                                        document.getElementById("title").textContent = report[clicked].Title;
                                        document.getElementById("type").textContent = report[clicked].Type;
                                        document.getElementById("description").textContent = report[clicked].Description;
                                        document.getElementById("Status").textContent = report[clicked].Status;
                                        var edit = document.querySelector("#edit");
                                        var cancel = document.querySelector("#cancel")
                                        if (report[clicked].Status == "Pending") {
                                            edit.textContent = "Edit";
                                            cancel.textContent = "Cancel Report";
                                        } else {
                                            edit.textContent = "";
                                            cancel.textContent = "";
                                        }

                                    }
                                </script>

                            </div>

                        </div>

                    </div>



                    <!-- pop out cancel report confirmation -->
                    <div id="popup2" class="overlay">
                        <div class="popup" id="yesno">
                            <h2></h2>

                            <div class="content">
                                <br>
                                </p></a>
                                <p class="mb-5" align="center">Are you sure that you want to cancel this report?
                                </p>
                                <p align="right">
                                    <a class="btn no" id="no" href="#">No</a>&nbsp;&nbsp;
                                    <a class="btn" onclick="cancelrep()" id="yes">Yes</a></p>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
            } else { ?>
                <div class="alert alert-info" role="alert">
                    <h4>Sorry, only authenticated user can access this page.</h4>
                    <p><a href="../RegisterLogin/RegisterLogin.php">Log in</a> now.</p>
                </div><?php
                    }
                        ?>

            

        </main>

        <footer class="container text-center font-italic py-2">
            Copyright © 2020 - XXX Residential College.
        </footer>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        function cancelrep() {
            report.splice(clicked, 1);
            localStorage.setItem("localreport_arr", JSON.stringify(report));
            window.location.href = "reportStatus.php";
        }
    </script>
</body>

</html>