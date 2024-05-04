<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php

                    try {
                    $uid = '';
                    $age = '';
                    $state = '';
                    $race = '';
                    $edu = '';
                    $Sex = '';
                    $SOr = '';
                    $genderI = '';
                    $DisStat = '';
                    $indicator = '';

                    $array = array();

                     if (isset($_SESSION["uid"])) {
                        $uid = $_SESSION["uid"];
                     }
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
                     if (isset($_POST['SOr'])) {
                        array_push($array,$_POST['SOr']);
                     }
                     if (isset($_POST['genderI'])) {
                        array_push($array,$_POST['genderI']);
                     }
                     if (isset($_POST['DisStat'])) {
                        array_push($array,$_POST['DisStat']);
                     }
                     if (isset($_POST['ind'])) {
                        $indicator = $_POST['ind'];
                     }

                     foreach($array as $a){
                        print $a;
                     }
                     
                     $sql = "select i.Subgroup, i.per from (select Indicator, Subgroup, AVG(Percent) as per from PulseSurveyDataset 
                    group by Indicator, Subgroup) as i where Indicator = 'Symptoms of Depressive Disorder' and i.Subgroup in ('Male', 'Female','Wisconsin');
                    ";
                                    
                        $parameters = [":username" => $username,":password" => $password];
        
                        $statement = $db->prepare($sql);
        
                        $statement->execute($parameters);
        
                        $check = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach($check as $item){
                            foreach ($item as $key => $value) {
                            }
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
const ctx = document.getElementById('myChart');

new Chart(ctx, {
type: 'bar',
data: {
  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
  datasets: [{
    label: '# of Votes',
    data: [12, 19, 3, 5, 2, 3],
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