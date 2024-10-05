<?php
    include 'php/config.php';// including the database connection
    session_start();
    if(isset($_POST['submit'])){ // if user click the submit btn

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        // declaring input

        // Убираем проверку на валидацию email
        if(true){ // Допустим любые email-адреса
                
            $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email' 
            AND password = '$password' ");// checking if user password or email is correct
                if(mysqli_num_rows($select) > 0){
                    $row = mysqli_fetch_assoc($select);
                    $status = 'Active Now';//user status

                    $update = mysqli_query($conn, "UPDATE user_form SET status = '$status' 
                                            WHERE user_id = '{$row['user_id']}' ");

                    if($update){
                        $_SESSION['user_id'] = $row['user_id'];
                        header('location: home.php');
                    }

                }else{
                    $alert[] = "incorrect password or email!";
                }
        }else{
            $alert[] = "$email is not a valid email!" ;
        }
    }
    if(isset($_SESSION['user_id'])){
        header("location: home.php");
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <title>Welcome back</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Welcome back</h3>
            <?php 
                if(isset($alert)){
                    foreach($alert as $alert){
                        echo '<div class="alert">'.$alert.'</div>';
                    }
                }
            ?>
            <span>Username</span>
            <input type="text" name="email" placeholder="" class="box" required>
            <span>Password</span>
            <input type="password" name="password" placeholder="" class="box" required>
            <input type="submit" name="submit" class="btn" value="start chatting">
            <p>Don't have an account? <a href="index.php">Register now</a></p>
        </form>
    </div>
</body>
</html>