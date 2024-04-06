
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$adddress = $_POST['address'];
		$contact_number = $_POST['contact_number'];
        
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM suppliers WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Supplier already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO suppliers (name, address, contact_number) VALUES (:name, :address, :contact_number)");
				$stmt->execute(['name'=>$name, 'address'=>$address, 'contact_number'=>$contact_number ]);
				$_SESSION['success'] = 'Supplier added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up form first';
	}

	header('location: supplier.php');

?>