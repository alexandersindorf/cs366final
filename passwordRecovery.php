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
      <h1>Password Recovery</h1>
      <form action='index.php?mode=reset' method='post'>
        <div class="txt_field">
          <input type="text" name ="user" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pass" required/>
          <span></span>
          <label>New Password</label>
        </div>
        <div class="txt_field">
          <input type="text" name="ques" required/>
          <span></span>
          <label>Password Question Answer</label>
        </div>
        <input type="submit" value="Reset Password"/>
      </form>
    </div>
</body>
</html>
<?php
        try {
            if (isset($_POST['action'])) {
                echo "HelloDude";
                        $user = "";
                        if (isset($_POST['user'])) {
                           $user = $_POST['user'];
                        }
                        $pass = "";
                        if (isset($_POST['pass'])) {
                           $pass = $_POST['pass'];
                        }
                        $ques = "";
                        if (isset($_POST['ques'])) {
                           $ques = $_POST['ques'];
                        }
                        

                        if ($firstName === '' || $lastName === '' || $username === '') {
                            echo "Invalid data";
                            } else {
                        echo "<div>";
                        echo "Hello Dude";
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $stmt = $db->prepare("CALL resetPass(?, ?, ?)");
                        $stmt->bindValue(1,$user, PDO::PARAM_STR);
                        $stmt->bindValue(2,$pass, PDO::PARAM_STR);
                        $stmt->bindValue(3,$ques, PDO::PARAM_STR);
                        
                        // set parameters and execute
                        //$name = "John";
                        //$pass = "pass4";
                        //$pr = "Green";
                        // call the stored procedure
                        $stmt->execute();
                        echo "Updated Password Successfully";
                        echo "</div>";}
        }
    } catch (PDOException $e) {
        echo "Error!: ". $e->getMessage() . "<br/>";
        die();
    }
?>