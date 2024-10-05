<?php 
    include 'php/config.php';// including the database connection
    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location: login.php');
    }

    $select = mysqli_query($conn, "SELECT * FROM user_form WHERE user_id = '$user_id' ");
    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <title>Home page</title>
</head>
<body>
    <div class="container">
        <section class="users">
            <header class="profile">
                <div class="content">
                    <a href="update_profile.php"><img src="uploaded_img/<?php echo $row['img'] ?>" alt=""></a>
                    <div class="details">
                        <span><?php echo $row['name'] ?></span>
                        <!-- <p><?php echo $row['status'] ?></p> -->
                        <p class="<?php echo ($row['status'] === 'Active Now') ? 'active_now' : ''; ?>">
                            <?php echo $row['status']; ?>
                        </p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $user_id ?>" class="logout">Logout</a>
                
            </header>
            <form action="" method="post" class="search">
                <input type="text" name="search_box" placeholder="Enter name or email to search">
                <!--<button name="search_user"><img src="images/search.svg?v=<?php echo time(); ?>" alt=""></button>-->

<button name="search_user">
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M19 15C19 17.2091 17.2091 19 15 19C12.7909 19 11 17.2091 11 15C11 12.7909 12.7909 11 15 11C17.2091 11 19 12.7909 19 15ZM18.1237 20.1237C17.2138 20.6796 16.1443 21 15 21C11.6863 21 9 18.3137 9 15C9 11.6863 11.6863 9 15 9C18.3137 9 21 11.6863 21 15C21 16.4459 20.4886 17.7723 19.6367 18.8083L22.7071 21.8787C23.0976 22.2692 23.0976 22.9024 22.7071 23.2929C22.3166 23.6834 21.6834 23.6834 21.2929 23.2929L18.1237 20.1237Z" fill="currentColor"/>
</svg>
</button>


            </form>
            <div class="all_users">
                <!-- <a href="chat.php">
                    <div class="content">
                        <img src="uploaded_img/default-avatar.png" alt="">
                        <div class="details">
                            <span>Alfred Marshall</span>
                            <p>hello bro</p>
                        </div>
                    </div>
                    <div class="status-dot"></div>
                </a> -->
            </div>
        </section>
    </div>
    <script src="js/home.js?v=<?php echo time(); ?>"></script>
    <script src="js/footer.js?v=<?php echo time(); ?>"></script>
</body>
</html>