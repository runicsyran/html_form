// This file contains JavaScript code for client-side functionality, such as form validation and dynamic content updates.

document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (validateLogin(username, password)) {
                loginForm.submit();
            } else {
                alert('Please enter valid credentials.');
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('regUsername').value;
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (validateRegistration(username, password, confirmPassword)) {
                registerForm.submit();
            } else {
                alert('Please ensure all fields are valid.');
            }
        });
    }

    function validateLogin(username, password) {
        return username.length > 0 && password.length > 0;
    }

    function validateRegistration(username, password, confirmPassword) {
        return username.length > 0 && password.length > 0 && password === confirmPassword;
    }
});