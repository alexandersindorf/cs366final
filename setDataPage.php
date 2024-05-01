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
      <form method="post">
        <div>
            <label for = "age">Age Range:</label>
            <select class = "dropdown" name = "age" id = "age">
                <option value = "1">18 - 29 Years</option>
                <option value = "3">30 - 39 Years</option>
                <option value = "4">40 - 49 Years</option>
                <option value = "5">50 - 59 Years</option>
                <option value = "6">60 - 69 Years</option>
                <option value = "7">70 - 79 Years</option>
                <option value = "8">80 Years and Above</option>
            </select>
        </div>
        <div>
            <label for = "state">State:</label>
            <select class = "dropdown" name = "state" id = "state">
                <option value = "AL">Alabama</option>
                <option value = "AK">Alaska</option>
                <option value = "AZ">Arizona</option>
                <option value = "AR">Arkansas</option>
                <option value = "CA">California</option>
                <option value = "CO">Colorado</option>
                <option value = "CT">Connecticut</option>
                <option value = "DE">Delaware</option>
                <option value = "DOC">District of Columbia</option>
                <option value = "FL">Florida</option>
                <option value = "GA">Georgia</option>
                <option value = "HI">Hawaii</option>
                <option value = "ID">Idaho</option>
                <option value = "IL">Illinois</option>
                <option value = "IN">Indiana</option>
                <option value = "IA">Iowa</option>
                <option value = "KS">Kansas</option>
                <option value = "KY">Kentucky</option>
                <option value = "LA">Louisiana</option>
                <option value = "ME">Maine</option>
                <option value = "MD">Maryland</option>
                <option value = "MA">Massachusetts</option>
                <option value = "MI">Michigan</option>
                <option value = "MN">Minnesota</option>
                <option value = "MS">Mississippi</option>
                <option value = "MO">Missouri</option>
                <option value = "MT">Montana</option>
                <option value = "NE">Nebraska</option>
                <option value = "NV">Nevada</option>
                <option value = "NH">New Hampshire</option>
                <option value = "NJ">New Jersey</option>
                <option value = "NM">New Mexico</option>
                <option value = "NY">New York</option>
                <option value = "NC">North Carolina</option>
                <option value = "ND">North Dakota</option>
                <option value = "OH">Ohio</option>
                <option value = "OK">Oklahoma</option>
                <option value = "OR">Oregon</option>
                <option value = "PA">Pennsylvania</option>
                <option value = "RI">Rhode Island</option>
                <option value = "SC">South Carolina</option>
                <option value = "SD">South Dakota</option>
                <option value = "TN">Tennessee</option>
                <option value = "TX">Texas</option>
                <option value = "UT">Utah</option>
                <option value = "VT">Vermont</option>
                <option value = "VA">Virginia</option>
                <option value = "WA">Washington</option>
                <option value = "WV">West Virginia</option>
                <option value = "WI">Wisconsin</option>
                <option value = "WY">Wyoming</option>
            </select>
        </div>
        <div>
            <label for = "race">Race:</label>
            <select class = "dropdown" name = "race" id = "race">
                <option value = "HoL">Hispanic or Latino</option>
                <option value = "aSR">Non-Hispanic Asian, Single Race</option>
                <option value = "bSR">Non-Hispanic Black, Single Race</option>
                <option value = "wSR">Non-Hispanic White, Single Race</option>
                <option value = "oR">Non-Hispanic, Other Races and Multiple Races</option>
            </select>
        </div>
        <div>
            <label for = "edu">Education:</label>
            <select class = "dropdown" name = "edu" id = "edu">
                <option value = "HSD">Less than a High School Deploma</option>
                <option value = "GED">High School Diploma or GED</option>
                <option value = "CAD">Some College/Associate's Degree</option>
                <option value = "BDH">Bachelor's Degree or Higher</option>
            </select>
        </div>
        <div>
            <p>Sex</p>
            <input type = "radio" name = "Sex" id = "fe" value = "fe"/><label for = "">Female</label>
            <input type = "radio" name = "Sex" id = "ma" value = "ma"/><label for = "">Male</label>
        </div>
        <div>
            <p>Sexual Orientaiton</p>
            <input type = "radio" name = "SOr" id = "gl" value = "gl"/><label for = "">Gay or Lesbian</label>
            <input type = "radio" name = "SOr" id = "st" value = "st"/><label for = "">Straight</label>
            <input type = "radio" name = "SOr" id = "bi" value = "bi"/><label for = "">Bisexual</label>
        </div>
        <div>
            <p>Gender Identity</p>
            <input type = "radio" name = "genderI" id = "cgm" value = "cgm"/><label for = "">Cis-gender Male</label>
            <input type = "radio" name = "genderI" id = "cgf" value = "cgf"/><label for = "">Cis-gender Female</label>
            <input type = "radio" name = "genderI" id = "trg" value = "trg"/><label for = "">Transgender</label>
        </div>
        <div>
            <p>Disability Status</p>
            <input type = "radio" name = "DisStat" id = "yd" value = "yd"/><label for = "">With Disability</label>
            <input type = "radio" name = "DisStat" id = "nd" value = "nd"/><label for = "">Without Disability</label>
        </div>
        <br></br>
        <input type="submit" value="Set Demographics"/>
      </form>
      <div class="signup_link">
          <a onClick={navigateToHome}>Return to Home</a>
        </div>
    </div>
</body>
</html>