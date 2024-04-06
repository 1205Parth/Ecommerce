
<?php

include 'includes/session.php';

if(isset($_POST['send'])){
    $conn = $pdo->open();
    $name=$_POST['name'];
    $email=$_POST['email'];
    $question=$_POST['msg'];

    $stmt = $conn->prepare("INSERT INTO inquiry (name, email, question) VALUES (:name, :email, :question)");
    $stmt->execute(['name'=>$name, 'email' => $email, 'question' => $question]);
    $_SESSION['success'] = 'Inquiry added successfully';

    $pdo->close();
}


?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<p class="login-box-msg">Inquiry </p>

    	<form method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" placeholder="FullName"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email"  required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
              <div class="form-group has-feedback">
        		<textarea class="form-control" name="msg" placeholder="Message"  required></textarea>
      		</div>
         
          <hr>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="send">Submit</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>