<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的發票清單</title>

</head>
<body>
    <?php
        include_once ("./api/base.php");
    ?>
    <div > 
        <div >
            <h2>發票清單</h2>
            <?php
            if(empty($_GET['month_group'])){
                $_GET['month_group'] ='';
            }
            if($_GET['month_group'] == "1-2月"){
                echo"<a href='invoice_list.php?month_group='1-2月''>1-2月</a></div>";
            }else{
                echo"<a href='invoice_list.php?month_group='1-2月''>1-2月</a></div>";
            }
            if($_GET['month_group'] == ''){
                echo "<a herf='invoice_list.php?month_group='3-4月''>3-4月</a></div>";
            }else{
                echo "<a herf='invoice_list.php?month_group='3-4月''>3-4月</a></div>";
            }
            if($_GET['month_group'] == ''){
                echo "<a herf='invoice_list.php?month_group='5-月''>月</a></div>";
            }else{
                echo 
            }
            if($_GET['month_group'] == ''){
                echo "<a herf='invoice_list.php?month_group='月''>月</a></div>";
            }else{
                echo 
            }
            if($_GET['month_group'] == ''){
                echo "<a herf='invoice_list.php?month_group='月''>月</a></div>";
            }else{
                echo 
            }
            if($_GET['month_group'] == ''){
                echo "<a herf='invoice_list.php?month_group='月''>月</a></div>";
            }else{
                echo 
            }
             ?>
             <div ><a href="index.html">回首頁</a></div>
        </div>
        <div > 
            
                    
                <?php
                    if(!empty($_GET['period'])){
                        $row=selectFA("deposited", $_GET['period']);
                        ?>
                        <div>本期發票</div>
                            <div style="overflow: auto; height: 450px;">
                                <table>
                                    <tr>
                                        <td>號碼</td>
                                        <td>金額</td>
                                        <td>編輯</td>
                                    </tr>
                        <?php
                        foreach($row as $invoice){
                            ?>
                            <tr>
                                <td><?=$invoice['Enum']?>-<?=$invoice['num']?></td>
                                <td><?=$invoice['expend']?></td>
                                <td><a class="edit" href="edit.php?period=<?=$_GET['period']?>&id=<?=$invoice['id']?>">修改</a>&nbsp&nbsp&nbsp<a class="edit" href="my_invoice.php?period=<?=$_GET['period']?>&del=<?=$invoice['id']?>">刪除</a></td>
                            </tr>
                            <?php
                            if(!empty($_GET['del'])){
                                del( "deposited", $_GET['del']);
                                // 重整頁面 0.01秒                    
                                header("location:http://localhost/invoice/my_invoice.php?period=" . $_GET['period']);
                            }
                            }
                            $sum= countIn( "deposited", $_GET['period']);
                        }else{
                            $sum['num']='';
                            ?>
                            
                            <?php
                        }
                    
                ?>
                </table>
            </div>
            <div>發票總數：<?= $sum['num']?></div>
        </div>
    </div>
</body>
</html>