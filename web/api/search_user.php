<?php
header('Content-Type: application/json; charset=UTF-8');

$conn = new mysqli("localhost", "weblab_user", "weblab_pass", "weblab");
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(["error" => "db connection failed"]);
  exit;
}

$q = $_GET['q'] ?? '';
$q = trim($q);

$stmt = $conn->prepare("SELECT id, username FROM users WHERE username LIKE CONCAT('%', ?, '%') LIMIT 10");
$stmt->bind_param("s", $q);
$stmt->execute();
$result = $stmt->get_result();

$rows = [];
while ($row = $result->fetch_assoc()) {
  $rows[] = $row;
}

echo json_encode(["results" => $rows]);
