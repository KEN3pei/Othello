<?php
require_once "api.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(validate()){
        //apiクラスメソッドからの返り値でarrayとplayerを表示する
        $api = new Api;
        $array = array_chunk($_POST['array'],6);
        list($default, $def_player) = $api->getArrayPlayer($_POST['x'], $_POST['y'], $array, $_POST['player']);
        foreach($default as $value){
            foreach($value as $num){
                echo $num;
            }
            echo "<br/>";
        }
        // var_dump($_POST['array']);
        // var_dump($def_player);
    }else{
        $default = array_chunk($_POST['array'],6);
        $def_player = $_POST['player'];
    }
}else{
    $default = initial_value();
    $def_player = 1;
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
                <?php for($x=1; $x<=4; $x++){
                    print "<tr>";
                        for($y=1; $y<=4; $y++){
                            if($default[$x][$y] == 1){
                                print "<td>●</td>";
                            }elseif($default[$x][$y] == 2){
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
                <p>player<?php echo $def_player?></p>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <input type="text" name="x">
                    <input type="text" name="y">
                    <?php 
                    for($x=0; $x<6; $x++){
                        for($y=0; $y<6; $y++){
                            echo "<input type='hidden' name='array[]' value=" .$default[$x][$y]. ">";
                        }
                    }
                    
                    ?>
                    <input type="hidden" name="player" value=<?php echo $def_player ?>>
                    <input type="submit" value="セット">
                </form>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>