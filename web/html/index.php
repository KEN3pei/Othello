<?php
session_start();
require_once "api.php";

$api = new Api;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(validate()){
        //apiクラスメソッドからの返り値でarrayとplayerを表示する
        $x = htmlentities($_POST['x']);
        $y = htmlentities($_POST['y']);
        $player = $_POST['player'];
        $array = array_chunk($_POST['array'],6);
        list($_SESSION['array'], $_SESSION["player"], $_SESSION["canput_count"]) = $api->getArrayPlayer($x, $y, $array, $player);
    }else{
        $_SESSION["array"] = array_chunk($_POST['array'],6);
        $_SESSION["player"] = $_POST['player'];
    }
}else{
    if(!isset($_SESSION["array"])){
        $_SESSION["array"] = initial_value();
    }
    if(!isset($_SESSION["player"])){
        $_SESSION["player"] = "1";
    }
    if(!isset($_SESSION["canput_count"])){
        $_SESSION["canput_count"] = "4";
    }
}

function initial_value() {
    $h = 4;
    $w = 4;

    for ($i = 0; $i < $h+2; $i++){
        for ($v = 0; $v < $w+2; $v++){
            $array[$i][$v] =  "-1";
        }
    }
    for ($y = 1; $y <= $h; $y++){
        for ($x = 1; $x <= $w; $x++){
            $array[$y][$x] = " 0";
        }
    }
    $array[$h/2][$w/2] = $array[($h/2)+1][($w/2)+1] = " 2";
    $array[$h/2][($w/2)+1] = $array[($h/2)+1][$w/2] = " 1";
    return $array;
}
function validate(){
    $input['x'] = filter_input(INPUT_POST, 'x', FILTER_VALIDATE_INT);
    if(is_null($input['x']) || ($input['x'] === false)){
        echo "x is validated";
        return false;
    }
    $input['y'] = filter_input(INPUT_POST, 'y', FILTER_VALIDATE_INT);
    if(is_null($input['y']) || ($input['y'] === false)){
        echo "y is validated";
        return false;
    }
    return true;
}

?>
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
                <?php if(!$api->finish($_SESSION["array"])){ ?>
                    <p>player<?php echo $_SESSION["player"]?></p>
                    <p>おけるパターン数<?php echo $_SESSION["canput_count"]?></p> 
                    <?php if($_SESSION["canput_count"] == "0"){?>
                        <p>おけるところがないので適当な数字をセットして次のプレイヤーへ</p>
                    <?php }?>   
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