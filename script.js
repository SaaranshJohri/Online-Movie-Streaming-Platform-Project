function validateForm() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (username == "" || password == "") {
        alert("Both fields are required.");
        return false;
    }

    alert("Login successful!");
    return true;
}
