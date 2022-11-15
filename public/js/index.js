function createUser(e) {
    let createUserForm = document.getElementById('form-create-user');

    // validate from client before send to server
/*
    Username – letters only (pass: gbggroup, fail: gbg_group12, gbg group).
    Email (pass: gbg@gbg-group.net, fail: gbg@group, gbg_group.net),
    Password: 8 chars min, 1 lowercase, 1 uppercase and 1 special sign at least.
                There is no need to encrypt the password.
    Birthday (pass: any date forma. Fail: 84/56/0.
    URL - valid URL structure (pass: gigsberg.com. Fail: gigsbergcom).
    Phone number – Number only and 10 chars (pass: 1111111111, fail: 111, a11).
*/
    [...document.getElementsByClassName('error')].forEach(function(e) {
        e.innerText = '';
    })
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;
    let birthday = document.getElementById('birthday').value;
    let phoneNumber = document.getElementById('phone_number').value;
    let url = document.getElementById('url').value;

    let isValidated = true;

    if (!/^[a-zA-Z]{1,100}$/.test(username)) {
        isValidated = false;
        document.getElementById('error-username').innerText = 'Username is invalid';
    }
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        isValidated = false;
        document.getElementById('error-email').innerText = 'Email is invalid';
    }
    if (!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,100}$/.test(password)) {
        isValidated = false;
        document.getElementById('error-password').innerText = 'Password is invalid';
    }
    if (password !== confirmPassword) {
        isValidated = false;
        document.getElementById('error-confirm_password').innerText = 'Confirm Password is invalid';
    }
    if (!/\d/.test(phoneNumber) || phoneNumber.length !== 10) {
        isValidated = false;
        document.getElementById('error-phone_number').innerText = 'Phone number is invalid';
    }
    if (!birthday) {
        isValidated = false;
        document.getElementById('error-birthday').innerText = 'Birthday is required';
    }
    if (!/^[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/.test(url)) {
        isValidated = false;
        document.getElementById('error-url').innerText = 'Url is invalid';
    }

    if (isValidated) {
        createUserForm.submit();
    }
}