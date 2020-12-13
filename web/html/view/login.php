<div class="container">
    <div class="pt-2 mt-4 pb-5">
        <div class="table">
        <?php if($errors) {?>
            <tr>
                <td>You Need to correct the following errors:</td>
                <td><ul>
                    <?php foreach($errors as $error){ ?>
                        <li><?= $form->encode($error)?></li>
                    <?php }?>
                </ul></td>
        <?php }?>
        </div>
        <div class="text-center">
            <?php if($info == 'login'){?>
                <h4 class="mb-4">Login</h4>
            <?php }else{?>
                <h4 class="mb-4">Sign Up</h4>
            <?php }?>
            <form action="<?php $_SERVER['PHP_SELF']?>" class="login-form" method="post">
                <p>name</p>
                <input type="text" name="name">
                <p>password</p>
                <input type="text" name="password"><br/>
                <input type="submit" name="submit" value="<?= $info ?>">
            </form>
        </div>
    </div>
</div>