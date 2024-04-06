<?php
	include 'includes/session.php';
	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$discription = $_POST['discription '];
		
    

	$conn=$pdo->open();

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cms WHERE name=:name");
    $stmt->execute(['name'=>$name]);
    $row = $stmt->fetch();

    
		if($row['numrows'] > 0){
			$_SESSION['error'] = '  already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO cms (name,discription) VALUES (:name,:discription)");
				$stmt->execute(['name'=>$name,'discription'=>$discription]);
				$_SESSION['success'] = 'About added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}


    $conn=$pdo->close();
	}
?>