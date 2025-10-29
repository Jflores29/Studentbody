
<html>
<head>
    <Title>Student Body </Title>
</head>
<body>
<?php
//This file should connect to

$servername = "locahost"; //server name for SQL database
$username = "sbadmin"; //database username
$password = "W3@r3UB716!"; //password for database user

// Created a connection to the MYSQL Database.
// There also functions that can connect to Oracle or MSSQL as well
$dbconn = new mysqli($servername, $username, $password);


//Check if connection was successful
if($dbconn->connect_error){
    die("Connection failed: ". $dbconn->connect_error);
}

$query = "Select TOP 10 FROM Students ORDER BY GPA DESC";

$qresult = $dbconn->query($query);// run the query

//Check if there any rows from the query result and output the results
if ($qresult->num_rows > 0){
    //output data of each row into a table
    echo "<table> <tr><th>First Name</th><th>Last Name</th><th>Major</th><th>GPA</th><th>Student ID</th></tr>";
    while($row = $qresult->fetch_assoc()){
        echo "<tr><td>".$row['FNAME']."</td><td>".$row['LNAME']."</td><td>".$row['MAJOR']."</td><td>".$row['GPA']."</td><td>" .$row['STUDENTID']."</td><td>";
    }
    echo "</table>";
}
else{
    echo "No Students in your Student Body database!";
}
$dbconn->close(); //Close the connection to the database
?>

</body>
</html>