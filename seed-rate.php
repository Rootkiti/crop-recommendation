

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
                <option value="Soyabeans">Soyabeans</option>
                <option value="Groundnut">Groundnut</option>
                <option value="Coffee">Coffee</option>
            </select>
            </div>
            </td>
        </tr>
        
      
       

    </table>

  <button type="submit" class="btn btn-default">Calculate</button>
</form>
<?php
if(!empty($crop)){
// Array containing 100 unique prediction statements
$predictionStatements = [
    "This soil is well-suited for cultivation, and it shows potential for growing $crop.",
    "Given the favorable conditions, $crop cultivation would thrive in this soil.",
    "$crop are suitable for cultivation in this soil, making it ideal for $crop farming.",
    "$crop could grow well in this soil, suggesting a promising environment for $crop cultivation.",
    "The soil conditions are conducive to farming, especially for $crop.",
    "$crop would flourish in this soil.",
    "$crop could be grown here, this soil indicates potential for $crop cultivation.",
    "$crop cultivation is recommended for this soil, given its characteristics.",
    "$crop would thrive in this soil, making it suitable for $crop cultivation.",
    "$crop are suitable for cultivation in this soil, suggesting favorable conditions for $crop farming.",
    "$crop could be cultivated in this soil, indicating potential for $crop cultivation.",
    "$crop could grow well in this soil, making it suitable for $crop cultivation.",
    "$crop are suitable for this soil, suggesting ideal conditions for $crop farming.",
    "$crop could thrive in this soil, indicating potential for $crop cultivation.",
    "$crop cultivation is recommended for this soil, given its characteristics.",
    "$crop could grow well in this soil, making it suitable for $crop cultivation.",
    "$crop are suitable for cultivation in this soil, suggesting favorable conditions for $crop farming.",
    "$crop could be cultivated in this soil, indicating potential for $crop cultivation.",
    "$crop could thrive in this soil, making it suitable for $crop cultivation.",
    "$crop are suitable for this soil, suggesting ideal conditions for $crop farming.",
    "$crop could grow well in this soil, indicating potential for $crop cultivation.",
    "$crop cultivation is recommended for this soil, given its characteristics.",
    "$crop could thrive in this soil, making it suitable for $crop cultivation.",
    "$crop are suitable for cultivation in this soil, suggesting favorable conditions for $crop farming.",
    "$crop could grow well in this soil, indicating potential for $crop cultivation.",     
    "$crop would thrive in this soil, making it suitable for $crop cultivation.",
    "$crop could grow well in this soil, indicating potential for lentil cultivation.",
    "$crop are suitable for cultivation in this soil, suggesting favorable conditions for $crop farming.",
    "$crop could be cultivated in this soil, indicating potential for eggplant cultivation.",
    "$crop could thrive in this soil, making it suitable for $crop cultivation.",
    "$crop are suitable for this soil, suggesting ideal conditions for $crop farming.",
    "$crop could be grown in this soil, indicating potential for $crop cultivation."
];
// Get a random index from the array
$randomIndex = array_rand($predictionStatements);

// Access the random prediction statement using the random index
$randomStatement = $predictionStatements[$randomIndex];

// Output the random prediction statement

// echo $randomStatement;
?>
<div id="predictionStatement" class="typing-container" style="color:white; margin-top: 20px; "></div>

<script>
var predictionStatement = "<?php echo $randomStatement; ?>";
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