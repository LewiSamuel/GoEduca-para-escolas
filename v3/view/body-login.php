<style type="text/css">
body, html{
  min-height: 100%;
}
@keyframes animatedBackground {
  from { background-position: 0 0; }
  to { background-position: 100% 0; }
}
body{
  background-image: <?php echo "url('".$APP_PATH_VERSION."/components/config/imgResize2.php?img=".$APP_PATH_ROOT."/src/img/background-games.png&w=500')"; ?>;
  background-size: auto 100%;
  background-attachment: fixed;
  background-repeat: repeat-x;
  animation: animatedBackground 25s alternate infinite;
}
.cont-login{
  position: fixed !important;
}
#login-page{
  position:  absolute; 
  height:  100%; 
  width:  66.666666666%;
  align-items: center;
  display: flex;
  background: rgba(0,161,176,0.7);
  background: -moz-linear-gradient(to bottom right, #48a1afcc, #232423CC);
  background: -webkit-linear-gradient(bottom right, #48a1afcc, #232423CC);
  background: linear-gradient(to bottom right, #48a1afaa, #232423aa);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#48a1afcc', endColorstr='#232423CC',GradientType=0 );
  color: white;
}
@media only screen and (max-width : 600px) {
  .cont-login{
    position: initial !important;
  }
  #login-page{
    position: initial !important;
    width: 100% !important;
    display: block !important;
  }
}
.container-image{
  height: auto;
  background-image: <?php echo "url('".$APP_PATH_VERSION."/components/config/imgResize2.php?img=".$APP_PATH_VERSION."/src/img/gameforshcools.png&w=480')"; ?>;
  background-size: cover;
  background-position: center;
  text-align: center;
  padding: 0;
}
.flex-container {
  padding: 0;
  margin: 0;
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
<section id="login-page" class="row no-margin-b">
<div class="col s12 m4 z-depth-0 card-panel cont-login" style="
    height:  100%;
    padding: 100px 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    right:  0;
    background: linear-gradient(to right, rgb(255,255,255), rgb(240,240,240));
    border-left: 1px solid #bbb;
    ">
  <form class="grey-text" method="POST" action=<?php echo $APP_PATH_VERSION."/components/config/action-pessoa.php"; ?>>
    <input type="hidden" name="func" value="FazerLoginSchool">

    <br>
    <div class="row">
      <div class="col s12 center">  
        <a class="center grey-text text-darken-2">
          <img src=<?php echo "'".$APP_PATH_VERSION."/src/img/marca-azul-escuro.png'"; ?> width="175">
          <div style="line-height:1; color: grey; font-size: 12px;">Para Escolas</div>
        </a>
        <span class="red-text">
          <?php echo isset($_GET['AcessoNegado']) ? "Usuario ou senha errada!" :  "";  ?>
        </span>
      </div>
    </div>
    <div class="row margin">
      <div class="input-field col s10 offset-s1">
        <i class="mdi-social-person-outline prefix material-icons">person</i>
        <input id="acesso" name="acesso" type="text" placeholder="Informação de acesso">
        <label for="acesso" class="center-align active">Acesso</label>
      </div>
    </div>
    <div class="row margin up-small">
      <div class="input-field col s10 offset-s1">
        <i class="mdi-action-lock-outline prefix material-icons">lock</i>
        <input id="senha" name="senha" type="password" placeholder="Sua Senha">
        <label for="senha" class="active">Senha</label>
      </div>
    </div>
    <div class="row">
      <div class="col s10 offset-s1 center">
        <button type="submit" name="login" class="btn waves-effect waves-light">Login</button>
      </div>
    </div>
    <div class="row">
      <div class="col s12 center">
        <a href="#!" class="teal-text"><b>Esqueci minha senha</b></a>
      </div>
    </div>
    <br>
  </form>
</div>
<div style="padding-left: 150px;">
    <h2>
      <b>
        Aprenda jogando <br>
        com jogos que ensinam!
      </b>
    </h2>
    <p class="flow-text">O GoEduca torna isso possível de forma surpreendente!</p>
    <p class="center" style="margin-top: 50px;">Quer levar o GoEduca para sua escola?<br> <a href="/goeduca-para-escolas" class="btn white black-text">Saiba Mais</a></p>
</div>
</section>