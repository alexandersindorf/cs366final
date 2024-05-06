<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php

try {
  $uid = '';
  $indicator = '';


   if (isset($_SESSION["uid"])) {
      $uid = $_SESSION["uid"];
   }
   if (isset($_POST['ind'])) {
      $indicator = $_POST['ind'];
   }

   if($uid === '') {
      echo "Invalid Data";
   } else {

   $sql = "Select s.Subgroup, AVG(p.Percent) from UserDemographicData u, Search s, PulseSurveyDataset p where s.UID = :uid and p.Indicator = :indicator and s.Subgroup = p.Subgroup Group By s.Subgroup Order By p.Percent ASC";

                  
      $parameters = [":uid" => $uid, ":indicator" => $indicator];

      $statement = $db->prepare($sql);

      $statement->execute($parameters);

      $check = $statement->fetchAll(PDO::FETCH_ASSOC);
      
      $xAxis = array();
      $yAxis = array();

      foreach($check as $item){
         array_push($xAxis,$item['Subgroup']);
         array_push($yAxis, $item['AVG(p.Percent)']);
      }
      echo "<br></br><h2>Most at Risk Categories of ". $indicator ." for " . $uid ."</h2>";
      
  }
} catch (PDOException $e) {
   echo "Error!: ". $e->getMessage() . "<br/>";
   die();
}

?>


<div>
    <canvas id="myChart"></canvas>
</div>

<script>
const ctx3 = document.getElementById('myChart');

new Chart(ctx3, {
type: 'bar',
data: {
  labels: <?php echo json_encode($xAxis)?>,
  datasets: [{
    label: 'Average Percentage of at risk Symptoms',
    data: <?php echo json_encode($yAxis)?>,
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