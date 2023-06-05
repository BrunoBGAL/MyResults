<?php
session_start();

//print_r($_REQUEST);

if (isset($_GET['submit']) && !empty($_GET['Email']) && !empty($_GET['Senha'])) {
  include_once('config.php');
  $Email = $_GET['Email'];
  $Senha = md5($_GET['Senha']);

  //print_r('Email: ' . $Email);
//print_r('<br>')
//print_r('Senha: ' . $Senha);

  $sql = "SELECT * FROM Clientes WHERE Email = '$Email' and Senha = '$Senha'";
  echo $sql;
  $result = $conexao->query($sql);
  $result = mysqli_query($conexao, $sql) or die('Erro ao salvar');
  $logado = "nao";
  while ($rowp = mysqli_fetch_assoc($result)) {
    echo $rowp["Email"];
    $_SESSION["EMAIL"] = $rowp["Email"];
    $logado = "sim";
    //echo " Achou o cliente com senha correta.</br>";
  }
  echo " Salvo " . $Email . " " . $Senha;
  if ($logado == "sim") {
    echo " Está logado.</br>";
    $_SESSION["EMAIL"] = $Email;
    echo $_SESSION["EMAIL"];
    ?>
    <script>
      window.location = "paginaSucesso.php?Email=<?php echo $Email; ?>";
    </script>

    <?php
  } else {
    $_SESSION["EMAIL"] = "";
    ?>
    <script>
      alert('Senha ou login inválidos.');
      window.location = "https://my--results.000webhostapp.com/index.html";
    </script>

    <?php

  }
} else {
  echo " Usuário ou senha com erro.</br>";
  // header('Location: paginaSucesso.php');
  ?>
  <script>
    alert('Preencha todos os campos.');
    window.location = "https://my--results.000webhostapp.com/index.html";
  </script>

  <?php
}
?>