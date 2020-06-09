<html>
<head>
	<title>DEMO SQL</title>
    <style>
body {
background-color: #dfa2f7;
margin-left: 20em ;
margin-top: 10em;
}
</style>

</head>
<body>

<?php 
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
  `user_id` INT NOT NULL ,
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
$query3 = "INSERT INTO User (name, email, phone_number, field, manger_id)
VALUES (5,'Zahra', 'zahra@gmail.com', 0532698746,'Test team' , 5 )";
        if ($conn->multi_query($query3) === TRUE) {
            print '<p>The entry has been Saved.</p>';
        } else {
			print '<p Noting to add </p>'. $conn->error;
        }

// Update data
        $query2 = "UPDATE User SET email='Email not avalibale' where field='Test team'";
      //  $query2 = "UPDATE User SET EMAIL='Email not avalibale' , field='Coding'";
		$r2 = mysqli_query($conn, $query2);
		// Report on the result:**
		if (mysqli_affected_rows($conn)) {
            print '<p> The blog entry has been updated.</p>';
        } else {
       
			print '<p Noting to update </p>'. $conn->error;
        }
    
//print data
        $query = 'SELECT * FROM User';
        if ($r = mysqli_query($conn, $query )) { 
            print "\n Print all records query:\n";
	    while ($row = mysqli_fetch_array($r)) {
        print "<p><h3>{$row['user_id']}    |    {$row['name']}    |    {$row['email']}     
        |    {$row['phone_number']}    |    {$row['field']}    |    {$row['manger_id']}  </h3>
		</p>\n";
         }
        } else { 
            print '<p>' . mysqli_error($conn) . '.</p><p>The query being run was: ' . $query . '</p>';
        } 
//**TODO**: print user infromation where their Manger id is 5. 





$conn->close();
?>
</body>
</html>