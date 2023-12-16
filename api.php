<?php
include './session.php';
include './config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'POST') {
    $level = $_POST['level'];
    $file = $_POST['file'];
    $answer = $_POST['answer'];
    $description = $_POST['description'];
    // echo $level;
    // echo $file;
    // echo $answer;
    // echo $description;
    // echo "from post";
    $sql = "INSERT INTO games (level, file, answer, description) VALUES ('$level', '$file', '$answer', '$description')";
    $conn->query($sql) or die("insert failed!");

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'PUT') {
    $level = $_POST['level'];
    $file = $_POST['file'];
    $answer = $_POST['answer'];
    $description = $_POST['description'];
    // echo $level;
    // echo $file;
    // echo $answer;
    // echo $description;
    // echo "from put";
    $sql = "UPDATE games SET level = '$level', file = '$file', answer = '$answer', description = '$description' WHERE level = $level";
    $conn->query($sql) or die("update failed!");

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'DELETE') {
    $level = $_POST['level'];
    $sql = "DELETE FROM games WHERE level = $level";
    $conn->query($sql) or die('delete failed!');
}
?>
