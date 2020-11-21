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


$sql = "INSERT INTO logs (username, msg) VALUES ('$uname', '$msg' )";

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();

$sql = "SELECT id, username, msg,time FROM logs ORDER BY time";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " <ul class='message' style='list-style-type: none;padding-top: 10px; margin-left: -25px; '>
           <li><span style='font-size: 15px;font-weight: bold;'>".$row['username']."</span>&nbsp;&nbsp;".$row['time']. "<br>". $row['msg']."</li></ul> ";

  }
} else {
  echo "result";
}

$conn->close();



?>