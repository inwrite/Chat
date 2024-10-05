
//     const send_image = document.querySelector(".typing-area .image");
//     const image = document.querySelector(".typing-area .upload_img");
//     const form = document.querySelector(".typing-area");
//     const incoming_id = form.querySelector(".incoming_id").value;
//     const sendBtn = form.querySelector(".send_btn");
//     const inputField = form.querySelector(".input-field");
//     const chatBox = document.querySelector(".chat-box");

//     send_image.onclick = () => {
//         image.click();
//     };

//     form.onsubmit = (e) => {
//         e.preventDefault();
//     };

//     inputField.focus();
//     inputField.onkeyup = () => {
//         if (inputField.value != "") {
//             sendBtn.classList.add("active");
//         } else {
//             sendBtn.classList.remove("active");
//         }
//     };

//     image.oninput = () => {
//         if (image.value != "") {
//             sendBtn.classList.add("active");
//         } else {
//             sendBtn.classList.remove("active");
//         }
//     };

//     sendBtn.onclick = () => {
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "php/insert_chat.php", true);
//         xhr.onload = () => {
//             if (xhr.readyState === XMLHttpRequest.DONE) {
//                 if (xhr.status === 200) {
//                     inputField.value = "";
//                     image.value = "";
//                     scrollBottom();
//                     sendBtn.classList.remove("active");
//                 }
//             }
//         };
//         let formData = new FormData(form);
//         xhr.send(formData);
//     };

//     chatBox.onmouseenter = () => {
//         chatBox.classList.add("active");
//     };

//     chatBox.onmouseleave = () => {
//         chatBox.classList.remove("active");
//     };

//     function scrollBottom() {
//         chatBox.scrollTop = chatBox.scrollHeight;
//     }





// let waitTime = 2000; // Начальный интервал - 2 секунды

// function getMessages() {
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/get_chat.php", true);
//     xhr.onload = () => {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 let data = xhr.response;
//                 if (data.trim() !== '') {
//                     chatBox.innerHTML = data;
//                     if (!chatBox.classList.contains("active")) {
//                         scrollBottom();
//                     }
//                     waitTime = 20000; // Если сообщения есть, сбрасываем интервал
//                 } else {
//                     // Увеличиваем интервал, если нет новых сообщений
//                     waitTime = Math.min(waitTime + 10000, 100000); // Увеличиваем до максимума в 10 секунд
//                 }
//                 setTimeout(getMessages, waitTime);
//             }
//         }
//     };
//     xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
//     xhr.send("incoming_id=" + incoming_id);
// }

// getMessages();

    

















const send_image = document.querySelector(".typing-area .image");
const image = document.querySelector(".typing-area .upload_img");
const form = document.querySelector(".typing-area");
const incoming_id = form.querySelector(".incoming_id").value;
const sendBtn = form.querySelector(".send_btn");
const inputField = form.querySelector(".input-field");
const chatBox = document.querySelector(".chat-box");

send_image.onclick = () => {
    image.click();
};

form.onsubmit = (e) => {
    e.preventDefault();
};

inputField.focus();
inputField.onkeyup = () => {
    if (inputField.value != "") {
        sendBtn.classList.add("active");
    } else {
        sendBtn.classList.remove("active");
    }
};

image.oninput = () => {
    if (image.value != "") {
        sendBtn.classList.add("active");
    } else {
        sendBtn.classList.remove("active");
    }
};

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                image.value = "";
                scrollBottom();
                sendBtn.classList.remove("active");
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
};

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
};

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
};

function scrollBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Наблюдатель за изменениями в chatBox
const observer = new MutationObserver(mutations => {
    mutations.forEach(mutation => {
        mutation.addedNodes.forEach(node => {
            if (node.classList && node.classList.contains('chat')) {
                // Проверяем наличие div.details > p > img внутри div.chat
                const details = node.querySelector('.details');
                if (details && details.querySelector('p img')) {
                    node.classList.add('img-chat');
                }
            }
        });
    });
});

// Настраиваем наблюдатель за изменениями в chatBox
observer.observe(chatBox, { childList: true, subtree: true });

let waitTime = 2000; // Начальный интервал - 2 секунды

function getMessages() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data.trim() !== '') {
                    chatBox.innerHTML = data;
                    if (!chatBox.classList.contains("active")) {
                        scrollBottom();
                    }
                    waitTime = 2000; // Если сообщения есть, сбрасываем интервал
                } else {
                    // Увеличиваем интервал, если нет новых сообщений
                    waitTime = Math.min(waitTime + 10000, 1000); // Увеличиваем до максимума в 10 секунд
                }
                setTimeout(getMessages, waitTime);
            }
        }
    };
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id=" + incoming_id);
}

getMessages();
