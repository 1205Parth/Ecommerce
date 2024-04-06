
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact Form </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'includes/navbar.php'; ?>

    <div class="container">
        <form>
            <h2> CONTACT US</h2>
            <input type="text" id="name" placeholder="Enter Your Name" required>
            <input type="email" id="email" placeholder="Enter Your Email" required>
            <input type="phone" id="phone" placeholder="Enter Your Phone Number" required>
            <textarea id="message" rows="4" placeholder="Message"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
    <!-- Contact form using HTML and CSS by raju_webdev -->
</body>
</html>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");
* {
  margin: 0px;
  padding: 0px;
  font-family: "Poppins", sans-serif;
}

.container {
/*   background-color: #eecbed; */
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
 
 
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

form {
  background-color: white;
  display: flex;
  flex-direction: column;
  padding: 2vw 4vw;
  width: 60%;
  max-width: 600px;
  border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
}

form h2 {
  text-align: center;
  color: #708090;
  font-size:35px;
  margin-bottom: 20px;
}

form input, textarea {
  border: 0;
  margin: 10px 0px;
  padding: 20px;
  outline: none;
  background: #f5f5f5;
  font-size: 16px;
  border-radius: 10px;
  resize: none;
}

form button {
  background: #708090;
  color: white;
  border: 1px solid white;
  padding: 15px;
  font-size: 1rem;
  outline: none;
  cursor: pointer;
  width: 100%;
  font-weight: bold;
  margin: 20px auto 0;
  border-radius: 30px;
  transition: all .5s ease-in;
}
</style>