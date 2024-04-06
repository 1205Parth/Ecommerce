<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
        
        try{
			$stmt = $conn->prepare("UPDATE purchase SET supplier_id=:supplier_id, raw_material_id=:raw_material_id, quantity=:quantity, price=:price WHERE id=:id");
			$stmt->execute(['supplier_id'=>$_POST['supplier_id'], 'raw_material_id'=>$_POST['raw_material_id'], 'quantity'=>$_POST['quantity'], 'price'=>$_POST['price'], 'id'=>$id]);
			$_SESSION['success'] = 'Purchase detail updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: purchase.php');

?>