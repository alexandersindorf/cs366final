<?php
session_start();

$_SESSION['uid'] = ''; // Default no user logged in
?>
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
        <style>
            .menu-link > a { color: #fff; font-weight: 500; padding-left: 20px; }
            .menu-bar { background-color: maroon; }
        </style>
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6c757d;">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=query">Query</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <?php
                        if ($_SESSION['uid'] == ''){
                        echo "<li class='nav-item'><a class='nav-link' href='setDataPage.php'>Set Demographic Data</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='quiz.php?qz=anx'>Anxiety Quiz</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='quiz.php?qz=dep'>Depression Quiz</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='quiz.php?qz=both'>Anxiety and Depression Quiz</a></li>";
                        }?>
                    </ul>
                </div>
            </nav>
        </div>

   
        <?php
    
        $action = "";
        $parameterValues = null;
        
        try {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            
            switch ($action) {
                case "login":
                break;
                case "query": 

                    $sql = "Select s.Subgroup, AVG(p.Percent) from UserDemographicData u, Search s, PulseSurveyDataset p where u.UID = 'Kaleb' and u.UID = s.UID and s.Indicator = p.Indicator and p.Indicator = 'Symptoms of Anxiety Disorder or Depressive Disorder' and s.Subgroup = p.Subgroup Group By s.Subgroup Order By p.Percent DESC";
                    
                    //$parameterValues = array(":genre" => $genre);
                    $resultSet = getAll($sql, $db, $parameterValues);
                    
                    $pageTitle = "List of Groups";
                    $columns = array("Subgroup", "AVG");
                    displayResultSet($pageTitle, $resultSet, $columns);
                break;
                case "set":
                try {
                    $uid = '';
                    $age = 'blank';
                    $state = 'blank';
                    $race = 'blank';
                    $edu = 'blank';
                    $Sex = 'blank';
                    $SOr = 'blank';
                    $genderI = 'blank';
                    $DisStat = 'blank';


                     if (isset($_SESSION["uid"])) {
                        $uid = $_SESSION["uid"];
                     }
                     if (isset($_POST['age'])) {
                        $age = $_POST['age'];
                     }
                     if (isset($_POST['state'])) {
                        $state = $_POST['state'];
                     }
                     if (isset($_POST['race'])) {
                        $race = $_POST['race'];
                     }
                     if (isset($_POST['edu'])) {
                        $edu = $_POST['edu'];
                     }
                     if (isset($_POST['Sex'])) {
                        $Sex = $_POST['Sex'];
                     }
                     if (isset($_POST['SOr'])) {
                        $SOr = $_POST['SOr'];
                     }
                     if (isset($_POST['genderI'])) {
                        $genderI = $_POST['genderI'];
                     }
                     if (isset($_POST['DisStat'])) {
                        $DisStat = $_POST['DisStat'];
                     }

                     if($uid === '') {
                        echo "Invalid Data";
                     } else {
                     
                     echo "<div>";
                     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     
                     $stmt = $db->prepare("CALL setUserData(?,?,?,?,?,?,?,?,?)");
                     $stmt->bindValue(1,$uid, PDO::PARAM_STR);
                     $stmt->bindValue(2,$age, PDO::PARAM_STR);
                     $stmt->bindValue(3,$Sex, PDO::PARAM_STR);
                     $stmt->bindValue(4,$genderI, PDO::PARAM_STR);
                     $stmt->bindValue(5,$SOr, PDO::PARAM_STR);
                     $stmt->bindValue(6,$race, PDO::PARAM_STR);
                     $stmt->bindValue(7,$edu, PDO::PARAM_STR);
                     $stmt->bindValue(8,$DisStat, PDO::PARAM_STR);
                     $stmt->bindValue(9,$state, PDO::PARAM_STR);
                     
                     $stmt->execute();
                     echo "<br></br>";
                     echo "Set Demographic Data Successfully";
                     echo "</div>";
                     }
 } catch (PDOException $e) {
     echo "Error!: ". $e->getMessage() . "<br/>";
     die();
 }
 break;
            case "submitQuiz":
                try {
                    $uid = '';
                    $score = 0;
                    $date = '';
                    $time = '';
                    $indicator = '';



                    if (isset($_SESSION["uid"])) {
                        $uid = $_SESSION["uid"];
                    }

                    if (isset($_POST['aq1'])) {
                        $score += $_POST['aq1'];
                    }
                    if (isset($_POST['aq2'])) {
                        $score += $_POST['aq2'];
                    }
                    if (isset($_POST['dq1'])) {
                        $score += $_POST['dq1'];
                    }
                    if (isset($_POST['dq2'])) {
                        $score += $_POST['dq2'];
                    }
                    echo $score;

                    if (isset($_GET['indicator'])) {
                        if ($_GET['indicator'] === 'anx'){
                            $indicator = "Symptoms of Anxiety Disorder";
                        }
                        if ($_GET['indicator'] === 'dep'){
                            $indicator = "Symptoms of Depressive Disorder";
                        }
                        if ($_GET['indicator'] === 'both'){
                            $indicator = "Symptoms of Anxiety Disorder or Depressive Disorder";
                        }
                    }
                    
                    if($uid === '' || $score === '' || $date === '' || $time === '' || $indicator === '') {
                        echo "Invalid Data";
                     } else {

                    echo "<div>";
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $stmt = $db->prepare("CALL storeQuiz(?,?,?,?,?)");
                    $stmt->bindValue(1,$uid, PDO::PARAM_STR);
                    $stmt->bindValue(2,$score, PDO::PARAM_STR);
                    $stmt->bindValue(3,$date, PDO::PARAM_STR);
                    $stmt->bindValue(4,$time, PDO::PARAM_STR);
                    $stmt->bindValue(5,$indicator, PDO::PARAM_STR);
                    
                    $stmt->execute();
                    echo "<br></br>";
                    echo "Submitted Quiz Successfully";
                    echo "</div>";
                    }
} catch (PDOException $e) {
echo "Error!: ". $e->getMessage() . "<br/>";
die();
}
break;
                default:
                    echo "<h2>Anxiety and Depression Survey DBMS</h2><br></br>";
                    echo "<h3>By Martin Amundsen, Kaleb Johnson, and Alex Sindorf</h3>";
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

<?php
function displayResultSet($pageTitle, $resultSet, $columns) {
    // Use a table structure for displaying data
            echo $pageTitle;
            echo "<table class='table table-sm'>";
            // If the $columns array is not empty, then display the table header
            $numCols = count($columns); // find the size of the array
            if ($numCols > 0) {
                echo "<thead><tr>";
                foreach($columns as $c) {
                    echo "<th>{$c}</th>";
                }
                echo "</thead>";
            }
            
            echo "<tbody>";
            foreach( $resultSet as $item){
                /* Each $item is an associative array.  Keys are the same as the field names 
                    used in the SQL statement.
                */
                // Define a table row for each item in the $resultSet array
                echo "<tr>";
                
                // We can use a foreach loop to access each element of the $item array
                foreach ($item as $key => $value) {
                    echo "<td>{$value}</td>";
                }
                
                echo "</tr>";
                
            }
            echo "</tbody></table>";
}

function getAll($sql, $db, $parameterValues = null){
    /* Prepare the SQL statement. 
        The $db->prepare($sql) method returns an object.
    */
    $statement = $db->prepare($sql);

    /* Execute prepared statement. The execute( ) method returns a resource object.  */
    $statement->execute($parameterValues);

    /* Use the fetchAll( ) method to extract records from the result set.
    */
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}

?>