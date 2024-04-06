<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$cat_slug = strtolower(str_replace(' ', '-', $name));
		try{
			$stmt = $conn->prepare("UPDATE category SET name=:name, cat_slug=:cat_slug WHERE id=:id");
			$stmt->execute(['name'=>$name, 'cat_slug' => $cat_slug, 'id'=>$id]);
			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: category.php');

?>