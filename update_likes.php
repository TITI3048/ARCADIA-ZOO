<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arcadia_zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$cardId = $data['cardId'];
$likeCount = $data['likeCount'];

$sql = "UPDATE likes SET like_count = ? WHERE card_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $likeCount, $cardId);

$response = array();
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>