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
                <p>player = <?php echo $_SESSION["player"]?>
                </p>
                <p>おけるパターン数<?php echo $_SESSION["canput_count"]?></p> 
                <form action="index.php" method="post">
                    <?php 
                        for($x=0; $x<6; $x++){
                            for($y=0; $y<6; $y++){
                                echo "<input type='hidden' name='array[]' value=" 
                                                .$_SESSION["array"][$x][$y]. ">";
                            }
                        }    
                    ?>
                    <input type="hidden" name="x" value="0">
                    <input type="hidden" name="y" value="0">
                    <input type="hidden" name="player" value=<?php echo $_SESSION["player"] ?>>
                    <input type="submit" value="中断データ取得">
                </form>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>