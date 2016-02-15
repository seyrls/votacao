<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="public/favicon.ico">

    <title>Sistema de votação ANAUNI</title>
    
    

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>public/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>public/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>public/css/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>public/js/ie-emulation-modes-warning.js"></script>
    
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/datatables.min.css"/>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/val.js"></script>
    
    <!-- combo -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/ajax.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/ajax-dynamic-list.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <style>
        /* Big box with list of options */
#ajax_listOfOptions{
  position:absolute;  /* Never change this one */
  width:40%;  /* Width of box */
  height:250px;  /* Height of box */
  overflow:auto;  /* Scrolling features */
  border:1px solid #317082;  /* Dark green border */
  background-color:#FFF;  /* White background color */
  text-align:left;
  font-size:0.9em;
  z-index:100;
}
#ajax_listOfOptions div{  /* General rule for both .optionDiv and .optionDivSelected */
  margin:1px;    
  padding:1px;
  cursor:pointer;
  font-size:1.2em;
}
#ajax_listOfOptions .optionDiv{  /* Div for each item in list */
  
}
#ajax_listOfOptions .optionDivSelected{ /* Selected item in the list */
  background-color:#317082;
  color:#FFF;
}
#ajax_listOfOptions_iframe{
  background-color:#F00;
  position:absolute;
  z-index:5;
}
        
    </style>
    
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
          <h3 class="text-muted"><img src="<?php echo base_url();?>public/logo.jpg">Sistema de Votação da ANAUNI</h3>
        <nav>
          <ul class="nav nav-justified">
            <li><a href="<?php echo base_url();?>index.php">Início</a></li>
            <li><a href="<?php echo base_url();?>index.php/votar">Votar</a></li>
            <li><a href="#">Resultado Final</a></li>
            <li><a href="<?php echo base_url();?>index.php/duvidas">Dúvidas</a></li>
            <li><a href="<?php echo base_url();?>index.php/votar/sair">Sair</a></li>
          </ul>
        </nav>
      </div>