<?php
$name = $_GET['name'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>XSS Lab</title>
</head>
<body>

  <h1>Welcome</h1>

  <form method="GET">
    <input type="text" name="name" placeholder="Enter your name">
    <button type="submit">Send</button>
  </form>

<p>Hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>

</body>
</html