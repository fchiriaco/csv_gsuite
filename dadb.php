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
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
				<form action="esportadb.php" method="POST">
					<div class="form-group">
						<label for="host">Mysql Host:</label>
						<input type="text" required name="host" id="host" class="form-control" placeholder="es.: localhost">
					</div>
					<div class="form-group">
						<label for="userdb">Utente DB mysql</label>
						<input type="text" required  class="form-control" id="userdb" name="userdb" >
					</div>
			
					<div class="form-group">
						<label for="pwddb">Password DB mysql</label>
						<input type="password" required  class="form-control" id="pwddb" name="pwddb" >
					</div>
			
					<div class="form-group">
						<label for="db">Nome DB mysql</label>
						<input type="text" required  class="form-control" id="db" name="db" >
					</div>
			
					<div class="form-group">
						<label for="tabusers">Nome tabella utenti da creare</label>
						<input type="text" required  class="form-control" id="tabusers" name="tabusers" palceholder="es.: docenti">
					</div>
			
					<div class="form-group">
						<label for="campocognome">Nome campo contenente il cognome nella tabella</label>
						<input type="text" required  class="form-control" id="campocognome" name="campocognome" placeholder:"es.: cognome" >
					</div>
			
					<div class="form-group">
						<label for="camponome">Nome campo contenente il nome nella tabella</label>
						<input type="text" required  class="form-control" id="camponome" name="camponome" placeholder:"es.: nome">
					</div>
					
					<div class="form-group">
						<label for="dominio">Dominio associato</label>
						<input type="text" required  class="form-control" id="dominio" name="dominio" placeholder:"es.: nomeistituto.edu.it">
					</div>
					
					<div class="form-group">
						<label for="uo">Percorso Unità organizzativa da assegnare</label>
						<input type="text" required  class="form-control" id="uo" name="uo" placeholder:"es.: /alunni/1A">
					</div>
  
					<button type="submit" class="btn btn-primary">Genera file</button>
			</form>
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