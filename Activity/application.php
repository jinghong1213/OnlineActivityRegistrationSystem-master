<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />

  <link rel="stylesheet" href="../css/style.css" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

  <link rel="icon" href="../imgs/8th.png" type="image/icon type" />
  <title>Application</title>
</head>

<body>
  <div class="container">
    <header class="blog-header py-3">
      <h1 class="headingfont" align="center">
        <img class="mr-1 mb-2" src="../imgs/8th.png" alt="college logo" width="45" height="45" />MyCollege
      </h1>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Activity.php">Activity</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Sembreak.php">Semester Break <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
          <a class="nav-link" href="ReportStatus.php">College Helpdesk</a>
          </li>
        </ul>
        <ul class="navbar-nav mr-1">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../imgs/profile.png" width="18" height="18" />
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
      <h2>Application to Stay during Semester Break</h2>
      <?php
      session_start();

      if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in'] == true) {
      ?>
        <form method="post" class="jumbotron mt-3" <div class="form-group w-25">
          <label for="Staying From">Staying From:</label>
          <input type="date" class="form-control" id="From" required />
  </div>

  <div class="form-group w-25">
    <label for="To">To:</label>
    <input type="date" class="form-control" id="To" required />
  </div>
  <div class="form-group w-50">
    <label for="Reason">Reason:</label>
    <textarea class="form-control" rows="4" id="Reason" type="text" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary" id="submit">
    Submit
  </button>
  </form>

  <script type="text/javascript">
    var form = document.querySelector("form");
    form.onsubmit = function(e) {
      e.preventDefault();
      var retrieve = localStorage.getItem("localapplication_arr");
      var Fromdate = document.getElementById("From").value;
      var Todate = document.getElementById("To").value;
      var Duration = calculateday(Fromdate, Todate);
      if (Duration <= 0) {
        window.alert("To: date must be greater than Staying From:");
      } else {
        var reason = document.getElementById("Reason").value;
        var getcurrentdate = new Date();
        var state = "Submitted";
        var date =
          getcurrentdate.getFullYear() +
          "-" +
          (getcurrentdate.getMonth() + 1) +
          "-" +
          getcurrentdate.getDate();
        var submit_arr = [{
          From: Fromdate,
          To: Todate,
          Duration: Duration,
          Reason: reason,
          Date: date,
          Status: state,
        }, ];
        if (retrieve == null) {
          localStorage.setItem(
            "localapplication_arr",
            JSON.stringify(submit_arr)
          );
        } else {
          var application_arr = JSON.parse(retrieve);
          Array.prototype.push.apply(submit_arr, application_arr);

          localStorage.setItem(
            "localapplication_arr",
            JSON.stringify(submit_arr)
          );
          console.log(application_arr);
        }
        window.location.href = "Sembreak.php";
      }
    };

    function calculateday(a, b) {
      var Fromdate = new Date(a);
      var Todate = new Date(b);
      return Math.floor((Todate - Fromdate) / (1000 * 60 * 60 * 24));
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

<footer class="container text-center font-italic py-2">
  Copyright © 2020 - XXX Residential College.
</footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>