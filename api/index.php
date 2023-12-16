<?php 
include ('../config.php');

$sql = "SELECT * FROM games";
$data = $conn->query($sql) or die('cannot load data.');

$mydata = array();

foreach ($data as $row) {
    $game = new stdClass();
    $game->id = $row['id'];
    $game->level = $row['level'];
    $game->file = $row['file'];
    $game->answer = $row['answer'];
    $game->description = $row['description'];

    $mydata[] = $game;
}

$myJSON = json_encode($mydata);
echo $myJSON;
?>
