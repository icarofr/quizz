<?php
$quizz = file_get_contents("document.json");
$quizz = json_decode($quizz);
$scoreCounter = 0;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz!</title>
    <link rel="stylesheet" type="text/css" href="tachyons.css">
    <script src="jquery.js"></script>
</head>

<body class="tc avenir">
    <div class='f1 pv5 white bg-blue'>Welcome to Quizz!</div>
    <form action="checkAnswers.php" method="POST">
        <div class='f3 pv3'>Your results</div>
        <div class='f5 mh7 tl pa2 ba bg-washed-red'>
            <?php foreach ($quizz as $key => $value) {
                if (!isset($_POST['quizz' . $key])) {
                    $_POST['quizz' . $key][0] = 99;
                }

                if (intval($quizz[$key]->solution) == intval($_POST["quizz" . $key][0])) {
                    $scoreCounter = $scoreCounter + 1;
                }
            }
            echo "<div class='f5'>You scored " . $scoreCounter . " out of " . count($quizz) . " points! ";
            if ($scoreCounter < count($quizz) / 3) {
                echo "Try harder next time.";
            } elseif ($scoreCounter < count($quizz) / 2) {
                echo "Keep trying!";
            } elseif ($scoreCounter >= count($quizz)) {
                echo "Congratulations!";
            } else {
                echo "Not bad!";
            } ?></div>
        </div>
        <br><a href='index.php'>
            <div class='f6 link br-pill dim ph3 pv2 mb2 dib white bg-red'>Click here to try again.</div>
        </a>
        <script src="script.js"></script>
</body>

</html>