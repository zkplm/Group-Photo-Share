<?php
    require "header.php";
?>

<main>
    <div class="wrapper-main">
        <section class="section-default">
            <?php
                if(NULL==$_SESSION['uid'] || $_SESSION['uid'] == ""){
                    header('Location: loginpage.php');
                }
                else{
                    require "main.php";
                }
            ?>
        </section>
    </div>
</main>

<?php
    require "footer.php";
?>