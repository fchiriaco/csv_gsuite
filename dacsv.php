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
		<pre>
		Questa procedura prende i dati da un file CSV le cui righe hanno il formato seguente:
		
		cognome(separatore)nome
		
		esempio
		rossi,mario
		verdi,alberto
		
		oppure
		rossi;mario
		verdi;alberto
		
		oppure
		rossi|mario
		verdi|alberto
		
		Dal file di input viene poi generato in output il file utenticsv.csv pronto per il caricamento massivo utenti in G-SUITE
				
		</pre>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-sm-offset-3 col-lg-4 col-sm-offset-4">
				<form action="esportacsv.php" method="POST" enctype="multipart/form-data">
					
					
					<div class="form-group">
						<label for="file">File csv di input</label>
						<input type="file" required  class="form-control" id="file" name="file">
					</div>
					
					<div class="form-group">
						<label for="separatore">Carattere separatore di campi</label>
						<input type="text" required  class="form-control" id="separatore" name="separatore" placeholder:"es.: ;">
					</div>
							
					<div class="form-group">
						<label for="dominio">Dominio associato</label>
						<input type="text" required  class="form-control" id="dominio" name="dominio" placeholder:"es.: nomeistituto.edu.it">
					</div>
					
					<div class="form-group">
						<label for="uo">Percorso Unità organizzativa da assegnare</label>
						<input type="text" required  class="form-control" id="uo" name="uo" placeholder:"es.: /alunni/1A">
					</div>
  
					<button type="submit" class="btn btn-default">Genera file</button>
			</form>
		</div>
	</div>
			
			
		
  </div>
  <!-- JS -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  
  <!-- JS -->
</body>
</html>