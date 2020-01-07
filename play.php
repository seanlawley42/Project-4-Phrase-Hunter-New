<?php
session_start();


if(isset($_POST['start'])) {
   unset($_SESSION['selected']);
   unset($_SESSION['phrase']);
}
require "inc/Game.php";
require "inc/Phrase.php";


if (isset($_SESSION['selected']) && isset($_POST['key'])) {
    $_SESSION['selected'][] = $_POST['key'];
} else {
    $_SESSION['selected'] = [];
}

$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);
$_SESSION['phrase'] = $phrase->currentPhrase;
$game = new Game($phrase);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phrase Hunter: <br> Set Phrasers to Stun!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body style="background: black">
<div class="main-container">
<h3 class="header" style="color: yellow">Phrase Hunter: <br> Set Phrasers to Stun!</h3>
<?php
echo $game->gameOver();
?>
    <div id="banner" class="section">
        <?php
    echo $phrase->addPhrasetoDisplay();
    echo $game->displayKeyboard();
    echo $game->displayScore();
    ?>
    </div>
</div>

</body>
</html>
