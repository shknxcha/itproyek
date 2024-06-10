<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
</head>
<body>
    <h1>Create Account</h1>

    <form action="/akun/store" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="level">Level:</label>
        <input type="level" name="level" id="level" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>
