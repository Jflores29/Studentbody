<!DOCTYPE html>
<html>
<head>
    <Title>Student Body </Title>
</head>
<body>
<?php
//This file should connect to a mysql database return data based on a query
$servername = "locahost:3306"; //server name for SQL database
$username = "sbadmin"; //database username
$password = "W3@r3UB716!"; //password for database user

// Created a connection to the MYSQL Database.
// There also functions that can connect to Oracle or MSSQL as well
$db = "StudentBodyDB";
$dbconn = new mysqli($servername, $username, $password, $db);

//Check if connection was successful
if(!$dbconn){
    die("Connection failed: ". $dbconn->connect_error);
}
else{ 
    echo "Connection Success!";
}
$query = "Select * FROM Students ORDER BY GPA DESC LIMIT 10;";

$qresult = $dbconn->execute_query($query,$dbconn);// run the query

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
mysqli_close($dbconn); //Close the connection to the database 
?>

</body>
</html>
