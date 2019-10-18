<?php
    include("config/conexao.php");
    $conexao = new Conexao();
    $con = $conexao->conectar();
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    
    <title>Pombo Criativo</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="expires" content="Tue, 01 Jan 2020 12:12:12 GMT">
    <meta http-equiv="cache-control" content="must-revalidate, public" max-age=31557600/>
    <meta http-equiv="Pragma" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="Empresa de soluções tecnológicas como softwares, cloud, rede e cabeamento, suporte com ERP, solucione hoje!"/>
    <meta name="keywords" content="desenvolvimento, fortaleza, ecommerce, marketing, loja online, blogs, criar site, protheus, totvs, erp, infraestrutura, instalação de câmeras, ceará, aplicativo, ios, android, suporte, pfsense, design"/>
    <meta name="author" content="Gleidson Teixeira, contato@pombocriativo.com"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-br" />    

    <link rel="canonical" href="https://pombocriativo.com" />
    <link rel="shortlink" href="https://pombocriativo.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:400,800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/materialize.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/extras.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/site.css" media="all"/>
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
    <link rel="icon" href="img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="img/favicon.png" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap"> -->
    <!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
            appId: "a7ee881a-1d96-41af-91bb-d3019bbc0408",
            });
        });
    </script> -->
    <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '769570139895464');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=769570139895464&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112375115-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-112375115-1');
    </script>
    
    <i class="mdi-navigation-menu click menu-btn circle button-collapse hide-on-large-only" data-activates="slide-out"></i>

    <header id="topo" class="suave">
        <div class="header">
            <div class="mini-menu">
                <i class="material-icons suave click">menu</i>
            </div>
            <div class="logo suave">
                <a href="index.php" class="suave">
                    <img src="img/logo_pombo_criativo.png" alt="Pombo_Criativo_Logo" title="Pombo Criativo" />
                </a>
                <a class="hide-on-small-only suave addBannerClick" data-id="6" data-tipo="CTT" href="tel:85987974616" style="margin-top: 10px;">(85) 98797-4616</a>
                <a class="hide-on-small-only suave addBannerClick" data-id="7" data-tipo="CTT" href="mailto:contato@pombocriativo.com.br">contato@pombocriativo.com</a>
            </div>
            <nav class="menu suave">
                <ul>
                    <li>
                        <a href="index.php" class="suave">
                            Início
                        </a>
                    </li>    
                    <li>
                        <a href="#servicos" class="suave scrollto">
                            Serviços
                        </a>
                    </li>
                    <li>
                        <a href="#portfolio" class="suave scrollto">
                            Portfólio
                        </a>
                    </li>
                    <!-- <li>
                        <a class="suave mini-title upper click">
                            Nossos Serviços
                        </a>
                        <ul class="suave">
                            <li class="suave"><a href="data-center.php" class="suave mini-title upper">Data center</a></li>
                            <li class="suave"><a href="consultoria.php" class="suave mini-title upper">Consultoria ERP</a></li>
                            <li class="suave"><a href="fabrica.php" class="suave mini-title upper">Fábrica de Software</a></li>
                            <li class="suave"><a href="infraestrutura.php" class="suave mini-title upper">Infraestrutura</a></li>
                            <li class="suave"><a href="cameras.php" class="suave mini-title upper">Instalação de Câmeras</a></li>
                        </ul>
                    </li> -->
                    
                    <!-- <li style="float: right;">
                        <a href="login.php" class="cta suave mini-title upper">
                            <i class="material-icons">account_circle</i>
                            área do cliente
                        </a>
                    </li> -->
                </ul>
                <a class="suave rede-social addBannerClick" data-id="8" data-tipo="CTT" href="https://www.facebook.com/PomboCriativo/" target="_blank"><img src="img/ico6.png"></a>
                <a class="suave rede-social addBannerClick" data-id="9" data-tipo="CTT" href="https://www.youtube.com/channel/UCKEsrPEIsH5ZvESF2hcZezg" target="_blank"><img src="img/ico7.png"></a>
                <a class="suave rede-social addBannerClick" data-id="10" data-tipo="CTT" href="https://www.instagram.com/pombocriativo/?hl=pt-br" target="_blank"><img src="img/ico8.png"></a>
                <a class="suave rede-social addBannerClick" data-id="11" data-tipo="CTT" href="https://api.whatsapp.com/send?phone=5585987974616&amp;text=Olá%20Pombo%20Criativo,%20gostaria%20de%20solicitar%20um%20orçamento...&amp;l=pt-br" target="_blank"><img src="img/ico9.png"></a>
            </nav>
            <div class="clear"></div>
        </div>
    </header>