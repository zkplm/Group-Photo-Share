<?php
    require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Login Test
    </title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="uid" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" required></td>
            </tr>
            <td>
                <td><input type="submit" value="Submit" name='login-submit'></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    require "footer.php";
?>