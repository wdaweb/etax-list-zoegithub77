<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>各期發票清單_查詢</title>
</head>
  
<body>
<?php
    include_once ("./api/base.php");

if(!empty($_POST['year'])) {
    $year=$_POST['year'];
} else {
    $year=date("Y");
}
if(isset($_POST['submit'])) {
    $month=$_POST['submit'];
} else {
    $month="月";
}
?>
<form action="invoice_list.php" method="post">
    <table>
        <tr>
            <td colspan="3"><a href="index.html">回首頁</a></td>
            <td colspan="3"><?=$year."年&emsp;".$month;?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="1-2月"></td>
            <td><input type="submit" name="submit" value="3-4月"></td>
            <td><input type="submit" name="submit" value="5-6月"></td>
            <td><input type="submit" name="submit" value="7-8月"></td>
            <td><input type="submit" name="submit" value="9-10月"></td>
            <td><input type="submit" name="submit" value="11-12月"></td>
        </tr>
        <tr>
            <td colspan="4">發票號碼</td>
            <td colspan="2">金額</td>
        </tr>
        <tr>
            <td colspan="6">
            <div>
        <?php

            function showCount($year,$month) {
                global $pdo;
                $sqlCount="SELECT COUNT(*), SUM(`money`) FROM `invoice` WHERE `year`='$year' && `month_group`='$month'";
                $count=$pdo->query($sqlCount)->fetch();
                return $count;
            }

        if(isset($_POST['submit'])) {
            $month=["1-2月", "3-4月", "5-6月", "7-8月", "9-10月", "11-12月"];
            if($_POST['submit']==$month[0]) {
                showList($year,"1-2月");
                $counted=showCount($year,"1-2月");
            }
            if($_POST['submit']==$month[1]) {
                showList($year,"3-4月");
                $counted=showCount($year,"3-4月");
            }
            if($_POST['submit']==$month[2]) {
                showList($year,"5-6月");
                $counted=showCount($year,"5-6月");
            }
            if($_POST['submit']==$month[3]) {
                showList($year,"7-8月");
                $counted=showCount($year,"7-8月");
            }
            if($_POST['submit']==$month[4]) {
                showList($year,"9-10月");
                $counted=showCount($year,"9-10月");
            }
            if($_POST['submit']==$month[5]) {
                showList($year,"11-12月");
                $counted=showCount($year,"11-12月");
            }
        } else {
            $counted=["0", "0"];
        }
            
            function showList($year,$month) {
                global $pdo;
                $sql="SELECT * FROM `invoice` WHERE `year`='$year' && `month_group`='$month'";
                // echo $sql;
                $data=$pdo->query($sql)->fetchAll();
                foreach($data as $value) {
                    $num=$value[3];
                    $amt=$value[4]."<br>";
            ?>
            <?=$num."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$amt;?>
        <?php
            }
        }
        ?>
            </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">總共<?=$counted[0];?>張發票</td>
            <td colspan="2">總計NT:<?=$counted[1];?>元</td>

        </tr>
    </table>
</form>
</body>
</html>  