
// Password Toggle Function
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}

// Login Form Handler
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email && password) {
        console.log('Login attempt:', { email, password: '***' });
        alert('Login functionality would be implemented here!');
    }
});

// Google Login Function
function googleLogin() {
    console.log('Google OAuth login initiated');
    alert('Google OAuth integration would be implemented here!');
}

// Input Focus Effects
const inputs = document.querySelectorAll('.field-input');
inputs.forEach(input => {
    input.addEventListener('focus', function () {
        this.parentElement.style.transform = 'scale(1.01)';
    });

    input.addEventListener('blur', function () {
        this.parentElement.style.transform = 'scale(1)';
    });
});

// Handle window resize
window.addEventListener('resize', function () {
    // Adjust content if needed on resize
});
