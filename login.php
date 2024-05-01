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
        <div class='container-fluid'>
        <!-- include page content -->
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="setUserPage.php">Create/Set Account</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="passwordRecovery.php">Forgot Password?</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="center">
            <h1>Login</h1>
            <form method="post">
                <div class="txt_field">
                <input type="text" required/>
                <span></span>
                <label>Username</label>
                </div>
                <div class="txt_field">
                <input type="password" required/>
                <span></span>
                <label>Password</label>
                </div>
                <input type="submit" value="Login"/>
                
                <div class="signup_link">
                <a onclick={navigateToSetUser}>Create Account/Set Account Info</a>
                <br></br><br></br>
                <a onclick={navigateToPwRecovery}>Forgot Password?</a>
                </div>
      </form>
    </div>
        </div>
    </body>
</html>