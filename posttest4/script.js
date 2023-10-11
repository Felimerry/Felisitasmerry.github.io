const toggleButton = document.getElementById('toggle-mode');
const showPopupButton = document.getElementById('show-popup');
const body = document.body;
const modal = document.getElementById('myModal');
const notificationModal = document.getElementById('notification-modal');
const closeModal = document.querySelector('.close');
const closeNotification = document.getElementById('close-notification');

toggleButton.addEventListener('click', () => {
    if (body.classList.contains('light-mode')) {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        toggleButton.textContent = 'Mode Terang';
        notificationModal.style.display = 'block';
    } else {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        toggleButton.textContent = 'Mode Gelap';
    }
});

showPopupButton.addEventListener('click', () => {
    modal.style.display = 'block';
});

closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});

closeNotification.addEventListener('click', () => {
    notificationModal.style.display = 'none';
});


