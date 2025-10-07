// Password toggle functionality
function togglePassword() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}

// Password validation functionality
function validatePassword(password) {
    const requirements = {
        uppercase: /[A-Z]/.test(password),
        alphanumeric: /^[A-Za-z0-9]*$/.test(password),
        length: password.length >= 8
    };

    return requirements;
}

function updateRequirementStatus(elementId, isValid) {
    const element = document.getElementById(elementId);
    const icon = element.querySelector('i');

    if (isValid) {
        element.classList.add('valid');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-check');
    } else {
        element.classList.remove('valid');
        icon.classList.remove('fa-check');
        icon.classList.add('fa-times');
    }
}

function updateSubmitButton(allValid) {
    const submitBtn = document.getElementById('submitBtn');

    if (allValid) {
        submitBtn.classList.add('enabled');
        submitBtn.disabled = false;
    } else {
        submitBtn.classList.remove('enabled');
        submitBtn.disabled = true;
    }
}

// Real-time password validation
document.getElementById('password').addEventListener('input', function () {
    const password = this.value;
    const requirements = validatePassword(password);

    // Update each requirement status
    updateRequirementStatus('uppercase-req', requirements.uppercase);
    updateRequirementStatus('alphanumeric-req', requirements.alphanumeric);
    updateRequirementStatus('length-req', requirements.length);

    // Check if all requirements are met
    const allValid = requirements.uppercase && requirements.alphanumeric && requirements.length;
    updateSubmitButton(allValid);
});

// Google login placeholder
function googleLogin() {
    alert('Google login functionality would be implemented here');
}

// Form submission - FIXED VERSION
document.getElementById('loginForm').addEventListener('submit', function (e) {
    // Validate form before submission
    const password = document.getElementById('password').value;
    const requirements = validatePassword(password);
    const allValid = requirements.uppercase && requirements.alphanumeric && requirements.length;
    
    if (!allValid) {
        e.preventDefault();
        alert('Please ensure all password requirements are met');
        return;
    }
    
    // If validation passes, the form will submit normally via POST
    // No need to prevent default or redirect manually
    console.log('Login attempt submitted via POST');
});