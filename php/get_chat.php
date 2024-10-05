<?php


session_start();
if(isset($_SESSION['user_id'])){
    include "config.php";
    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    // // Функция для записи логов запросов
    // function logRequest($message) {
    //     $file = 'request_log.txt'; // Файл для логов
    //     $time = date('Y-m-d H:i:s'); // Время запроса
    //     $logMessage = $time . ' - ' . $message . "\n"; 
    //     file_put_contents($file, $logMessage, FILE_APPEND); // Запись в файл
    // }

    // // Логируем каждый запрос
    // logRequest("Request from user_id: $outgoing_id to incoming_id: $incoming_id");

    // Проверка на наличие новых сообщений с возможностью ожидания
    $timeout = 30; // Максимальное время ожидания в секундах
    $elapsed_time = 0;
    $interval = 2; // Интервал ожидания между проверками новых сообщений в секундах

    while ($elapsed_time < $timeout) {
        // SQL-запрос для получения сообщений между пользователями
        $sql = "SELECT * FROM messages 
                LEFT JOIN user_form ON user_form.user_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) 
                ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);

        // Запрос для получения информации о получателе
        $sql3 = mysqli_query($conn, "SELECT * FROM user_form WHERE user_id = '$incoming_id'")
            or die('query failed');
        $row2 = mysqli_fetch_assoc($sql3);

        // Если найдены сообщения
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    // Обработка исходящего сообщения с изображением
                    if($row['msg'] == '' && $row['msg_img'] != ''){
                        $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p><img src="uploaded_img/'.$row['msg_img'].'" alt=""></p>
                            </div>
                        </div>';
                    } else { // Обработка исходящего текстового сообщения
                        $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'.$row['msg'].'</p>
                            </div>
                        </div>';
                    }
                } else {
                    // Обработка входящего сообщения с изображением
                    if($row['msg'] == '' && $row['msg_img'] != ''){
                        $output .= '<div class="chat incoming">
                            <img src="uploaded_img/'.$row2['img'].'" alt="">
                            <div class="details">
                                <p><img src="uploaded_img/'.$row['msg_img'].'" alt=""></p>
                            </div>
                        </div>';
                    } else { // Обработка входящего текстового сообщения
                        $output .= '<div class="chat incoming">
                            <img src="uploaded_img/'.$row2['img'].'" alt="">
                            <div class="details">
                                <p>'.$row['msg'].'</p>
                            </div>
                        </div>';
                    }
                }
            }
            // Если сообщения найдены, выходим из цикла и отправляем их клиенту
            break;
        } else {
            // Если новых сообщений нет, ждем перед следующей проверкой
            sleep($interval);
            $elapsed_time += $interval;
        }
    }

    // Если сообщений нет и тайм-аут истек
    if($output == "") {
        echo '';
    } else {
        echo $output;
    }
} else {
    header('location: login.php');
}







?>