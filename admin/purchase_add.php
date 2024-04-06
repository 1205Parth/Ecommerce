
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
        
		$conn = $pdo->open();

        try{
            $stmt = $conn->prepare("INSERT INTO purchase (supplier_id, raw_material_id, quantity, price) VALUES (:supplier_id, :raw_material_id, :quantity, :price)");
            $stmt->execute(['supplier_id'=>$_POST['supplier_id'], 'raw_material_id'=>$_POST['raw_material_id'], 'quantity'=>$_POST['quantity'], 'price'=>$_POST['price'] ]);
            $_SESSION['success'] = 'Purchase added successfully';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up form first';
	}

	header('location: purchase.php');

?>