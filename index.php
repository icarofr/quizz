<?php
$quizz = file_get_contents("document.json");
$quizz = json_decode($quizz);

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
        <?php foreach ($quizz as $key => $value) {
            echo "<div class='question" . $key . "'><div class='f3 pv3'>Question " . intval($key + 1) . "</div>
            <div class='f5 mh7 tl pa2 ba bg-washed-red'>" . $quizz[$key]->question . "<br>
        <input type='radio' name='quizz" . $key . "'value=" . 1 . "> " . $quizz[$key]->reponses[0] . "<br>
        <input type='radio' name='quizz" . $key . "'value=" . 2 . "> " . $quizz[$key]->reponses[1] . "<br>
        <input type='radio' name='quizz" . $key . "'value=" . 3 . "> " . $quizz[$key]->reponses[2] . "<br>
        <input type='radio' name='quizz" . $key . "'value=" . 4 . "> " . $quizz[$key]->reponses[3] . "</div><br>";

            if ($key == count($quizz)-1) echo "<button type='submit' class='f6 link br-pill dim ph3 pv2 mb2 dib white bg-green'>
        Check answers!</button>";
            else {
                echo "<button type='button' class='f6 link br-pill dim ph3 pv2 mb2 dib white bg-dark-blue' 
        onclick='nextQuestion(" . intval($key + 1) . ")'>Next > </button></div>";
            }
        }
        echo "<div class='questionCounter' id='" .  count($quizz) . "'></div>";
        ?>
    </form>
    <script src="script.js"></script>
</body>

</html>