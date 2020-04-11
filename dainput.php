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
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-sm-offset-3 col-lg-4 col-sm-offset-4">
				<form action="esportamanuale.php" method="POST">
					
					
					<div class="form-group">
						<label for="Cognome">Cognome utente</label>
						<input type="text"  class="form-control" id="cognome" name="cognome">
					</div>
					
					<div class="form-group">
						<label for="nome">Nome utente</label>
						<input type="text"   class="form-control" id="nome" name="nome">
					</div>
												
					<div class="form-group">
						<label for="dominio">Dominio associato</label>
						<input type="text" required  class="form-control" id="dominio" name="dominio" placeholder:"es.: nomeistituto.edu.it">
					</div>
					
					<div class="form-group">
						<label for="uo">Percorso Unità organizzativa da assegnare</label>
						<input type="text" required  class="form-control" id="uo" name="uo" placeholder:"es.: /alunni/1A">
					</div>
					<button id="add" class="btn btn-primary">Aggiungi utente</button>
					<input type="hidden" id="utenti" name="utenti">
  
					<button type="submit" class="btn btn-success">Genera file e concludi</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<hr>
			<h3>Utenti aggiunti</h3>
			<div id="stringa">
			
			</div>
		</div>
	</div>
			
  </div>
  <!-- JS -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  
  <!-- JS -->
</body>
</html>