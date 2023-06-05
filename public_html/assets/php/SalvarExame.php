<?php
session_start();

if (isset($_SESSION["EMAIL"])) {
  include_once('config.php');
  $sql = "SELECT * FROM Exames WHERE Email in ( SELECT Email FROM Clientes WHERE Email = '" . $_SESSION["EMAIL"] . "')";
  $result2 = $conexao->query($sql);
  $result2 = mysqli_query($conexao, $sql) or die('Erro ao salvar');
  $logado = "nao";


  $Descricao = htmlspecialchars($_GET['Descricao']);
  $Link = htmlspecialchars($_GET['Link']);
  $host = "localhost";
  $user = "id20492584_myresults_bdadm";
  $pass = "R]>k{wx{6d\HMT|#";
  $dbname = "id20492584_myresults_bd";
  $connection = mysqli_connect($host, $user, $pass, $dbname) or die(mysql_errno() . ": " . mysql_error() . "<BR>");
  $query = "INSERT INTO `Exames`(`Descricao`,`Link`,`Email`) VALUES ('" . $Descricao . "','" . $Link . "','" . $_SESSION["Email"] . "')";
  echo $query;
  mysqli_query($connection, $query) or die('Erro ao salvar');
}
?>
<script>
  window.location = 'https://my--results.000webhostapp.com/assets/php/paginaSucesso.php?Email=<?php echo $_SESSION["Email"] ?>';
  alert('Salvo com sucesso.');
</script>