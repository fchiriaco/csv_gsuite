<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>Francesco Chiriaco</title>

  <!-- META -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- META -->
  
  <!-- CSS -->
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  
  <!-- CSS -->  

  <?php
    include("configlocale.php");
 ?>
</head>
<body>
   <!-- CONTENUTO DELLA PAGINA ... -->
   
   <div class="container-fluid">
		<h1 class="alert alert-info text-center" style="margin:0px;margin-bottom:5px;border:solid 2px #ffffff;border-radius:10px;"><?php echo $pagetitle ?></h1>
		
		<div class="row">
		 <div class="col-xs-12">
		  <hr>
		  <div class="dropdown">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">SELEZIONA LA PROCEDURA PREFERITA
							<span class="caret"></span>
			</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="dacsv.php">Genera da file csv posseduto</a></li>
					<li><a href="dainput.php">Genera mediante inserimento manuale utenti</a></li>
					<li><a href="dadb.php">Genera da tabella database</a></li>
				</ul>
		  </div>
		  <hr>
		 </div>
		</div>
		<div class="row">
		  <div class="col-xs-12">
			<p style="padding:20px">
			
			Attraverso questa semplice applicazione è possibile generare il file <b>csv</b> per il caricamento massivo degli utenti in G-SUITE.
			 <br>
			 Si hanno tre possibilità:
			 <ul>
			 <li>Generare il file csv esportando i dati da un database mysql che si possiede</li>
			 <li>Generare il file csv da un file csv contenente l'elenco degli utenti (cognome e nome separati da un delimitatore es. ; , | oppure altro simbolo). <b>Il file csv sorgente non deve contenere l'intestazione dei campi, ma solo i dati</b></li>
			 <li>inserimento veloce della lista degli utenti indicando cognome e nome e poi generare il file completo</li>
			 </ul>
	
			</p>
			<p style="padding:20px">
			&Egrave; sufficiente indicare solo nome e cognome, sarà poi la procedura a generare il resto, in particolare:
			<br>
			la mail dell'utente sarà generata così:  <b>cognome.nome@dominio</b>  (tutto minuscolo senza spazi)<br>
			La password, da cambiare al primo collegamento, sarà: <b>Cognomenome*</b> (Maiuscola la prima senza spazi) 
			<br><br>
			I file da usare per il caricamento massivo in g-suite verranno salvati nella cartella dell'applicazione con i seguenti nomi:<br>
			<b>utentidb.csv</b> (se generato da un db mysql)<br>
			<b>utenticsv.csv</b> (se generato da un file csv)<br>
			<b>utentiman.csv</b> (se generato da un input manuale dell'utente)<br>
			</p>
			
		  </div>
		  
		  
		</div>
		
   </div>
  <!-- JS -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  
  <!-- JS -->
</body>
</html>