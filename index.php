<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>47&deg; Festival do Chopp</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="favicon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="styles/vendor/normalize.css"/>

  <link rel="stylesheet" href="styles/vendor/font-awesome.css"/>

  <link rel="stylesheet" href="styles/vendor/lightbox.css"/>

  <link rel="stylesheet" href="styles/main.css"/>
</head>
<body>
  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  <header>
    <div class="header">
      <div class="wrapper">
        <!-- ================================= DATE ================================= -->
        <div class="date date-box">
          <div class="date-inner-box">
            <h5>05 e 12 de Abril de 2014</h5>
          </div>
        </div> <!-- end date -->
        <!-- ================================= END DATE ================================= -->


        <!-- ================================= ILLUSTRATION ================================= -->
        <div class="illustration">
          <img src="images/illustration.png" alt="">
        </div> <!-- end illustration -->
        <!-- ================================= END ILLUSTRATION ================================= -->


        <!-- ================================= BRAND ================================= -->
        <div class="brand">
            <img src="images/festival-logo.png" alt="">
        </div> <!-- end brand -->
        <!-- ================================= END BRAND ================================= -->
      </div> <!-- end wrapper -->
    </div> <!-- end header -->

    <!-- ================================= NAVIGATION ================================= -->
    <div class="navigation">
      <div class="wrapper">
        <nav>
          <ul class="menu pull-left">
            <li><a>a festa</a>
              <ul class="sub-menu">
                <li><a href="historico.php">hist&oacute;rico</a></li>
                <li><a href="curiosidades.php">curiosidades</a></li>
                <li><a href="infraestrutura.php">infraestrutura</a></li>
                <li><a href="soberanas.php">soberanas</a></li>
              </ul>
            </li>
            <li><a href="noticias.php">not&iacute;cias</a></li>
            <li><a href="programacao.php">programa&ccedil;&atilde;o</a></li>
          </ul>
          <ul class="menu pull-right">
            <li><a>informa&ccedil;&otilde;es</a>
              <ul class="sub-menu">
                <li><a href="excursoes.php">excurs&otilde;es</a></li>
                <li><a href="dicas.php">dicas</a></li>
                <li><a href="ingressos.php">ingressos</a></li>
                <li><a href="localizacao.php">localiza&ccedil;&atilde;o</a></li>
                <li><a href="hoteisrestaurantes.php">hot&eacute;is e restaurantes</a></li>
              </ul>
            </li>
            <li><a href="galeria.php">galeria</a></li>
            <li><a href="contato.php">contato</a></li>
          </ul>
        </nav>
      </div> <!-- end wrapper -->
    </div> <!-- end navigation -->
    <!-- ================================= END NAVIGATION ================================= -->
  </header>

  <!-- ================================= MAIN ================================= -->
  <section class="main index">
    <div class="wrapper">
      <div class="main-box">
        <div class="main-inner-box">
          <div class="row">
            <div class="col-xs-12">
              <!-- ================================= SLIDES ================================= -->
              <div class="container">
                <div class="slides">
                  <img src="images/slides/slide-1.jpg" alt="">
                  <img src="images/slides/slide-2.jpg" alt="">
                  <img src="images/slides/slide-3.jpg" alt="">
                  <img src="images/slides/slide-4.jpg" alt="">
                  <img src="images/slides/slide-5.jpg" alt="">
                </div>
              </div>
              <!-- ================================= END SLIDES ================================= -->

              <br>

              <hr class="hr">
            </div> <!-- end col-xs-12 -->
          </div> <!-- end row -->

          <div class="row">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-8">
                  <h4>not&iacute;cias</h4>

                  <div class="row">
                  <?php
					include 'classes/pageClass.php';
					$page= new Page();
					$out=$out2="";
					$dados = $page->getPageContent("*", "noticias", "ativo=1 order by rand() LIMIT 2");
					if(gettype($dados)!="array"){
						$out = "<p>Nenhuma notícia cadastrada.</p>";
					}else{
						$out .= '<div class="row">
					                    <div class="col-xs-12">
					                      <ul>';
						foreach($dados as $arrayItem) {
							$out .= '
								<div class="col-xs-6">
						                      <div class="row">
						                        <div class="col-xs-6">
						                          <img class="image-border" src="uploads/medias/'.$arrayItem["imagem"].'" width="150" height="150">
						                        </div>
						                        <div class="col-xs-6">
						                          <h5 class="news-tittle">'.$arrayItem["titulo"].'</h5>
						                          <p class="news-text">
      													'.substr($arrayItem["descricao"], 0, 100).'...<br>
						                          		<a href="noticias.php?id='.$arrayItem["id"].'">LEIA MAIS</a>
        										  </p>
						                        </div>
						                      </div>
						                    </div> <!-- end col-xs-6 -->
								
								
								';
						 }//end foreach
						 $out .= '</ul></div></div>';
					}
					print $out;                  
                  ?>                  
                  </div> <!-- end row -->

                  <h4>galerias</h4>
                  <div class="row">
                  <?php
			$out2;
                  	$dados2 = $page->getPageContent("*", "galerias", "ativo=1 LIMIT 4");
		        if(gettype($dados2)!="array"){
				$out2 = "<p>Nenhuma galeria cadastrada.</p>";
			}else{
				foreach($dados2 as $arrayItem) {
					$out2 .= '
						<div class="col-xs-3">
							<a href="galeria.php?id='.$arrayItem["id"].'">
				                        	<img class="image-border" src="uploads/medias/'.$arrayItem["imagem"].'" width="150" height="115">
				                        </a>
				                        <h6>'.$arrayItem["titulo"].'</h6>
				                </div>';
				 }//end foreach
			}
			print $out2;                  
                  ?>
                  </div>

                </div> <!-- end col-xs-8 -->
                <div class="col-xs-4 social">
                  <h4>redes sociais</h4>
                  <h5>Siga o Festival nas redes sociais</h5>
                  <a href="http://twitter.com/festivaldochopp" class="btn btn-info btn-full" target="_blank"><i class="fa fa-twitter fa-2x"></i> twitter.com/festivaldochopp</a>

                  <div class="fb-like-box" data-href="http://www.facebook.com/festivaldochopp" data-width="330" data-height="270" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
                </div> <!-- end col-xs-4 -->

              </div> <!-- end row -->
            </div> <!-- end col-xs-12 -->
          </div> <!-- end row -->

          <div class="row">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-3">
                  <h4>programa&ccedil;&atilde;o</h4><br>
                  <a href="programacao.php">
                    <img class="round-image pull-left" src="images/programacao.png" width="97" height="97">
                    <p class="info">Confira a programa&ccedil;&atilde;o completa</p>
                  </a>
                </div>
                <div class="col-xs-3">
                  <h4>excurs&otilde;es</h4><br>
                  <a href="excursoes.php">
                    <img class="round-image pull-left" src="images/excursoes.png" width="97" height="97">
                    <p class="info">Encontre ou cadastre sua excurs&otilde;es</p>
                  </a>
                </div>
                <div class="col-xs-3">
                  <h4>ingressos</h4><br>
                  <a href="ingressos.php">
                    <img class="round-image pull-left" src="images/ingressos.png" width="97" height="97">
                    <p class="info">Confira os valores e os pontos de venda</p>
                  </a>
                </div>
                <div class="col-xs-3">
                  <h4>dicas</h4><br>
                  <a href="dicas.php">
                    <img class="round-image pull-left" src="images/dicas.png" width="97" height="97">
                    <p class="info">Leia nossas dicas para curtir melhor o evento</p>
                  </a>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- end main-inner-box -->
      </div> <!-- end main-box -->

      <!-- ================================= SUPPORT ================================= -->
      <div class="row">
        <div class="col-xs-2">
          <p>Apoio:</p>
          <img src="images/prefeitura.png" alt="Prefeitura">
        </div>
        <div class="col-xs-10">
          <p>Patroc&iacute;nio:</p>
          <img src="images/patrocinio.png" alt="Patrocinios">
        </div>
      </div>
      <!-- ================================= END SUPPORT ================================= -->
    </div> <!-- end wrapper -->
  </section> <!-- end main -->
  <!-- ================================= END MAIN ================================= -->

  <footer>
    <div class="credits">
      <!-- ================================= CREDITS ================================= -->
      <div class="wrapper">
        <p class="pull-left">Festival do Chopp © 2014 - Todos os direitos reservados</p>
        <p class="pull-right">Desenvolvido por <a class="publins" href="http://www.publins.com.br/" target="_blank">Publins</a></p>
      </div> <!-- end wrapper -->
      <!-- ================================= END CREDITS ================================= -->
    </div>
  </footer>


  <!-- ================================= JAVASCRIPT LOADS ================================= -->
  <script src="scripts/vendor/jquery.min.js"></script>

  <script src="scripts/vendor/slidesjs.min.js"></script>

  <script src="scripts/vendor/lightbox.min.js"></script>

  <script src="scripts/main.min.js"></script>
  <!-- ================================= END JAVASCRIPT LOADS ================================= -->
  

  <script>
    $(function() {
      $('.slides').slidesjs({
        width: 1050,
        height: 293,
        navigation: false,
        play: {
          auto: true,
          interval: 10000
        }
      });
    });
  </script>
</body>
</html>