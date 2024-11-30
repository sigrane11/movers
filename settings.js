
// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})

// // Preview profile image
function previewImage(event) {
    const imagePreview = document.getElementById('profilePreview');
    const fileLabel = document.getElementById('fileLabel');
    const file = event.target.files[0];

    if (file) {
        imagePreview.src = URL.createObjectURL(file);
        fileLabel.textContent = file.name;
    }
}

// Form validation
function validateForm() {
    let valid = true;
    const nameField = document.getElementById('name');
    const emailField = document.getElementById('email');
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    
    nameError.style.display = 'none';
    emailError.style.display = 'none';

    if (!nameField.value) {
        nameError.style.display = 'block';
        valid = false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailField.value)) {
        emailError.style.display = 'block';
        valid = false;
    }

    return valid;
}

// Password update validation
function validatePasswordForm() {
    let valid = true;
    const currentPassword = document.getElementById('currentPassword');
    const newPassword = document.getElementById('newPassword');
    const confirmPassword = document.getElementById('confirmPassword');

    const currentPasswordError = document.getElementById('currentPasswordError');
    const newPasswordError = document.getElementById('newPasswordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');

    currentPasswordError.style.display = 'none';
    newPasswordError.style.display = 'none';
    confirmPasswordError.style.display = 'none';

    if (!currentPassword.value) {
        currentPasswordError.style.display = 'block';
        valid = false;
    }

    if (!newPassword.value) {
        newPasswordError.style.display = 'block';
        valid = false;
    }

    if (newPassword.value !== confirmPassword.value) {
        confirmPasswordError.style.display = 'block';
        valid = false;
    }

    return valid;
}

document.getElementById('editProfileForm').onsubmit = function(e) {
    e.preventDefault(); // Prevent form submission for demonstration

    // Here, you would typically handle the form data and save changes.

    showAlert('Your profile has been successfully updated.', 'success');
};

document.getElementById('deleteAccountForm').onsubmit = function(e) {
    e.preventDefault(); // Prevent form submission for demonstration
    showAlert('Your account has been successfully deleted.', 'success');
    // Here, you would typically handle the account deletion logic.
};

function showAlert(message, type) {
    const alertMessageDiv = document.getElementById('alertMessage');
    alertMessageDiv.textContent = message;
    alertMessageDiv.className = type === 'success' ? 'alert success' : 'alert error';
    alertMessageDiv.style.display = 'block';

    // Hide the alert after a few seconds
    setTimeout(() => {
        alertMessageDiv.style.display = 'none';
    }, 3000);
}

// document.getElementById('deleteAccountForm').onsubmit = function(e) {
//     e.preventDefault(); // Prevent form submission for demonstration
//     showAlert('Your account has been successfully deleted.', 'success');
//     // Here, you would typically handle the account deletion logic.
// };

// function showAlert(message, type) {
//     const alertMessageDiv = document.getElementById('alertMessage');
//     alertMessageDiv.textContent = message;
//     alertMessageDiv.className = type === 'success' ? 'alert success' : 'alert error';
//     alertMessageDiv.style.display = 'block';

//     // Hide the alert after a few seconds
//     setTimeout(() => {
//         alertMessageDiv.style.display = 'none';
//     }, 3000);
// }

// Listen for the file input change
document.getElementById('profileImage').addEventListener('change', previewImage);

// Handle form submissions for profile and password
document.querySelector('.edit-profile-form').addEventListener('submit', (e) => {
    if (!validateForm()) {
        e.preventDefault();
    }
});

document.querySelector('.update-password-form').addEventListener('submit', (e) => {
    if (!validatePasswordForm()) {
        e.preventDefault();
    }
});
