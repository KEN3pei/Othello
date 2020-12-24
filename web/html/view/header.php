<header class="container mt-5" >
    <div class="set_get_form">
    <a href="/index.php">topへ</a>
    <a href="delete_session.php?link=reset">初期化</a>
    <?php if(empty($_SESSION['username'])){?>
        <a href="login_signup.php?info=login">login</a>
        <a href="login_signup.php?info=signup">signup</a>
    <?php }else{?>
        <a href="dbset.php">中断</a>
        <form action="getdata/dbget.php" method="post" class="getform">
            <input type="hidden" name="id" value=<?= $_SESSION["id"] ?>>
            <input type="submit" value="中断データ取得">
        </form>
        <a href="logout.php?=logout">logout</a>
    <?php }?>
    </div>
</header>