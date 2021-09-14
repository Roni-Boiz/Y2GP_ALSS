<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome Home</h1>
    <?php
    if ($this->users->num_rows > 0) {
    // output data of each row
    while($row = $this->users->fetch_assoc()) {
      echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " Password: " . $row["password"]. " Type: " . $row["type"] . "<br>";
    }
    } else {
    echo "0 results";
    }
    ?>
    <a href="login">login</a>
</body>
</html>