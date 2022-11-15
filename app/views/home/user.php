<link rel="stylesheet" href="/public/css/table.css">
<link rel="stylesheet" href="/public/css/index.css">
<table>
    <caption>Users Data</caption>
    <thead>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($users) and count($users) > 0) {
        foreach ($users as $user) {
            echo "
                <tr>
                    <td onclick=\"getUserDetails('$user->username');\">$user->username</td>
                    <td>$user->email</td>
                    <td>
                        <button class='delete-user-btn' data-username='$user->username'>Delete</button>
                    </td>
                </tr>
            ";
        }
    }
    ?>
    </tbody>
</table>

<div id="popup-user-detail" style="display: none;">
    <div class="dialog-ovelay">
        <div class="dialog">
            <header class="flex">
                <h3> User's information </h3>
                <div class="dialog-close-button" onclick="$('#popup-user-detail').hide()">X</div>
            </header>
            <div class="dialog-msg">
                <label for="username"><b>Username</b></label>
                <input readonly type="text" id="username">

                <label for="email"><b>Email</b></label>
                <input readonly type="text" id="email">

                <label for="birthday"><b>Birthday</b></label>
                <input readonly type="date" id="birthday">

                <label for="phone_number"><b>Phone Number</b></label>
                <input readonly type="number" id="phone_number">

                <label for="url"><b>URL</b></label>
                <input readonly type="text" id="url">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/public/js/user.js"></script>
