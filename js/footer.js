// Создаем элемент <style> для вставки стилей
var style = document.createElement('style');
style.innerHTML = `
    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        padding-left: .5rem;
        padding-right: .5rem;
        padding-bottom: .5rem;
        padding-top: .5rem;
        font-size: .75rem;
        line-height: 1rem;
        color: var(--text-secondary);
        background-color: var(--bg-body-up);
        min-height: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .footer a {
        color: var(--link-);
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    } 

    .footer + .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: var(--bg-body-up);
        backdrop-filter: blur(18px);
        align-items: center;
        justify-content: center;
    }
    
     .modal-content {
        margin: 0 auto;
        padding: 16px;
        max-width: 65ch;
        max-height: 90%;
        overflow: auto;
    }
    
    .modal .close {
        color: var(--text-error-);
        float: right;
        font-size: 28px;
        position: fixed;
        margin: 0;
        top: 0;
        right: 16px;
    }
    
    .modal .close:hover, .modal .close:focus {
        color: var(--text-primary);
        text-decoration: none;
        cursor: pointer;
    }
    
    .modal a.a-ava {
        position: relative;
        background-color: var(--link-bg);
        border-radius: 999px;
        display: inline-block;
        padding: 0px 34px 0px 8px;
    }

    .modal a.a-ava:hover {
        background-color: var(--link-bg-hover);
    }

    .modal a.a-ava video {
        width: 24px;
        height: 24px;
        position: relative;
        border-radius: 99px;
        top: 2px;
        position: absolute;
        right: 2px;
    }
    
    .modal a {
        color: var(--link-);
    }

    .modal a:hover {
        text-decoration: underline;
    }

    .modal p {
        margin-top: 1em;
    }
`;

// Добавляем созданный элемент <style> в <head> документа
document.head.appendChild(style);

// Создаем новый div элемент для footer
var footerDiv = document.createElement('div');

// Добавляем класс .footer
footerDiv.classList.add('footer');

// Добавляем текст и ссылку
footerDiv.innerHTML = 'Discover Anonymous Chat!&nbsp;<a href="#" id="link">Learn more about us</a>.';

// Вставляем див перед закрывающим тегом body
document.body.insertBefore(footerDiv, document.body.lastChild);

// Создаем новый div элемент для модального окна
var modalDiv = document.createElement('div');
modalDiv.classList.add('modal');
modalDiv.innerHTML = `
    <div class="modal-content">
        <span class="close">&times;</span>
        <p><strong>Anonymous Chat</strong> is a messaging application that guarantees complete anonymity. You can easily engage in conversations with other users without revealing your personal information.</p>
        <p>The application is developed and maintained by <a class="a-ava" href="https://netwebdev.github.io/" target="_blank" rel="noopener noreferrer">Mikhail
        <video width="100%" height="100%" autoplay loop muted playsinline>
            <source src="ava.mp4" type="video/mp4" />
        </video> </a>. It is built using PHP, JavaScript, and MySQL. This chat is easy to deploy on most hosting services and can be used both for communication within a small circle of people and for a wide audience.</p>
        <p>The project's source code is available on GitHub, allowing everyone to view, modify, and improve the application. It's an excellent choice for those who want to create their own anonymous community or study the code for educational purposes.</p>
        <p>Repository link:&nbsp;<a href="#" target="_blank">GitHub</a>.</p>
    </div>
`;

// Вставляем модальный див перед закрывающим тегом body
document.body.insertBefore(modalDiv, document.body.lastChild);

// Логика открытия/закрытия модального окна
var modal = document.querySelector('.modal');
var link = document.getElementById('link');
var closeButton = document.querySelector('.close');

// Открытие модального окна при клике на ссылку
link.onclick = function(event) {
    event.preventDefault();
    modal.style.display = "flex";
}

// Закрытие модального окна при клике на кнопку закрытия
closeButton.onclick = function() {
    modal.style.display = "none";
}

// Закрытие модального окна при клике вне модального контента
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}