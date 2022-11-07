<?php
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="concessionaria";
	
	//CREATE CONNECTION
	$conn=new mysqli($servername,$username,$password,$dbname);
	
	//CHECK CONNECTION
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}
	
	$sql = "INSERT INTO veiculos(nome,marca) VALUES('city','honda')";
	
	if($conn->query($sql) === TRUE) {
		echo "Dados gravados";
	} else{
		echo "Error: " . $sql . "<br>" . $conn ->error;
	}
	
	$conn->close();
	?>
