<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Project</title>
    
    
</head>
<style>
    *{
    margin:0;
    padding:0;
    box-sizing: border-box;
}
.container{
    max-width:80%;
    padding:34px;
    margin:auto;
}

.container h1, p{
    text-align: center;
}
p{
    font-size:16px;
}
input, textarea{
    width:80%;
    margin: 12px 0px;
    padding:7px;
    font-size:15px;
    border:2px solid black;
    border-radius:8px;
    outline:none;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
button{
    padding:8px 12px;
    font-size:20px;
    background-color:red;
    border:2px solid white;
    border-radius:10px;
}
.background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
  opacity: 0.3;
  min-height: -webkit-fill-available;
}
@media (max-width: 992px) {
  .container {
    max-width: 90%;
    padding: 20px;
  }

  input,
  textarea {
    width: 90%;
  }

  h1 {
    font-size: 24px;
  }

  p {
    font-size: 15px;
  }
}

@media (max-width: 768px) {
  .container {
    max-width: 95%;
    padding: 16px;
  }

  h1 {
    font-size: 22px;
  }

  p {
    font-size: 14px;
  }

  input,
  textarea {
    width: 100%;
    font-size: 14px;
  }

  button {
    width: 100%;
    font-size: 16px;
    padding: 10px;
  }

  .background {
    height: auto;
    opacity: 0.3;
  }
}

</style>
<body>

<?php
$submit = false;
if (isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "us_trip";
    

    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con){
        die("failed connection: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $detail = $_POST['detail'];

    $sql = "INSERT INTO trip (name, age, gender, email, phone, other, date)
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$detail', current_timestamp())";

    if(mysqli_query($con, $sql)){
        $submit = true;
        
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    mysqli_close($con);
}
?>
     <img class="background" src="https://t3.ftcdn.net/jpg/07/80/95/16/360_F_780951672_cJzVeOxybkHkCkFDIOGUAlcq2ADIHVO7.jpg" alt="">
    <div class="container">
       
    <h1>Welcome to us trip form</h1>
    <p>Enter your details and submit the form to confirm participation in trip</p>
    <?php
    if($submit == true){
        echo '<p style="color:green; font-weight:bold;">Thanks for submiting your form, Enjoy your journey</p>';
    }
    ?>

    <form method="post">
        <input type="text" id="name" placeholder="Enter Your Name" name="name">
        <input type="text" id="age" name="age" placeholder="Enter Your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
        <input type="email" name="email" id="email" placeholder="Enter Your Email">
        <input type="number" name="phone" id="phone" placeholder="Enter Your Number">
        <textarea name="detail" id="detail" cols="30" rows="10" placeholder="Enter More Detail">
        </textarea>
        <button class="btn">Submit</button>
        
    </form>
    </div>

    <script src="style.js"></script>
    



</body> 
</html>