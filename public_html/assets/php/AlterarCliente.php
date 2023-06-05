<?php
    $Nome = htmlspecialchars($_GET['Nome']);
    $CPF = htmlspecialchars($_GET['CPF']);
    $Telefone = htmlspecialchars($_GET['Telefone']);
    $Email = htmlspecialchars($_GET['Email']);
    $senha = md5(htmlspecialchars($_GET['Senha']));
$host="localhost";
$user="id20492584_myresults_bdadm";
$pass="R]>k{wx{6d\HMT|#";
$dbname="id20492584_myresults_bd";
$connection = mysqli_connect($host,$user,$pass,$dbname) or die (mysql_errno().": ".mysql_error()."<BR>");
$query = "UPDATE `Clientes`set `Nome`='".$Nome."',`CPF`='".$CPF."',`Telefone`='".$Telefone."',`Email`='".$Email.",`Senha`='".$senha."'";
echo $query;
mysqli_query ($connection,$query) or die ('Erro ao salvar');
?>