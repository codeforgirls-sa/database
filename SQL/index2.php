<html>
<head>
<title>DEMO SQL</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
<?php 

//DB infromation
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CodeForGirls";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS User  (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone_number` VARCHAR(45) NOT NULL,
  `field` VARCHAR(45) NOT NULL,
  `manger_id` INT NOT NULL,
  PRIMARY KEY (`user_id`))";
if ($conn->query($sql) === TRUE) {
    print "Table User created successfully </p>\n";
} else {
    print "Error creating table: " . $conn->error;
}

//Insert employee infromation to the database. 
        // $sql = "INSERT INTO User (name, email, phone_number, field, manger_id) VALUES ('Suad', 'Suad@gmail.com', 056668746,'Sup Manger ' , 5 );";
        // $sql .= "INSERT INTO User (name, email, phone_number, field, manger_id) VALUES ('Salma', 'Salma@gmail.com', 056668746,'Test team ' , 3 );";
        // $sql .= "INSERT INTO User (name, email, phone_number, field, manger_id) VALUES ('Zahra', 'zahra@gmail.com', 056668746,'design team ' , 2 );";
        // $sql .= "INSERT INTO User (name, email, phone_number, field, manger_id) VALUES ('Alia', 'Alia@gmail.com', 056668746,'Product team ' , 3);";
        // if ($conn->multi_query($sql) === TRUE) {
        //     print "New records created successfully";
        //         } else {
        //     print "Error: <br>" . $conn->error;
        //         }

// Update data
          $query = "UPDATE User SET manger_id=6 WHERE user_id < 12  ";
                    // Report on the result:**
                  if (mysqli_query($conn, $query)) {
                    print "<p> Record updated successfully </p>";
                    } else {
                      print "<p Error Updating record: " . $conn->error. "</p>";
                    }
            
    
//print all data 
 //**TODO**: print user infromation where their Manger id is 5. 
        $query = 'SELECT * FROM User ';  
        if ($r = mysqli_query($conn, $query )) { 
          ?>
            <table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone number</th>
      <th scope="col">Field</th>
      <th scope="col">Manger id</th>
    </tr>
  </thead>
  <?php 
	    while ($row = mysqli_fetch_array($r)) {
        ?>
   <tbody>
    <tr>
      <th scope="row"><?php echo $row['user_id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['phone_number'];?></td>
      <td><?php echo $row['field'];?></td>
      <td><?php echo $row['manger_id'];?></td>
    </tr>
</tbody>
<?php 
 print "</p>\n";
        }
        ?>
        </table>
        <?php 
        } else { 
          print "<p Error Cannot peint records : " . $conn->error. "</p>";
        } 
$conn->close();
?>
  </div>
</body>
</html>