<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];
		try{
			$stmt = $conn->prepare("UPDATE suppliers SET name=:name,address=:address,contact_number=:contact_number WHERE id=:id");
			$stmt->execute(['name'=>$name, 'address'=>$address,'contact_number'=>$contact_number, 'id'=>$id]);
			$_SESSION['success'] = 'Supplier updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit suppliers form first';
	}

	header('location: supplier.php');

?>