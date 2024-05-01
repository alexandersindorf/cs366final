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
                    </ul>
                </div>
            </nav>
        </div>
<div className="content-container">
<header className="App-header">
    <h2>Anxiety and Depression Survey DBMS</h2>
    </header>
<body>
<form>
    <section>
    <p>Adapted PHQ-2 questions:</p>
<p>
Over the last 7 days, how often have you been bothered by … having little interest or pleasure in doing things? Would you say not at all, several days, more than half the days, or nearly every day? Select only one answer.
</p><br></br>
<div>
  <input type = "radio" name = "dq1" id = "no" value = "0"/><label for = "">Not at all</label>
  <input type = "radio" name = "dq1" id = "se" value = "1"/><label for = "">Several Days</label>
  <input type = "radio" name = "dq1" id = "mo" value = "2"/><label for = "">More than half the days</label>
  <input type = "radio" name = "dq1" id = "ne" value = "3"/><label for = "">Nearly every day</label>
</div>
<p>
Over the last 7 days, how often have you been bothered by … feeling down, depressed, or hopeless? Would you say not at all, several days, more than half the days, or nearly every day? Select only one answer.
</p><br></br>
<div>
  <input type = "radio" name = "dq2" id = "no" value = "0"/><label for = "">Not at all</label>
  <input type = "radio" name = "dq2" id = "se" value = "1"/><label for = "">Several Days</label>
  <input type = "radio" name = "dq2" id = "mo" value = "2"/><label for = "">More than half the days</label>
  <input type = "radio" name = "dq2" id = "ne" value = "3"/><label for = "">Nearly every day</label>
</div>
<p>Adapted GAD-2 questions:</p>
<p>
Over the last 7 days, how often have you been bothered by the following problems … Feeling nervous, anxious, or on edge? Would you say not at all, several days, more than half the days, or nearly every day? Select only one answer.
</p>
<div>
  <input type = "radio" name = "aq1" id = "no" value = "0"/><label for = "">Not at all</label>
  <input type = "radio" name = "aq1" id = "se" value = "1"/><label for = "">Several Days</label>
  <input type = "radio" name = "aq1" id = "mo" value = "2"/><label for = "">More than half the days</label>
  <input type = "radio" name = "aq1" id = "ne" value = "3"/><label for = "">Nearly every day</label>
</div>
<p>
Over the last 7 days, how often have you been bothered by the following problems … Not being able to stop or control worrying? Would you say not at all, several days, more than half the days, or nearly every day? Select only one answer.
</p>
<div>
  <input type = "radio" name = "aq2" id = "no" value = "0"/><label for = "">Not at all</label>
  <input type = "radio" name = "aq2" id = "se" value = "1"/><label for = "">Several Days</label>
  <input type = "radio" name = "aq2" id = "mo" value = "2"/><label for = "">More than half the days</label>
  <input type = "radio" name = "aq2" id = "ne" value = "3"/><label for = "">Nearly every day</label>
</div><br></br>
<input type="submit" value="Submit Quiz"/>
    </section>
</form>
    <div class="signup_link">
          <a onClick={navigateToHome}>Return to Home</a>
    </div>
</body>
</div>
    </body>
</html>