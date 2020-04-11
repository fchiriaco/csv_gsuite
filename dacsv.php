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
			<div class="col-xs-12 text-center">
				<hr>
				<a href="index.php" title="home" class="btn btn-danger">HOME <span class="glyphicon glyphicon-home"></span></a>
				<hr>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-5">
				
<pre>
Il formato delle righe del file CSV inviato sarà seguente:

cognome(carattere di separazione)nome
		
esempio 1

rossi,mario
verdi,alberto
		
esempio 2
		
rossi;mario
verdi;alberto
		
esempio 3
		
rossi|mario
verdi|alberto
		
Il  file generato in output sarà utenticsv.csv
				
</pre>
			
			</div>
		
			<div class="col-xs-12 col-sm-7 col-md-4 col-lg-3 bg-primary" style="padding:20px;">
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
  
					<button type="submit" class="btn btn-success">Genera file</button>
			</form>
		</div>
	</div>
			
			
		
  </div>
  <br>
  <!-- JS -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  
  <!-- JS -->
</body>
</html>