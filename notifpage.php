<?php
    require "header.php";
?>

<main>
    <div class="wrapper-main">
        <form action="notification.php" method="POST">
        <table>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "notifications");
            $uid = $_SESSION['uid'];
            $SELECT = "SELECT * FROM $uid";
            $result = mysqli_query($conn, $SELECT);

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>
                        <p>You were invited to join <b>".$row['notif']."</b> by ".$row['uid']."</p>
                        <div><button type='submit' name='accept-group' value='".$row['notif']."'>Accept</button></div>
                        <div><button type='submit' name='deny-group' value='".$row['notif']."'>Deny</button></div>
                      </td></tr>";
            }
            ?>
        </table>
        </form>
    </div>
</main>

<?php
    require "footer.php";
?>
