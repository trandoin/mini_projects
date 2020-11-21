<!--  -->

 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatbox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];


$sql = "INSERT INTO logs (username, msg)
VALUES ('$uname', '$msg')";

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();

$sql = "SELECT id, username, msg FROM logs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["username"]. " : " . $row["msg"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();



?>