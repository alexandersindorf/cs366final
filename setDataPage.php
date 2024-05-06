<?php
session_start();
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
      <h1>Set Demographic Data</h1>
      <form action ='index.php?action=set' method="post">
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
            <input type = "radio" name = "Sex" id = "fe" value = "Female"/><label for = "">Female</label>
            <input type = "radio" name = "Sex" id = "ma" value = "Male"/><label for = "">Male</label>
        </div>
        <div>
            <p>Sexual Orientaiton</p>
            <input type = "radio" name = "SOr" id = "gl" value = "Gay or lesbian"/><label for = "">Gay or Lesbian</label>
            <input type = "radio" name = "SOr" id = "st" value = "Straight"/><label for = "">Straight</label>
            <input type = "radio" name = "SOr" id = "bi" value = "Bisexual"/><label for = "">Bisexual</label>
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
        <br></br>
        <input type="submit" value="Set Demographics"/>
      </form>
    </div>
</body>
</html>