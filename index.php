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
                            <a class="nav-link" href="index.php?mode=query">Query</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?mode=stored">Stored</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="setDataPage.php">Set Demographic Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quiz.php">Quiz</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

   
        <?php
    
        $mode = ""; 
        $parameterValues = null; 
        $pageTitle = ""; 
        $columns = array(); 
        
        try {
            if (isset($_GET['mode'])) {
                $mode = $_GET['mode'];
            }
            
            switch ($mode) {
                case "query": 

                    $sql = "Select s.Subgroup, AVG(p.Percent) from UserDemographicData u, Search s, PulseSurveyDataset p where u.UID = 'Kaleb' and u.UID = s.UID and s.Indicator = p.Indicator and p.Indicator = 'Symptoms of Anxiety Disorder or Depressive Disorder' and s.Subgroup = p.Subgroup Group By s.Subgroup Order By p.Percent DESC";
                    
                    //$parameterValues = array(":genre" => $genre);
 
                    echo $sql;
                    $resultSet = getAll($sql, $db, $parameterValues);
                    
                    $pageTitle = "List of Groups";
                    $columns = array("Subgroup", "AVG");
                    displayResultSet($pageTitle, $resultSet, $columns);
                    break;
                case "stored":
                        echo "<div>";
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $stmt = $db->prepare("CALL resetPass(?, ?, ?)");
                        $stmt->bindValue(1,"John", PDO::PARAM_STR);
                        $stmt->bindValue(2,"pass4", PDO::PARAM_STR);
                        $stmt->bindValue(3,"Green", PDO::PARAM_STR);

                        $stmt->execute();
                        echo "Updated Password Successfully";
                        echo "</div>";
                    break;
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
                                    echo "<div>";
                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                    $stmt = $db->prepare("CALL resetPass(?, ?, ?)");
                                    $stmt->bindValue(1,$user, PDO::PARAM_STR);
                                    $stmt->bindValue(2,$pass, PDO::PARAM_STR);
                                    $stmt->bindValue(3,$ques, PDO::PARAM_STR);
                                    
                                    $stmt->execute();
                                    echo "Updated Password Successfully!";
                                    echo "</div>";}
                } catch (PDOException $e) {
                    echo "Error!: ". $e->getMessage() . "<br/>";
                    die();
                }
                break;
                default: // Default page
                    echo "<h3>Anxiety and Depression Survey DBMS<h3>";
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