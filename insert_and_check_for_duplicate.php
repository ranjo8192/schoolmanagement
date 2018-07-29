<?php
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$arr = array(array(
			emp_name => 'Ranjeet',
			emp_email => 'test@test.com',
			emp_phone => '9643515389'			
			),array(
			emp_name => 'saurabh',
			emp_email => 'saurabh@test.com',
			emp_phone => '9643515389'			
			),array(
			emp_name => 'Ranjeet',
			emp_email => 'test@test.com',
			emp_phone => '9643515389'			
			),array(
			emp_name => 'tada',
			emp_email => 'tada@test.com',
			emp_phone => '9643515389'			
			),array(
			emp_name => 'rsrfsf',
			emp_email => 'xcxcxc@test.com',
			emp_phone => '9643515389'			
			));
			
			//echo "<pre>"; print_r($arr); die;

foreach($arr as $mydata){
	
	$emp_email = $mydata['emp_email'];
	$emp_name = $mydata['emp_name'];
	$emp_phone = $mydata['emp_phone'];
	$table= "select emp_name,emp_email from emp_details where emp_name='$emp_name' AND emp_email='$emp_email'";
	$match = $conn->query($table);
	if($match->num_rows > 0){
	$sql ="UPDATE emp_details SET emp_name='$emp_email',emp_email ='$emp_email',emp_phone='$emp_phone'";	
	}else{	
	$sql ="INSERT INTO emp_details(emp_name,emp_email,emp_phone) values('$emp_email','$emp_name','$emp_phone')";
	}
	$result = $conn->query($sql);
	if($result == true){
	echo "Record updated successfully";
	} else{
		echo "Error:".$sql."<br>".$conn->error;
	}
	
}			
			
			
//$sql = "INSERT INTO emp_details(emp_name,emp_email,emp_phone) values('Ranjeet','test@test.com','9643515389')"; 
// $sql = "SELECT emp_name,emp_email FROM emp_details where emp_id= 'Ranjeet' AND emp_email = 'test@test.com'";
// $sqll = "CREATE TABLE all_data_emp(
		// emp_id int(11) ) " 
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
    // // output data of each row
	// /* fetch associative array */
    // while($row = $result->fetch_assoc()) {
        // echo "Employee Id: ". $row["emp_id"]. " -Employee Email: ". $row['emp_email']. "<br>";
    // }
// } else {
    // echo "0 results";
// }
	


//$sql = "INSERT INTO emp_details(emp_name,emp_email,emp_phone) values('Ranjeet','test@test.com','9643515389')";
//$result = $conn->query($sql);
//if ($result == ture) {
    //echo "New Record added successfully";
//} else {
    //echo "Error:".$sql."<br>".$conn->error;
	#$sql2 = "INSERT INTO emp_details(emp_name,emp_email,emp_phone) values('Ranjeet','test@test.com','9643515389') on duplicate key update emp_email='test@test.com';"
	#$result = $conn->query($sql2);
	#if($result == true){
	#echo "Record updated successfully";
	#} else{
	#	echo "Error:".$sql2."<br>".$conn->error;
	#}
//}

$conn->close();
?> 
