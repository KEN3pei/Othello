<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf-8"/>
    <title>オセロ</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
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
            <table>
            <tr><td>y\x</td><td>1</td><td>2</td><td>3</td><td>4</td></tr>
                <?php for($x=1; $x<=4; $x++){
                    print "<tr><td>$x</td>";
                        for($y=1; $y<=4; $y++){
                            if($_SESSION["array"][$x][$y] == 1){
                                print "<td>●</td>";
                            }elseif($_SESSION["array"][$x][$y] == 2){
                                print "<td>◯</td>"; 
                            }else{
                                print "<td>&nbsp;&nbsp;&nbsp;</td>";
                            }
                        }
                    print "</tr>";
                }?>
            </table>
            </div>
            <div class="text-center">
                <?php if(!$api->finish($_SESSION["array"])){ ?>
                    
                    <?php if($_SESSION["canput_count"] == 0){ ?>
                        <?php if(!$api->finish2($_SESSION["array"])){ ?>
                            <p>両者ともに置ける場所がなくなりました</p>
                            <p>ゲーム終了</p>
                        <?php return; }?>
                        <p>おけるパターン数が0なので適当な値を入力して次のplayerに飛ばしてください</p> 
                    <?php }?>  
                        <p>player<?php if($_SESSION["player"] == 1){
                                        echo $_SESSION["player"] . " = ●";
                                    }elseif($_SESSION["player"] == 2){
                                        echo $_SESSION["player"] . " = ◯";
                                    }?>
                        </p>
                        <p>おけるパターン数<?php echo $_SESSION["canput_count"]?></p> 
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                            <input type="text" name="x" placeholder="xを入力">
                            <input type="text" name="y" placeholder="yを入力">
                            <?php 
                            for($x=0; $x<6; $x++){
                                for($y=0; $y<6; $y++){
                                    echo "<input type='hidden' name='array[]' value=" .$_SESSION["array"][$x][$y]. ">";
                                }
                            }
                            
                            ?>
                            <input type="hidden" name="player" value=<?php echo $_SESSION["player"] ?>>
                            <input type="submit" value="セット">
                        </form>
                     
                <?php }else{?>
                    <p>ゲーム終了</p>
                <?php }?>   

            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>