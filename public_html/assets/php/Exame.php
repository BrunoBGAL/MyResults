<?php
session_start();
//print_r($_REQUEST);

if (isset($_SESSION["EMAIL"])) {
  include_once('config.php');
  //$Email = $_GET['Email'];
  //$Senha = md5($_GET['Senha']);

  //print_r('Email: ' . $Email);
  //print_r('<br>')
  //print_r('Senha: ' . $Senha);

  $sql = "SELECT * FROM Exames WHERE Email in ( SELECT Email FROM Clientes WHERE Email = '" . $_SESSION["EMAIL"] . "')";
  //echo $sql;
  $result2 = $conexao->query($sql);
  $result2 = mysqli_query($conexao, $sql) or die('Erro ao salvar');
  $logado = "nao";
?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Exames</title>
    <link rel="icon" href="miniMR.png">
    <style>
      :root {
        --primary-color: #a7002c;
      }

      .card-content-area {
        display: flex;
        flex-direction: column;
        padding: 10px 0;
      }

      .card-content-area .submit {
        width: 150px;
        height: 40px;
        background-color: #a7002c;
        border: none;
        color: #fff;
        align-self: center;
      }

      #Cadastrar {
        display: flex;
        justify-content: center;
        height: 100%;
      }

      .card-content-area .submit:hover {
        background-color: #850023;
        transition: 0.1s;
      }

      .fixarRodape {
        bottom: 0;
        position: fixed;
        width: 20%;
        text-align: center;
      }


      .card-header,
      .card-content label {
        color: #850023;
        opacity: 0.8;
        font-size: 15px;
      }

      .card-content-area {
        display: flex;
        flex-direction: column;
        padding: 10px 0;
      }

      .card-content-area input {
        margin-top: 10px;
        padding: 0 5px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #850023;
        outline: none;
        color: #850023;
      }
      .card1 {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border-radius: 0.25rem;
          
      }
      
      p {
  border: 1px solid black;
  width: 300px;
  text-align: center;
  margin: 0;
  padding: 4px;
  background-color:white;
}

.parent-div {
  display: flex;
  flex-direction: column;
  align-items: left;
  justify-content: center;
  gap: 5px;
}

      
        input {
        padding: 12px 10.48rem;
        border: 0;
        background-color: var(--primary-color);
        display: flex;
        text-align: center;
        font-size: 15px;
        opacity: 0.8;
        color: #fff;
        text-decoration: none;
      }

      button {
        padding: 12px 10.48rem;
        border: 0;
        background-color: var(--primary-color);
        display: flex;
        text-align: center;
        font-size: 15px;
        opacity: 0.8;
        color: #fff;
        text-decoration: none;
      }

      button:hover {
        background-color: #850023;
        transition: 0.1s;
      }
      .btn-primary {
    color: #fff;
    background-color: #a7002c;
    border-color: #a7002c;
      }

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

      .link {
        color: #000;
        text-decoration: none;
      }

      .logo {
        font-size: 24px;
        text-transform: uppercase;
        letter-spacing: 4px;
      }

      .nome {
        font-size: 16px;
        color:#fff;
      }

      nav {
        display: flex;
        justify-content: space-around;
        align-items: center;
        font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
        background: #ff4445;
        height: 8vh;
      }

      main {
        background: url("NavbarBG.jpg") no-repeat center center;
        background-size: cover;
        height: 92vh;
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
          color:#fff;
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
       td {
            border: 1px solid black;
           margin: auto;
  width: 60%;
  padding: 2px;
  text-align: center;
  background-color:#fff;
        }
          /*.table-container {
        margin: auto;
        width: 60%;
    }

    .table-cell {
        border: 1px solid black;
        padding: 2px;
        text-align: center;
        background-color: #fff;
        margin-left: auto;
        margin-right: auto;
    }

    .link {
        text-decoration: none;
    }*/
  
    </style>
  </head>

  <body>
    <header>
      <nav class="nome">
        <a>
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
          "SELECT * FROM Clientes WHERE Nome in ( SELECT Nome FROM Clientes WHERE Email = '" . $_SESSION["EMAIL"] . "')";
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
          <li><a href="#" style= "text-decoration: none">Exames</a></li>
          <li><a href="Mapas.php" style= "text-decoration: none">Mapas</a></li>
          <li><a href="Sobre.php" style= "text-decoration: none">Sobre</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <?php
      while ($rowp = mysqli_fetch_assoc($result2)) {
        // echo $rowp["Descricao"]."<br/>"; 
      ?>


         <div class="parent-div">
        <p>
        <a href="<?php echo $rowp["Link"]; ?>" class="link" style= "text-decoration: none">

          <?php echo "<br/>" . $rowp["Descricao"]; ?>
        </a>
        </p>
       </div>

    <?php
        $logado = "sim";
        //while( $rowp = "SELECTD Descricao FROM Exames WHERE Email in ( SELECT Email FROM Clientes WHERE Email = '".$_SESSION["EMAIL"]."')" ){
        //echo $rowp["descricao"];

        //echo " Achou o cliente com senha correta.</br>" ;
      }
    }

    ?>
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
            link.style.animation ?
              (link.style.animation = "") :
              (link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3
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
     <form class="card1" method=GET action="SalvarExame.php">
    <div class="modal fade" id="modalAddExames" tabindex="-1" role="dialog" aria-labelledby="modalAddExames" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddExames">Adicione seu Exame</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="card-content">
              <div id="Cadastrar">
                <div class="card-content">
                  <div class="card-content-area">
                    <label for="Descricao">Descrição</label>
                    <input type="text" name="Descricao" id="Descricao" autocomplete="off">
                  </div>
                  <div class="card-content-area">

                    <label for="Link">Link</label>

                    <input type="text" name="Link" id="Link" autocomplete="off">

                  </div>
                  <div>
                      <form class="card" method=GET action="SalvarExame.php">
                    <button class ="submit" name="submit" value="Adicionar">Adicionar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <footer class="fixarRodape">
      <div class="card-contentP">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddExames">
            Adicionar Exames
          </button>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </main>
  </body>

  </html>