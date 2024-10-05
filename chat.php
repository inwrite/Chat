<?php 
    include 'php/config.php';// including the database connection
    session_start();
    $user_id = $_SESSION['user_id'];

    $get_user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    if(!isset($user_id)){
        header('location: login.php');
    }

    $select = mysqli_query($conn, "SELECT * FROM user_form WHERE user_id = '$get_user_id' ");
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
    <title>chat area</title>
</head>
<body>
    <div class="container">
        <section class="chat-area">
            <header>
<div class="framer-1dbykho-container"><div style="position:relative;width:100%;height:100%;border-radius:0px"><div style="position:absolute;inset:0;z-index:1;backdrop-filter:blur(0.078125px);-webkit-backdrop-filter:blur(0.078125px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 12.5%, rgba(0, 0, 0, 1) 25%, rgba(0, 0, 0, 0) 37.5%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 12.5%, rgba(0, 0, 0, 1) 25%, rgba(0, 0, 0, 0) 37.5%);border-radius:0px;pointer-events:none"></div><div style="position:absolute;inset:0;z-index:2;backdrop-filter:blur(0.15625px);-webkit-backdrop-filter:blur(0.15625px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 12.5%, rgba(0, 0, 0, 1) 25%, rgba(0, 0, 0, 1) 37.5%, rgba(0, 0, 0, 0) 50%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 12.5%, rgba(0, 0, 0, 1) 25%, rgba(0, 0, 0, 1) 37.5%, rgba(0, 0, 0, 0) 50%);border-radius:0px;pointer-events:none"></div><div style="position:absolute;inset:0;z-index:3;backdrop-filter:blur(0.3125px);-webkit-backdrop-filter:blur(0.3125px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 1) 37.5%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 0) 62.5%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 1) 37.5%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 0) 62.5%);border-radius:0px;pointer-events:none"></div><div style="position:absolute;inset:0;z-index:4;backdrop-filter:blur(0.625px);-webkit-backdrop-filter:blur(0.625px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 37.5%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 62.5%, rgba(0, 0, 0, 0) 75%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 37.5%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 62.5%, rgba(0, 0, 0, 0) 75%);border-radius:0px;pointer-events:none"></div><div style="position:absolute;inset:0;z-index:5;backdrop-filter:blur(1.25px);-webkit-backdrop-filter:blur(1.25px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 1) 62.5%, rgba(0, 0, 0, 1) 75%, rgba(0, 0, 0, 0) 87.5%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 1) 62.5%, rgba(0, 0, 0, 1) 75%, rgba(0, 0, 0, 0) 87.5%);border-radius:0px;pointer-events:none"></div><div style="position:absolute;inset:0;z-index:6;backdrop-filter:blur(2.5px);-webkit-backdrop-filter:blur(2.5px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 62.5%, rgba(0, 0, 0, 1) 75%, rgba(0, 0, 0, 1) 87.5%, rgba(0, 0, 0, 0) 100%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 62.5%, rgba(0, 0, 0, 1) 75%, rgba(0, 0, 0, 1) 87.5%, rgba(0, 0, 0, 0) 100%);border-radius:0px;pointer-events:none"></div><div style="position:absolute;inset:0;z-index:7;backdrop-filter:blur(5px);-webkit-backdrop-filter:blur(5px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 1) 87.5%, rgba(0, 0, 0, 1) 100%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 1) 87.5%, rgba(0, 0, 0, 1) 100%);border-radius:0px;pointer-events:none"></div><div style="position:absolute;inset:0;z-index:8;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 87.5%, rgba(0, 0, 0, 1) 100%);-webkit-mask-image:linear-gradient(to bottom, rgba(0, 0, 0, 0) 87.5%, rgba(0, 0, 0, 1) 100%);border-radius:0px;pointer-events:none"></div></div></div>


                <!--<a href="home.php" class="back-icon"><img src="images/arrow.svg" alt=""></a>-->

                <a href="home.php" class="back-icon">                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-2xl"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.1918 8.90615C15.6381 8.45983 16.3618 8.45983 16.8081 8.90615L21.9509 14.049C22.3972 14.4953 22.3972 15.2189 21.9509 15.6652C21.5046 16.1116 20.781 16.1116 20.3347 15.6652L17.1428 12.4734V22.2857C17.1428 22.9169 16.6311 23.4286 15.9999 23.4286C15.3688 23.4286 14.8571 22.9169 14.8571 22.2857V12.4734L11.6652 15.6652C11.2189 16.1116 10.4953 16.1116 10.049 15.6652C9.60265 15.2189 9.60265 14.4953 10.049 14.049L15.1918 8.90615Z" fill="currentColor"></path></svg></a>
                <img src="uploaded_img/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['name'] ?></span>
                  <!--  <p><?php echo $row['status'] ?></p> -->
                    <p class="<?php echo ($row['status'] === 'Active Now') ? 'active_now' : ''; ?>">
                        <?php echo $row['status']; ?>
                    </p>
                </div>



            </header>
            <div class="chat-box">
                <!-- <div class="text">
                    <img src="uploaded_img/default-avatar.png" alt="">
                    <span>no message are available. once you send message will appear here.</span>
                </div> -->

                <!-- <div class="chat outgoing">
                    <div class="details">
                        <p>hi</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="uploaded_img/default-avatar.png" alt="">
                    <div class="details">
                        <p>hi</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="uploaded_img/default-avatar.png" alt="">
                    <div class="details">
                        <p><img src="uploaded_img/default-avatar.png" alt=""></p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p><img src="uploaded_img/default-avatar.png" alt=""></p>
                    </div>
                </div> -->
            </div>


            <form action="" class="typing-area" method="POST">
