<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM row_material WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Raw Material deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select material to delete first';
	}

	header('location: raw_material.php');
	
?>