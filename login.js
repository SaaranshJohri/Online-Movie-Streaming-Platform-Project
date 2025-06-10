function validateForm() {
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    const phonePattern = /^\d{10}$/;

    if (username === "") {
        alert("Username is required.");
        return false;
    }

    if (email === "") {
        alert("Please enter a valid email address.");
        return false;
    }

    if (phone === "" || !phonePattern.test(phone)) {
        alert("Please enter a valid phone number (10 digits).");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}