<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="icon" href="../imgs/8th.png" type="image/icon type">
    <title>Semester Break</title>
</head>

<body>
    <div class="container">

        <header class="blog-header py-3">
            <h1 class="headingfont" align="center"><img class="mr-1 mb-2 " src="../imgs/8th.png" alt="college logo" width="45" height="45">MyCollege</h1>
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
                    <li class="nav-item active">
                        <a class="nav-link " href="Sembreak.php">Semester Break <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="ReportStatus.php">College Helpdesk</a>
                    </li>

                </ul>
                <ul class="navbar-nav mr-1">
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../imgs/profile.png" width="18" height="18">
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
            <h2>Accommodation during Semester Break</h2>
            <?php
            session_start();

            if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in'] == true) {
            ?>
                <a class="btn" id="appbtn" href="Application.php">
                    <h5><img class="mb-1" src="../imgs/plus.png" height="20" width="20">Make a new application</h5>
                </a>

                <h4>Application History</h4>
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Application Date</th>

                                <th>Duration</th>
                                <th>Stay From</th>
                                <th>To</th>
                                <th>Status</th>
                            </tr>
                        <tbody>
                            <script type="text/javascript">
                                var retrieve = localStorage.getItem("localapplication_arr");
                                var application = JSON.parse(retrieve);


                                /*Sample input*/
                                var selectedApp = localStorage.getItem("selectedApp");

                                if (selectedApp == null) {

                                    var application2 = [{
                                        PK: "12",
                                        Date: "2020-3-24",
                                        Reason: "College ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollegeCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollegeCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege ActivityCollege Activity",
                                        Duration: 10,
                                        From: "2020-07-06",
                                        To: "2020-07-16",
                                        Status: "Submitted"
                                    }, {
                                        PK: "10",
                                        Date: "2020-3-01",
                                        Reason: "College Activity",
                                        Duration: 3,
                                        From: "2020-07-02",
                                        To: "2020-07-05",
                                        Status: "Rejected"
                                    }, {
                                        PK: "7",
                                        Date: "2019-5-13",
                                        Reason: "College Activity",
                                        Duration: 3,
                                        From: "2019-07-02",
                                        To: "2019-07-05",
                                        Status: "Approved"
                                    }];
                                    if (application == null) {
                                        application = application2;
                                        localStorage.setItem("localapplication_arr", JSON.stringify(application));

                                    } else if (application.length == 1) {
                                        Array.prototype.push.apply(application, application2);
                                        localStorage.setItem("localapplication_arr", JSON.stringify(application));

                                    }

                                }






                                for (var i = 0; i <= application.length - 1; i++) {
                                    document.write("<tr>");
                                    document.write("<td>" + (i + 1) + "</td>");
                                    document.write("<td>" + application[i].Date + "</td>");

                                    document.write("<td>" + application[i].Duration + " Day(s)</td>");
                                    document.write("<td>" + application[i].From + "</td>");
                                    document.write("<td>" + application[i].To + "</td>");
                                    document.write("<td><a  class=' button' id='" + i + "' onclick='disp(" + i + ")' href='#popup1'>" +
                                        application[i].Status + "</a></td>");
                                    document.write("</tr>");
                                }
                            </script>

                        </tbody>
                        </thead>
                    </table>

                    <!-- pop out application details -->
                    <div id="popup1" class="overlay">

                        <div class="popup">
                            <h2>Application Details</h2>
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <br>
                                <p id="application_details">Application Date: <br>
                                    <p id="Date"></p>
                                </p>
                                <p id="application_details">Reason: <br><textarea class="w-100" style="border: none; resize: none;" id="Reason"></textarea></p>
                                <p id="application_details">Duration: <br>
                                    <p id="Duration"></p>
                                </p>
                                <p id="application_details">Stay From: <br>
                                    <p id="From"></p>
                                </p>
                                <p id="application_details">To: <br>
                                    <p id="To"></p>
                                </p>
                                <p id="application_details">Status: <br>
                                    <p id="Status"></p>
                                </p>
                                <a href='#popup2'>
                                    <p align="right" id="cancel"></p>
                                </a>
                                <a href="EditApplication.php">
                                    <p align="right" id="edit"></p>
                                </a>

                                <script type="text/javascript">
                                    var clicked;

                                    function disp(no) {
                                        clicked = no;
                                        localStorage.setItem("selectedApp", no);
                                        console.log(no);
                                        document.getElementById("Date").textContent = application[clicked].Date;
                                        document.getElementById("Reason").textContent = application[clicked].Reason;
                                        document.getElementById("Duration").textContent = application[clicked].Duration + " Day(s)";
                                        document.getElementById("From").textContent = application[clicked].From;
                                        document.getElementById("To").textContent = application[clicked].To;
                                        document.getElementById("Status").textContent = application[clicked].Status;
                                        var edit = document.querySelector("#edit");
                                        var cancel = document.querySelector("#cancel")
                                        if (application[clicked].Status == "Submitted") {
                                            edit.textContent = "Edit";
                                            cancel.textContent = "Cancel Application";
                                        } else {
                                            edit.textContent = "";
                                            cancel.textContent = "";
                                        }

                                    }
                                </script>

                            </div>

                        </div>

                    </div>



                    <!-- pop out cancel application confirmation -->
                    <div id="popup2" class="overlay">
                        <div class="popup" id="yesno">
                            <h2></h2>

                            <div class="content">
                                <br>
                                </p></a>
                                <p class="mb-5" align="center">Are you sure that you want to cancel this application?
                                </p>
                                <p align="right">
                                    <a class="btn no" id="no" href="#">No</a>&nbsp;&nbsp;
                                    <a class="btn" onclick="cancelapp()" id="yes">Yes</a></p>

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
        function cancelapp() {
            application.splice(clicked, 1);
            localStorage.setItem("localapplication_arr", JSON.stringify(application));
            window.location.href = "Sembreak.php";
        }
    </script>
</body>

</html>