<?php
session_start();

$_SESSION['uid']; // Default no user logged in
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js-->
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
                        if ($_SESSION['uid'] != ''){
                        echo "<li class='nav-item'><a class='nav-link' href='setDataPage.php'>Set Demographic Data</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='quiz.php?qz=anx'>Anxiety Quiz</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='quiz.php?qz=dep'>Depression Quiz</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='quiz.php?qz=both'>Anxiety and Depression Quiz</a></li>";
                        }?>
                    </ul>
                </div>
            </nav>
        </div>
        <form action ='index.php?action=graph&gr=bar' method="post">
        <div>
            <label for = "age">Age Range:</label>
            <select class = "dropdown" name = "age" id = "age">
                <option value = "d" default>-</option>
                <option value = "18 - 29 years">18 - 29 Years</option>
                <option value = "30 - 39 years">30 - 39 Years</option>
                <option value = "40 - 49 years">40 - 49 Years</option>
                <option value = "50 - 59 years">50 - 59 Years</option>
                <option value = "60 - 69 years">60 - 69 Years</option>
                <option value = "70 - 79 years">70 - 79 Years</option>
                <option value = "80 years and above">80 Years and Above</option>
            </select>
        </div>
        <div>
            <label for = "state">State:</label>
            <select class = "dropdown" name = "state" id = "state">
                <option value = "d" default>-</option>
                <option value = "Alabama">Alabama</option>
                <option value = "Alaska">Alaska</option>
                <option value = "Arizona">Arizona</option>
                <option value = "Arkansas">Arkansas</option>
                <option value = "California">California</option>
                <option value = "Colorado">Colorado</option>
                <option value = "Connecticut">Connecticut</option>
                <option value = "Delaware">Delaware</option>
                <option value = "District of Columbia">District of Columbia</option>
                <option value = "Florida">Florida</option>
                <option value = "Georgia">Georgia</option>
                <option value = "Hawaii">Hawaii</option>
                <option value = "Idaho">Idaho</option>
                <option value = "Illinois">Illinois</option>
                <option value = "Indiana">Indiana</option>
                <option value = "Iowa">Iowa</option>
                <option value = "Kansas">Kansas</option>
                <option value = "Kentucky">Kentucky</option>
                <option value = "Louisiana">Louisiana</option>
                <option value = "Maine">Maine</option>
                <option value = "Maryland">Maryland</option>
                <option value = "Massachusetts">Massachusetts</option>
                <option value = "Michigan">Michigan</option>
                <option value = "Minnesota">Minnesota</option>
                <option value = "Mississippi">Mississippi</option>
                <option value = "Missouri">Missouri</option>
                <option value = "Montana">Montana</option>
                <option value = "Nebraska">Nebraska</option>
                <option value = "Nevada">Nevada</option>
                <option value = "New Hampshire">New Hampshire</option>
                <option value = "New Jersey">New Jersey</option>
                <option value = "New Mexico">New Mexico</option>
                <option value = "New York">New York</option>
                <option value = "North Carolina">North Carolina</option>
                <option value = "North Dakota">North Dakota</option>
                <option value = "Ohio">Ohio</option>
                <option value = "Oklahoma">Oklahoma</option>
                <option value = "Oregon">Oregon</option>
                <option value = "Pennsylvania">Pennsylvania</option>
                <option value = "Rhode Island">Rhode Island</option>
                <option value = "South Carolina">South Carolina</option>
                <option value = "South Dakota">South Dakota</option>
                <option value = "Tennessee">Tennessee</option>
                <option value = "Texas">Texas</option>
                <option value = "Utah">Utah</option>
                <option value = "Vermont">Vermont</option>
                <option value = "Virginia">Virginia</option>
                <option value = "Washington">Washington</option>
                <option value = "West Virginia">West Virginia</option>
                <option value = "Wisconsin">Wisconsin</option>
                <option value = "Wyoming">Wyoming</option>
            </select>
        </div>
        <div>
            <label for = "race">Race:</label>
            <select class = "dropdown" name = "race" id = "race">
                <option value = "d" default>-</option>
                <option value = "Hispanic or Latino">Hispanic or Latino</option>
                <option value = "Non-Hispanic Asian/single race">Non-Hispanic Asian, Single Race</option>
                <option value = "Non-Hispanic Black/single race">Non-Hispanic Black, Single Race</option>
                <option value = "Non-Hispanic White/single race">Non-Hispanic White, Single Race</option>
                <option value = "Non-Hispanic/other races and multiple races">Non-Hispanic, Other Races and Multiple Races</option>
            </select>
        </div>
        <div>
            <label for = "edu">Education:</label>
            <select class = "dropdown" name = "edu" id = "edu">
                <option value = "d" default>-</option>
                <option value = "Less than a high school diploma">Less than a High School Deploma</option>
                <option value = "High school diploma or GED">High School Diploma or GED</option>
                <option value = "Some college/Associate's degree">Some College/Associate's Degree</option>
                <option value = "Bachelor's degree or higher">Bachelor's Degree or Higher</option>
            </select>
        </div>
        <div>
            <p>Sex</p>
            <input type = "radio" name = "Sex" id = "fe" value = "Female"/>Female
            <input type = "radio" name = "Sex" id = "ma" value = "Male"/>Male
        </div>
        <div>
            <p>Sexual Orientaiton</p>
            <input type = "radio" name = "SOr" id = "gl" value = "Gay or lesbian"/>Gay or Lesbian
            <input type = "radio" name = "SOr" id = "st" value = "Straight"/>Straight
            <input type = "radio" name = "SOr" id = "bi" value = "Bisexual"/>Bisexual
        </div>
        <div>
            <p>Gender Identity</p>
            <input type = "radio" name = "genderI" id = "cgm" value = "Cis-gender male"/><label for = "">Cis-gender Male</label>
            <input type = "radio" name = "genderI" id = "cgf" value = "Cis-gender female"/><label for = "">Cis-gender Female</label>
            <input type = "radio" name = "genderI" id = "trg" value = "Transgender"/><label for = "">Transgender</label>
        </div>
        <div>
            <p>Disability Status</p>
            <input type = "radio" name = "DisStat" id = "yd" value = "With disability"/><label for = "">With Disability</label>
            <input type = "radio" name = "DisStat" id = "nd" value = "Without disability"/><label for = "">Without Disability</label>
        </div>
        <div><br></br>
            <p>Quiz Result Set</p>
            <input type = "radio" name = "ind" id = "cgm" value = "Symptoms of Anxiety Disorder"/>Symptoms of Anxiety Disorder<br></br>
            <input type = "radio" name = "ind" id = "cgf" value = "Symptoms of Depressive Disorder"/>Symptoms of Depressive Disorder<br></br>
            <input type = "radio" name = "ind" id = "trg" value = "Symptoms of Anxiety Disorder or Depressive Disorder" checked = "checked"/>Symptoms of Anxiety Disorder or Depressive Disorder<br></br>
        </div>
        <input type="submit" value="Create Bar Graph"/>
        <input type="submit" formaction = "index.php?action=graph&gr=line" value="Create Line Graph"/>
      </form>
   
        <?php
    
        $action = "";
        $parameterValues = null;
        
        try {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            
            switch ($action) {
                case "graph":
                    switch($_GET["gr"]){
                        case "bar":
                            include("barChart.php");
                        break;
                        
                        case "line":
                            echo "LINE";
                        break;
                    }
                break;
                
                case "login":
                try {
                    $username = '';
                    $password = '';

                    if (isset($_POST["uid"])) {
                        $username = $_POST["uid"];
                     }
                     if (isset($_POST['password'])) {
                        $password = $_POST['password'];
                     }

                     if($username === '' || $password === '') {
                        echo "Invalid Data";
                     } else {
                        $sql = "Select count(*) from UserLogInInfo where Password = :password and UID = :username";
                                    
                        $parameters = [":username" => $username,":password" => $password];
        
                        $statement = $db->prepare($sql);
        
                        $statement->execute($parameters);
        
                        $check = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach($check as $item){
                            foreach ($item as $key => $value) {
                                echo $value;
                                if ($value == 0){
                                    echo "Invalid username or password!"; 
                                    die(); 
                                } 
                            }
                        }
                        echo "Successful Login";
                        $_SESSION["uid"] = $_POST["uid"];
                    }
                } catch (PDOException $e) {
                    echo "Error!: ". $e->getMessage() . "<br/>";
                    die();
                }
                break;

                case "query": 

                    //$sql = "Select Time_PeriodS, Time_PeriodE, Percent from PulseSurveyDataset where Indicator = 'Symptoms of Depressive Disorder' and Subgroup = 'Wisconsin' Order By Time_PeriodS, Time_PeriodE";
                    //start end percentage                    
                    
                    $sql = "Select s.Subgroup, AVG(p.Value) from UserDemographicData u, Search s, PulseSurveyData p where u.UID = s.UID and s.Indicator = p.Indicator and p.Indicator = 'Symptoms of Anxiety Disorder or Depressive Disorder' and s.Subgroup = p.Subgroup Group By s.Subgroup Order By p.value";

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
                    
                    if($uid === '' || $indicator === '') {
                        echo "Invalid Data";
                     } else {

                    $date = date("Y-m-d");
                    $time = date("H:i:s");

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
                    echo "Welcome " . $_SESSION["uid"];
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
   
            echo $pageTitle;
            echo "<table class='table table-sm'>";
            
            $numCols = count($columns);
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