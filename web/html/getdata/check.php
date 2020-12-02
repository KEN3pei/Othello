<div class="container">
<div class="pt-2 mt-4 pb-5">
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
        <form action="../index.php" method="post">
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
</div>