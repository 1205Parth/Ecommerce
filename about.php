<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b><?= SITE_NAME ?></b></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT US</a></li>
          <li><a href="contact.php">CONTACT US</a></li>
          <li><a href="inquiry.php?page=inquiry">Inquiry</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                <li><a href='signup.php'>SIGNUP</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <section class="about-us">
    <div class="about">
      <img src="data:image/png;base64,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" class="pic">
      <div class="text">
        <h2>About Us</h2>
        <h5>Goti House</span></h5>
          <p>The Goti House is aimed at the thoughtful shopper who appreciates unique designs and high quality dresses you won't find anywhere else. We are always curating fresh new collections and looking for the next big thing that our customers love. We are proud to be the online clothing store you can count on for professional service and care.

          The Goti House is here to serve you, helping you find the perfect look for any occasion. We are provied choli,kurti,drees,sarara. We love what we do and our goal is to help our customers by offering them unique outfits and accessories that will make them stand out from the crowd</p>
      </div>
    </div>
  </section>
  <?php include 'includes/scripts.php'; ?>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.main-header
{
    background:#708090;
    color:white;
}

ul li a{
text-decoration:none;
color:white;
}

.about-us{
  height: 100vh;

  width: 100%;
  padding: 90px 0;
/*   background: #ddd; */
}
.pic{
  height: auto;
  width:  302px;
}
.about{
  width: 1130px;
  max-width: 85%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
}
.text{
  width: 540px;
}
.text h2{
  font-size: 80px;
  font-weight: 600;
  margin-bottom: 10px;

}
.text h5{
  font-size: 28px;
  font-weight: 500;
  margin-bottom: 20px;
}
span{
  color: #4070f4;
}
.text p{
  font-size: 18px;
  line-height: 25px;
  letter-spacing: 1px;
}
.data{
  margin-top: 30px;
}
.hire{
  font-size: 18px;
  background: #4070f4;
  color: #fff;
  text-decoration: none;
  border: none;
  padding: 8px 25px;
  border-radius: 6px;
  transition: 0.5s;
}
.hire:hover{
  background: #000;
  border: 1px solid #4070f4;
}
</style>