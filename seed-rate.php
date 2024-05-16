
<?php
$crop = '';
    // Check if POST data has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the POST data
        $area = $_POST["area"];
        $crop = $_POST["crop"];


        function seed_rate_calculation($farm_area,$crop_choice){ 
            $seedRate = 0;           
            if($crop_choice == 'Maize'){
                 $spacing = 0.7*0.15; 
                 $twg = 350;

                 $seedRate = ($farm_area * $twg * 100 * 100)/($spacing * 98 * 90 * 1000 * 1000);

                 return round($seedRate,2);

            }elseif($crop_choice == 'Beans'){
                $spacing = 0.45*0.2; 
                $twg = 240;

                $seedRate = ($farm_area * $twg * 100 * 100)/($spacing * 75 * 98 * 1000 * 1000);

                return round($seedRate,2);
                
            }elseif($crop_choice == 'Soybeans'){
                $spacing = 0.1*0.4; 
                $twg = 188.3;

                $seedRate = ($farm_area * $twg * 100 * 100)/($spacing * 97 * 70 * 1000 * 1000);

                return round($seedRate,2);
                
            }elseif($crop_choice == 'Groundnut'){
                
            }elseif($crop_choice == 'Coffee'){
                $spacing = 1.5*2; 

                $seedRate = ($farm_area)/($spacing);

                return round($seedRate,2);
                
            }elseif($crop_choice == 'Peas'){
                $spacing = 0.6*0.1; 
                $twg = 500;

                $seedRate = ($farm_area * $twg * 100 * 100)/($spacing * 98 * 75 * 1000 * 1000);

                return round($seedRate,2);
            }
            
        }
       
        $estimations = seed_rate_calculation($area,$crop);
   
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Recommendation</title>
    <link rel="icon" type="image/ico" href="img/favicon.png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    </style>
</head>
<body>
<?php
include('includes/topNav.php');
?>

<form method='post'>
    <table class="table">
        <tr>
            <td>
            <div class="form-group">
            <label for="Farm Area">Farm Area In m<sup>2</sup></label>
            <input type="text" name='area' class="form-control" pattern="[0-9.]*" title="Only numbers and dot are allowed" required>
            </div>
            </td>
            <td>
            <div class="form-group">
            <label for="crop">Crop</label>
            <select name="crop" class="form-control" required>
                <option value="Maize">Maize</option>
                <option value="Beans">Beans</option>
                <option value="Soybeans">Soybeans</option>
                <option value="Groundnut">Groundnut</option>
                <option value="Coffee">Coffee</option>
                <option value="Peas">Peas</option>

            </select>
            </div>
            </td>
        </tr>
        
      
       

    </table>

  <button type="submit" class="btn btn-default">Calculate</button>
</form>
<?php
if(!empty($estimations)){

?>
<div id="predictionStatement" class="typing-container" style="color:white; margin-top: 20px; "></div>

<script>
var predictionStatement = "<?php echo $estimations; ?> KGs";
var container = document.getElementById("predictionStatement");
function displayPredictionStatement() {
            var index = 0;
            var interval = setInterval(function() {
                if (index <= predictionStatement.length) {
                    container.textContent = predictionStatement.slice(0, index++);
                } else {
                    clearInterval(interval);
                }
            }, 100); // Adjust the animation speed here (milliseconds per character)
        }

        // Call the function to display the prediction statement
        displayPredictionStatement();
</script>
    <?php
}
?>

</body>
</html>