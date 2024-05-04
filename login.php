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
        <div action = "index.php?action=login" class="center">
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
      </form>
    </div>
    <?php
    
        
        $action = "";

        try {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            
            switch ($action) {
                case "reset": 
                    try {
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
                                    
            
                                    if ($user === '' || $pass === '' || $ques === '') {
                                        echo "Invalid data";
                                        } else {

                                    $sql = "select count(*) from UserLogInInfo where UID = :user and RecoveryQuestionAnswer = :answer";
                                    
                                    $parameters = [":user" => $user,":answer" => $ques];
        
                                    $statement = $db->prepare($sql);
        
                                    $statement->execute($parameters);
        
                                    $check = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($check as $item){
                                        foreach ($item as $key => $value) {
                                            if ($value != 1){ // taken username
                                                break; 
                                            }
                                        }
                                    }


                                    echo "<div>";
                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                    $stmt = $db->prepare("CALL resetPass(?, ?, ?)");
                                    $stmt->bindValue(1,$user, PDO::PARAM_STR);
                                    $stmt->bindValue(2,$pass, PDO::PARAM_STR);
                                    $stmt->bindValue(3,$ques, PDO::PARAM_STR);
                                    
                                    $stmt->execute();
                                    echo "<br></br>";
                                    echo "Updated Password Successfully!";
                                    echo "</div>";}
                } catch (PDOException $e) {
                    echo "Error!: ". $e->getMessage() . "<br/>";
                    die();
                }
                break;
                case "create": 
                    try {
                                    $uid = "";
                                    if (isset($_POST['use'])) {
                                       $uid = $_POST['use'];
                                    }
                                    $pas = "";
                                    if (isset($_POST['pas'])) {
                                       $pas = $_POST['pas'];
                                    }
                                    $que = "";
                                    if (isset($_POST['que'])) {
                                       $que = $_POST['que'];
                                    }
                                    
            
                                    if ($uid === '' || $pas === '' || $que === '') {
                                        echo "Invalid data";
                                        } else {


                                    $sql = "select count(*) from UserLogInInfo where UID = :uid";
                                    
                                    $parameter = [":uid" => $uid];

                                    $statement = $db->prepare($sql);

                                    $statement->execute($parameter);

                                    $check = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($check as $item){
                                        foreach ($item as $key => $value) {
                                            if ($value != 0){ // taken username
                                                break; 
                                            }
                                        }
                                    }

                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                    $stmt = $db->prepare("CALL createUser(?, ?, ?)");
                                    $stmt->bindValue(1,$uid, PDO::PARAM_STR);
                                    $stmt->bindValue(2,$pas, PDO::PARAM_STR);
                                    $stmt->bindValue(3,$que, PDO::PARAM_STR);
                                    
                                    $stmt->execute();

                                    echo "<div>";

                                    echo "<br></br>";
                                    echo "Updated Account Successfully!";
                                    echo "</div>";}
                } catch (PDOException $e) {
                    echo "Error!: ". $e->getMessage() . "<br/>";
                    die();
                }
                break;
            }
                 
        } catch (PDOException $e) {
            echo "Error!: ". $e->getMessage() . "<br/>";
            die();
        }
?>
        </div>
    </body>
</html>