<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
try {
                     $Quid = '';
                     $Qindicator = '';
 
                      if (isset($_SESSION["uid"])) {
                         $Quid = $_SESSION["uid"];
                      }
                      if (isset($_POST['ind'])) {
                         $Qindicator = $_POST['ind'];
                      } 

                      if($Quid === '' || $Qindicator === '') {
                        echo "Invalid Data";
                      } else {
 
                      $Qsql = "Select Indicator, TotalScore, Day, TimeStamp From UserQuizData where UID = :uid and Indicator = :indicator";
                    
                                     
                         $Qparameters = [":indicator" => $Qindicator, ":uid" => $Quid];
         
                         $Qstatement = $db->prepare($Qsql);
         
                         $Qstatement->execute($Qparameters);
         
                         $Qcheck = $Qstatement->fetchAll(PDO::FETCH_ASSOC);
                         
                         $QxAxis = array();
                         $QyAxis = array();
                         //$timeBlock = '';
 
                         foreach($Qcheck as $item){

                            $timeBlock = $item['Day'] . " / " . $item['TimeStamp'];
                            $QxAxis[] = $timeBlock;
                            array_push($QyAxis, $item['TotalScore']);
                         }
                    }
                        echo "<br></br><h2>Quiz Scores Over Time for ". $Qindicator ."</h2>";
 
                   } catch (PDOException $e) {
                      echo "Error!: ". $e->getMessage() . "<br/>";
                      die();
                  }
?>
                <br></br>
                  <div>
                      <canvas id="yourChart"></canvas>
                  </div>
                  
                  <script>
                  const ctx2 = document.getElementById('yourChart');
                  
                  new Chart(ctx2, {
                  type: 'bar',
                  data: {
                    labels: <?php echo json_encode($QxAxis)?>,
                    datasets: [{
                      label: 'Average Quiz Scores Over Time',
                      data: <?php echo json_encode($QyAxis)?>,
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                  });
                  </script>