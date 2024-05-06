<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php

                    try {
                     
                    $indicator = '';
                    $array = array();
                    $subgroup = '';

                     if (isset($_POST['age']) && $_POST['age'] != 'd') {
                        array_push($array,$_POST['age']);
                     }
                     if (isset($_POST['state']) && $_POST['state'] != 'd') {
                        array_push($array,$_POST['state']);
                     }
                     if (isset($_POST['race']) && $_POST['race'] != 'd') {
                        array_push($array,$_POST['race']);
                     }
                     if (isset($_POST['edu']) && $_POST['edu'] != 'd') {
                        array_push($array,$_POST['edu']);
                     }
                     if (isset($_POST['Sex'])) {
                        array_push($array,$_POST['Sex']);
                     }
                     if (isset($_POST['Sex2'])) {
                        array_push($array,$_POST['Sex2']);
                     }
                     if (isset($_POST['SOr'])) {
                        array_push($array,$_POST['SOr']);
                     }
                     if (isset($_POST['SOr2'])) {
                        array_push($array,$_POST['SOr2']);
                     }
                     if (isset($_POST['SOr3'])) {
                        array_push($array,$_POST['SOr3']);
                     }
                     if (isset($_POST['genderI'])) {
                        array_push($array,$_POST['genderI']);
                     }
                     if (isset($_POST['genderI2'])) {
                        array_push($array,$_POST['genderI2']);
                     }
                     if (isset($_POST['genderI2'])) {
                        array_push($array,$_POST['genderI2']);
                     }
                     if (isset($_POST['DisStat'])) {
                        array_push($array,$_POST['DisStat']);
                     }
                     if (isset($_POST['DisStat2'])) {
                        array_push($array,$_POST['DisStat2']);
                     }
                     if (isset($_POST['ind'])) {
                        $indicator = $_POST['ind'];
                     }
                     
                     $subgroup = "('" . implode("', '", $array) . "')";

                     $sql = "select i.Subgroup, i.per from (select Indicator, Subgroup, AVG(Percent) as per from PulseSurveyDataset 
                    group by Indicator, Subgroup) as i where Indicator = :indicator and i.Subgroup in " . $subgroup;
                                    
                        $parameters = [":indicator" => $indicator];
        
                        $statement = $db->prepare($sql);
        
                        $statement->execute($parameters);
        
                        $check = $statement->fetchAll(PDO::FETCH_ASSOC);
                        
                        $xAxis = array();
                        $yAxis = array();

                        foreach($check as $item){
                           array_push($xAxis,$item['Subgroup']);
                           array_push($yAxis, $item['per']);
                        }
                        echo "<br></br><h2>Average Percentages at Risk for ". $indicator ."</h2>";

                  } catch (PDOException $e) {
                     echo "Error!: ". $e->getMessage() . "<br/>";
                     die();
                 }

?>
<div>
    <canvas id="myChart"></canvas>
</div>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
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