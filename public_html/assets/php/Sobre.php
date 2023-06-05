<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sobre</title>
  <link rel="icon" href="miniMR.png">
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    a {
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }

    a:hover {
      opacity: 0.7;
    }

    b {
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
      align-self: center;
      margin-top: 0.5vh;
    }

    .logo {
      font-size: 24px;
      text-transform: uppercase;
      letter-spacing: 4px;
    }

    .nome {
      font-size: 16px;
    }

    nav {
      display: flex;
      justify-content: space-around;
      align-items: center;
      font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
      background: #ff4445;
      height: 8vh;
    }

    body {
      background-image:url("orionBG.jpg");
    }
    
    main{
    color: white;
    }

    .nav-list {
      list-style: none;
      display: flex;
    }

    .nav-list li {
      letter-spacing: 3px;
      margin-left: 32px;
    }

    .mobile-menu {
      display: none;
      cursor: pointer;
    }

    .mobile-menu div {
      width: 32px;
      height: 2px;
      background: #fff;
      margin: 8px;
      transition: 0.3s;
    }

    @media (max-width: 999px) {
      body {
        overflow-x: hidden;
      }

      .nav-list {
        position: absolute;
        top: 8vh;
        right: 0;
        width: 50vw;
        height: 92vh;
        background: #ff4445;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        transform: translateX(100%);
        transition: transform 0.3s ease-in;
      }

      .nav-list li {
        margin-left: 0;
        opacity: 0;
      }

      .mobile-menu {
        display: block;
      }
    }

    .nav-list.active {
      transform: translateX(0);
    }

    @keyframes navLinkFade {
      from {
        opacity: 0;
        transform: translateX(50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .mobile-menu.active .line1 {
      transform: rotate(-45deg) translate(-8px, 8px);
    }

    .mobile-menu.active .line2 {
      opacity: 0;
    }

    .mobile-menu.active .line3 {
      transform: rotate(45deg) translate(-5px, -7px);
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <a class="nome">
        <?php


//print_r($_REQUEST);
//_SESSION['Email']="brunogabriel02@gmail.com";

include_once('config.php');
$Email = $_SESSION['Email'];
//$Email = $_GET['Email']; 
//echo $_SESSION['Email'];

//$Senha = md5($_POST['Senha']);

//print_r('Email: ' . $Email);
//print_r('<br>')
//print_r('Senha: ' . $Senha);

$sql = "SELECT * FROM Clientes WHERE Email = '$Email' ";
"SELECT * FROM Clientes WHERE Nome in ( SELECT Nome FROM Clientes WHERE Email = '".$_SESSION["EMAIL"]."')";
// WHERE Email = '$Email' and Senha = '$Senha'
//echo $sql;
$result = $conexao->query($sql);
$result = mysqli_query($conexao, $sql) or die('Erro ao salvar');
$logado = "nao";
while ($rowp = mysqli_fetch_assoc($result)) {
    echo $rowp["Nome"];
    $_SESSION["EMAIL"] = $rowp["Nome"];
    $logado = "sim";
    echo ", Seja Bem-Vindo.</br>";
}
//echo " Salvo " .$Email. " " .$Senha ;
if ($logado == "sim") {
    //echo " Está logado.</br>" ;
    $_SESSION["EMAIL"] = $Email;
    ?>

        <?php
} else {
    $_SESSION["EMAIL"] = "";
    ?>

        <?php

}

?>
      </a>
      <b class="logo"><img src="LogoMyResults.png" width="150vh" height="150vh" href="paginaSucesso.php"> </b>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a href="Exame.php">Exames</a></li>
        <li><a href="Mapas.php">Mapas</a></li>
        <li><a>Sobre</a></li>
      </ul>
    </nav>
  </header>
  <main> 
  <div>
      <h2>
      Esse site foi feito por Pedro, Pedro, Pedro e Bruno para o projeto integrador do 3° Semestre de Análise e Desenvolvimento de sistemas no Ceub
      </h2>
  </div>
  </main>
  <script>
    class MobileNavbar {
      constructor(mobileMenu, navList, navLinks) {
        this.mobileMenu = document.querySelector(mobileMenu);
        this.navList = document.querySelector(navList);
        this.navLinks = document.querySelectorAll(navLinks);
        this.activeClass = "active";

        this.handleClick = this.handleClick.bind(this);
      }

      animateLinks() {
        this.navLinks.forEach((link, index) => {
          link.style.animation
            ? (link.style.animation = "")
            : (link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3
              }s`);
        });
      }

      handleClick() {
        this.navList.classList.toggle(this.activeClass);
        this.mobileMenu.classList.toggle(this.activeClass);
        this.animateLinks();
      }

      addClickEvent() {
        this.mobileMenu.addEventListener("click", this.handleClick);
      }

      init() {
        if (this.mobileMenu) {
          this.addClickEvent();
        }
        return this;
      }
    }

    const mobileNavbar = new MobileNavbar(
      ".mobile-menu",
      ".nav-list",
      ".nav-list li",
    );
    mobileNavbar.init();
  </script>
</body>

</html>