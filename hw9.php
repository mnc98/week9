<?php
require 'pdo.php';

class User

	function displayAll()
	{
		$sql = "select * from accounts";
		$results = runQuery($sql);
		if(count($results) > 0)
		{
			echo "<table border=\"1\">
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Birthday</th>
				<th>Password</th>
			</tr>";
			foreach ($results as $row) {
				echo "<tr>
						<td>".$row["id"]."</td>
						<td>".$row["email"]."</td>
						<td>".$row["fname"]."</td>
						<td>".$row["lname"]."</td>
						<td>".$row["phone"]."</td>
						<td>".$row["gender"]."</td>
						<td>".$row["birthday"]."</td>
						<td>".$row["password"]."</td>
					</tr>";
			}
			
		}
		else{
		    echo '0 results';
		}
	}
	function deleteUser($id)
	{	
		$this->id = $id;
		$sql = "delete from accounts where id = ".$this->id;
		$results = runQuery($sql);
	}
	function addUser($email, $fname, $lname, $phone, $birthday, $gender, $password)
	{
		$sql = "insert into accounts (email, fname, lname, phone, birthday, gender, password) values ('$email', 
		'$fname', '$lname', '$phone', '$birthday', '$gender', '$password')";
		$results = runQuery($sql);
	}
	function updateUser($id, $password)
	{
		$this->id = $id;
		$this->password = $password;
		$sql = "update accounts set password = ".$this->password." where id = ".$this->id;
		$results = runQuery($sql);
	}
}
$user1 = new User;
$user1->deleteUser(9);
$user1->addUser('jk123@njit.edu', 'John', 'Jameson', '9737651234', '1993-06-08', 'male', 'password123');
$user1->updateUser(11, '245690');
$user1->displayAll();
?>