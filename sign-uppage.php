<?php
    require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Signup Test
    </title>
</head>
<body>
    <h1>Sign-up</h1>
    <form action="sign-up.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Repeat password: </td>
                <td><input type="password" name="passwordRepeat" required></td>
            </tr>
            <td>
                <td><input type="submit" value="Submit" name='signup-submit'></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    require "footer.php";
?>