<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validator</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(180deg, #00d2ff 0%, #3a47d5 100%);
        }
        .wrapper {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
        }
        .wrapper h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .wrapper input {
            width: 100%;
            height: 30px;
            text-align: center;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 12px;
        }
        .wrapper ul {
            list-style-type: none;
            padding: 0;
        }
        .green {
            color: green;
        }
        .red {
            color: red;
        }
        #message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            display: none; 
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>
<body>

<div class="wrapper">
    <h1>Password Validator</h1>
    <form onsubmit="return validateForm();">
        First name: <input type="text" name="firstname" id="firstname"><br>
        Last name: <input type="text" name="lastname" id="lastname"><br>
        Password: <input type="text" name="password" id="password"><br>
        <button type="submit">Check</button>
        <br>
        <br>
        <div id="message"></div>
        <!-- end message -->
    </form>
    <ul>
        <li id="containsFullName">Both first and last name are entered</li>
        <li id="eightCharacters">Password contains 8 characters</li>
        <li id="lowercase">Password contains at least 1 lowercase letter</li>
        <li id="uppercase">Password contains at least 1 uppercase letter</li>
    </ul>
</div>
<!-- end wrapper -->

<script>
    const validateForm = () => {
        const firstname = document.getElementById('firstname').value.trim();
        const lastname = document.getElementById('lastname').value.trim();
        const password = document.getElementById('password').value;

        // Reset validation messages and colors
        document.getElementById('eightCharacters').classList.remove('green', 'red');
        document.getElementById('lowercase').classList.remove('green', 'red');
        document.getElementById('uppercase').classList.remove('green', 'red');
        document.getElementById('containsFullName').classList.remove('green', 'red');

        // Check first and last name
        if (firstname !== '' && lastname !== '') {
        document.getElementById('containsFullName').classList.add('green');
        } else {
        document.getElementById('containsFullName').classList.add('red');
        }

        // Check 8 characters
        if (password.length >= 8) {
            document.getElementById('eightCharacters').classList.add('green');
        } else {
            document.getElementById('eightCharacters').classList.add('red');
        }

        // Check lowercase letter
        if (/[a-z]/.test(password)) {
            document.getElementById('lowercase').classList.add('green');
        } else {
            document.getElementById('lowercase').classList.add('red');
        }

        // Check uppercase letter
        if (/[A-Z]/.test(password)) {
            document.getElementById('uppercase').classList.add('green');
        } else {
            document.getElementById('uppercase').classList.add('red');
        }

        // Validation message
        const messageElement = document.getElementById('message');
        if (password.length >= 8 && /[a-z]/.test(password) && /[A-Z]/.test(password) && firstname !== '' && lastname !== '') {
            messageElement.classList.remove('red');
            messageElement.classList.add('green');
            messageElement.innerHTML = '<span style="color: green;">&#x2713;</span> All criteria are met. Form is valid!';
        } else {
            messageElement.classList.remove('green');
            messageElement.classList.add('red');
            messageElement.innerHTML = '<span style="color: red;">&#x2717;</span> Form is not valid. Please check the criteria.';
        }

        // Show the message
        messageElement.style.display = 'block';

        return false; // Prevent form submission
    };
</script>
</body>
</html>