<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="icon" type="image/x-icon" href="images/abouticon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>about us</h3>
        <p> <a href="home.php">HOME</a> / ABOUT </p>
    </div>

    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="images/about.png" alt="">
            </div>

            <div class="content">
                <h3>why choose us?</h3>
                <p>With a team of staff studying and working in a global environment,
                    having access to popular culture through many surveys,
                    we are confident to bring good experiences and beautiful and quality products highest volume on the
                    market.</p>
                <p>Put your trust in us and we won't let you down with our products</p>
                <a href="contact.php" class="btn">contact us</a>
            </div>

        </div>

    </section>

    <section class="reviews">

        <h1 class="title">client's reviews</h1>

        <div class="box-container">
            <div class="box-container">
                <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
                <div class="box">


                    <p> name : <span><?php echo $fetch_message['name']; ?></span> </p>
                    <p> number : <span><?php echo $fetch_message['number']; ?></span> </p>
                    <p> email : <span><?php echo $fetch_message['email']; ?></span> </p>
                    <p> message : <span><?php echo $fetch_message['message']; ?></span> </p>

                </div>
                <?php
      };
   }else{
      echo '<p class="empty">have no comment</p>';
   }
   ?>
            </div>


    </section>







    <?php include 'footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>