<div>
                <input type="text" name="incoming_id" value="<?php echo $get_user_id ?>" class="incoming_id" hidden>


                
                <input type="text" name="message" class="input-field" placeholder="type a message here....">

                <!--<button class="send_btn" name="send_btn"><img src="images/send.svg?v=<?php echo time(); ?>" alt=""></button>-->

<button class="send_btn" name="send_btn">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-2xl"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.1918 8.90615C15.6381 8.45983 16.3618 8.45983 16.8081 8.90615L21.9509 14.049C22.3972 14.4953 22.3972 15.2189 21.9509 15.6652C21.5046 16.1116 20.781 16.1116 20.3347 15.6652L17.1428 12.4734V22.2857C17.1428 22.9169 16.6311 23.4286 15.9999 23.4286C15.3688 23.4286 14.8571 22.9169 14.8571 22.2857V12.4734L11.6652 15.6652C11.2189 16.1116 10.4953 16.1116 10.049 15.6652C9.60265 15.2189 9.60265 14.4953 10.049 14.049L15.1918 8.90615Z" fill="currentColor"></path></svg>
</button>

                <!--<button class="image"><img src="images/camera.svg?v=<?php echo time(); ?>" alt=""></button>-->


<button class="image">
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M19.6667 7H12.3333C9.29912 7 7 9.32524 7 12V19C7 21.6748 9.29912 24 12.3333 24H19.6667C22.7009 24 25 21.6748 25 19V12C25 9.32524 22.7009 7 19.6667 7ZM12.3333 5C8.28325 5 5 8.13401 5 12V19C5 22.866 8.28324 26 12.3333 26H19.6667C23.7168 26 27 22.866 27 19V12C27 8.13401 23.7168 5 19.6667 5H12.3333ZM16.0016 18.3945C17.8208 18.3945 19.135 17.0095 19.135 15.4945C19.135 13.9796 17.8208 12.5945 16.0016 12.5945C14.1824 12.5945 12.8683 13.9796 12.8683 15.4945C12.8683 17.0095 14.1824 18.3945 16.0016 18.3945ZM16.0016 20.3945C18.8367 20.3945 21.135 18.2007 21.135 15.4945C21.135 12.7883 18.8367 10.5945 16.0016 10.5945C13.1666 10.5945 10.8683 12.7883 10.8683 15.4945C10.8683 18.2007 13.1666 20.3945 16.0016 20.3945ZM21.1333 12C21.9434 12 22.6 11.3732 22.6 10.6C22.6 9.8268 21.9434 9.2 21.1333 9.2C20.3233 9.2 19.6667 9.8268 19.6667 10.6C19.6667 11.3732 20.3233 12 21.1333 12Z" fill="currentColor"/>
</svg>
</svg>
</button>


                <input type="file" name="send_image" accept="image/*" class="upload_img" hidden>
</div>
            </form>
        </section>
    </div>

    <script src="js/chat.js?v=<?php echo time(); ?>"></script>


</body>
</html>