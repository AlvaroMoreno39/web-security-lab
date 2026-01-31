<?php
$conn = new mysqli("localhost", "weblab_user", "weblab_pass", "weblab");

$user = $_GET['username'];
$pass = $_GET['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();
echo "<pre>$sql</pre>";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="GET">
  <input type="text" name="username" placeholder="Username"><br><br>
  <input type="text" name="password" placeholder="Password"><br><br>
  <button type="submit">Login</button>
</form>

<?php
if ($result && $result->num_rows > 0) {
  echo "<p>Login successful!</p>";
} else {
  echo "<p>Login failed.</p>";
}
?>

</body>
</html>
