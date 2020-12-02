<header class="container mt-5" >
    <div class="set_get_form">
    <a href="/">topへ</a>
    <a href="delete_session.php">初期化</a>
    <?php if(empty($_SESSION['username'])){?>
        <a href="login_signup.php?info=login">login</a>
        <a href="login_signup.php?info=signup">signup</a>
    <?php }else{?>
        <form action="dbset.php" method="post" class="setform">
            <?php 
                for($x=0; $x<6; $x++){
                    for($y=0; $y<6; $y++){
                        echo "<input type='hidden' name='array[]' value=" 
                                        .$_SESSION["array"][$x][$y]. ">";
                    }
                }    
            ?>
            <input type="hidden" name="canput_count" value=<?php echo $_SESSION["canput_count"] ?>>
            <input type="hidden" name="player" value=<?php echo $_SESSION["player"] ?>>
            <input type="submit" value="中断">
        </form>
        <form action="getdata/dbget.php" method="post" class="getform">
            <input type="submit" value="中断データ取得">
        </form>
        <a href="login_signup.php?info=logout">logout</a>
    <?php }?>
    </div>
</header>