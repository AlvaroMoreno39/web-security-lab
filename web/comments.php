<?php
$conn = new mysqli("localhost", "weblab_user", "weblab_pass", "weblab");

if ($conn->connect_error) {
  die("DB error");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $comment = $_POST['comment'];

  $stmt = $conn->prepare("INSERT INTO comments (content) VALUES (?)");
  $stmt->bind_param("s", $comment);
  $stmt->execute();

  header("Location: /comments.php");
  exit;

}

$result = $conn->query("SELECT content FROM comments");
if (!$result) { die("SELECT failed: " . $conn->error); }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Comments</title>
</head>
<body>

<h1>Comments</h1>

<form method="POST">
  <textarea name="comment" placeholder="Write a comment"></textarea><br><br>
  <button type="submit">Post</button>
</form>

<hr>

<?php
while ($row = $result->fetch_assoc()) {
  echo "<p>" . htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') . "</p>";
}
?>

</body>
</html>
