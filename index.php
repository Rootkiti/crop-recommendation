
<?php
$crop = '';
    // Check if POST data has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the POST data
        $n = $_POST["n"];
        $p = $_POST["p"];
        $k = $_POST["k"];
        $temp = $_POST["temp"];
        $hum = $_POST["hum"];
        $ph = $_POST["ph"];
        
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://127.0.0.1:8000/recommendMe',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "n": '.$n.',
    "p": '.$p.',
    "k": '.$k.',
    "temp": '.$temp.',
    "hum": '.$hum.',
    "ph": '.$ph.'
    }',
    CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response =  json_decode($response, true);
    $crop =  $response["Recommended Crop"];

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

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>

        
          /* Style for the animation */
          @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        /* CSS for the container */
        .typing-container {
            overflow: hidden;
            white-space: nowrap;
            animation: typing 5s steps(40, end);
            text-align: center;
            /* width: 50%;  */
            margin: 0 auto;
            font-size: 18px; /* Set font size */
            font-weight: bold;
        }
        body {
            background-color: #3B3B3D; /* Light gray background color */
          
        }

        /* Style for the form */
        form {
            margin-top: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white background */
        }

        /* Style for the form inputs */
        .form-group {
            margin-bottom: 20px;
        }

        /* Style for the submit button */
        .btn-default {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-default:hover {
            background-color: #0056b3;
        }
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
            <label for="Nitrogen">Nitrogen</label>
            <input type="text" name='n' class="form-control" pattern="[0-9.]*" title="Only numbers and dot are allowed" required>
            </div>
            </td>
            <td>
            <div class="form-group">
            <label for="phosphorus">phosphorus</label>
            <input type="text" name='p' class="form-control" pattern="[0-9.]*" title="Only numbers and dot are allowed" required>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-group">
            <label for="potassium">potassium</label>
            <input type="text" name='k' class="form-control" pattern="[0-9.]*" title="Only numbers and dot are allowed" required>
            </div>
            </td>
            <td>
            <div class="form-group">
            <label for="temperature">temperature</label>
            <input type="text" name='temp' class="form-control" pattern="[0-9.]*" title="Only numbers and dot are allowed" required>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="form-group">
            <label for="Humidity">Humidity</label>
            <input type="text" name='hum' class="form-control" pattern="[0-9.]*" title="Only numbers and dot are allowed" required>
            </div>
            </td>
            <td>
            <div class="form-group">
            <label for="Ph">Ph</label>
            <input type="text" name='ph' class="form-control" pattern="[0-9.]*" title="Only numbers and dot are allowed" required>
            </div>
            </td>
        </tr>
       

    </table>

  <button type="submit" class="btn btn-default">Send</button>
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