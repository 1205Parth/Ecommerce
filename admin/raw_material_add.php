
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM row_material WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Raw-material already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO row_material (name) VALUES (:name)");
				$stmt->execute(['name'=>$name,]);
				$_SESSION['success'] = 'Raw-material added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up raw-material form first';
	}

	header('location: raw_material.php');

?>