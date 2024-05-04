<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="center">
<?php
        // Establish database connection
        include("pdo_connect.php");

        /* Check if the database connection is established. If not, exit the program. */
        if (!$db) {
            echo "Could not connect to the database";
            exit();
        }
        else{
            echo "Connected to Database Successfully";
        }
        ?>
<div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6c757d;">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
      <h1>Set Account</h1>
      <form action='login.php?action=create' method="post">
        <div class="txt_field">
          <input type="text" name = "use" required/>
          <span></span>
          <label>Type Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name = "pas" required/>
          <span></span>
          <label>Type Password</label>
        </div>
        <p>Recovery Question:<br></br> What is your favorite color?</p>
        <div class="txt_field">
          <input type="text" name = "que" required/>
          <span></span>
          <label>Recovery Question Answer</label>
        </div>
            <input type="submit" value="Set Account"/>
      </form>
    </div>
</body>
</html>
