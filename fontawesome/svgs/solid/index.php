<?php
use PhpSolutions\Thumbnail;
 require './includes/header.php';
require 'PDO.php';
$pdo=new DAO('localhost', 'training', 'root', '');
define('SHOWMAX', 2);
$totalRows=$pdo->getrowcount('images');
$curPage = (isset($_GET['curPage'])) ? (int) $_GET['curPage'] : 0;
$startRow=SHOWMAX * $curPage;
if($startRow > $totalRows || $curPage<0 || $curPage > ($totalRows / SHOWMAX)){
    $startRow = 0;
    $curPage = 0;
}
?>
<div class="content">
<h1> Hi dear, Welcome to the <span class="highlighted">Moroccan</span> culture.</h1>

<?php 
$start=$startRow+1;
echo "<p class='success'> showing ". $start." to ";
if($startRow + SHOWMAX < $totalRows){
    echo $startRow+SHOWMAX;
}else{
    echo $totalRows;
}
echo " of $totalRows </p>";
?>
</div>


<table>

<?php 

$data=$pdo->fetchData('images Limit '.$startRow.', '.SHOWMAX);

foreach($data as $line){
    echo "<tr>";
    foreach($line as $key => $val){
        if($key=="fname"){
            echo "<td><img width='60%' src='./images/$val'/></td>";
        }else if($key=="id"){
            echo "<td></td>";
        }else{
    echo "<td>".$val."</td>";}
    }
    echo "</tr>";
}
echo "<tr><td>";
if($curPage>0){
    $cur=$curPage-1;
    echo "<a href='index.php?curPage=$cur'> Previous</a>";
}
if($startRow + SHOWMAX < $totalRows){
    $cur=$curPage+1;
    echo "</td><td></td><td><a href='index.php?curPage=$cur'> Next</a>";
}

    echo "</tr></td>";
    echo "</table>";
require './includes/footer.php';
?>
