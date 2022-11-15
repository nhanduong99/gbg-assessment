<link rel="stylesheet" href="/public/css/index.css">
<form id="form-create-user" action="/" method="post">
    <div class="container">
        <h1>Create User</h1>
        <p>Please fill in this form to create an user.</p>
        <hr>

        <label for="username"><b>Username</b></label>
        <div class="error" id="error-username"><?php echo isset($errors) && isset($errors['username']) ? $errors['username'] : '' ?></div>
        <input type="text" placeholder="Enter Username" name="username" id="username" value="<?php echo $values['username'] ?? '' ?>">

        <label for="email"><b>Email</b></label>
        <div class="error" id="error-email"></div>
        <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $values['email'] ?? '' ?>">

        <label for="password"><b>Password</b></label>
        <div class="error" id="error-password"></div>
        <input type="password" placeholder="Enter Password" name="password" id="password">

        <label for="confirm_password"><b>Confirm Password</b></label>
        <div class="error" id="error-confirm_password"></div>
        <input type="password" placeholder="Enter Password Again" name="confirm_password" id="confirm_password">

        <label for="birthday"><b>Birthday</b></label>
        <div class="error" id="error-birthday"></div>
        <input type="date" placeholder="Enter Birthday" name="birthday" id="birthday" value="<?php echo $values['birthday'] ?? '' ?>">

        <label for="phone_number"><b>Phone Number</b></label>
        <div class="error" id="error-phone_number"></div>
        <input type="number" placeholder="Enter Phone Number" name="phone_number" id="phone_number" value="<?php echo $values['phone_number'] ?? '' ?>">

        <label for="url"><b>URL</b></label>
        <div class="error" id="error-url"></div>
        <input type="text" placeholder="Enter URL" name="url" id="url" value="<?php echo $values['url'] ?? '' ?>">

        <hr>
        <button type="button" class="create-user" onclick="createUser()">Create</button>
    </div>
</form>

<script type="text/javascript" src="/public/js/index.js"></script>