<?php
$datiok = true;

if(!isset($_POST["host"]) || empty(trim($_POST["host"])))
	$datiok = false;
	
if(!isset($_POST["userdb"]) || empty(trim($_POST["userdb"])))
	$datiok = false;

if(!isset($_POST["pwddb"]) || empty(trim($_POST["pwddb"])))
	$datiok = false;

if(!isset($_POST["db"]) || empty(trim($_POST["db"])))
	$datiok = false;

if(!isset($_POST["tabusers"]) || empty(trim($_POST["tabusers"])))
	$datiok = false;


if(!isset($_POST["campocognome"]) || empty(trim($_POST["campocognome"])))
	$datiok = false;

if(!isset($_POST["camponome"]) || empty(trim($_POST["camponome"])))
	$datiok = false;

if(!isset($_POST["dominio"]) || empty(trim($_POST["dominio"])))
	$datiok = false;

if(!isset($_POST["uo"]) || empty(trim($_POST["uo"])))
	$datiok = false;


if(!$datiok)
{
	echo '<p style="text-align:center">';
	echo 'Dati insufficienti per procedere';
	echo '<a href="dacsv.php" title="back">TORNA INDIETRO</a>';
	echo '</p>';
	exit;
}
	
	

$hostmysql = filter_var($_POST["host"],FILTER_SANITIZE_STRING);
$usermysql = filter_var($_POST["userdb"],FILTER_SANITIZE_STRING);
$pwdmysql = filter_var($_POST["pwddb"],FILTER_SANITIZE_STRING);
$dbmysql = filter_var($_POST["db"],FILTER_SANITIZE_STRING);
$tabella = filter_var($_POST["tabusers"],FILTER_SANITIZE_STRING);
$cognome = filter_var($_POST["campocognome"],FILTER_SANITIZE_STRING);
$nome = filter_var($_POST["camponome"],FILTER_SANITIZE_STRING);
$dominio = filter_var($_POST["dominio"],FILTER_SANITIZE_STRING);
$uo = filter_var($_POST["uo"],FILTER_SANITIZE_STRING);


$con = new mysqli($hostmysql,$usermysql,$pwdmysql,$dbmysql);
if ($con -> connect_errno) {
  echo "Errore di connessione al DB " . $con -> connect_error;
  exit();
}

$file = fopen("utentidb.csv","w+");
$testata = "First Name [Required],Last Name [Required],Email Address [Required],Password [Required],Password Hash Function [UPLOAD ONLY],Org Unit Path [Required],New Primary Email [UPLOAD ONLY],Recovery Email,Home Secondary Email,Work Secondary Email,Recovery Phone [MUST BE IN THE E.164 FORMAT],Work Phone,Home Phone,Mobile Phone,Work Address,Home Address,Employee ID,Employee Type,Employee Title,Manager Email,Department,Cost Center,Building ID,Floor Name,Floor Section,Change Password at Next Sign-In,New Status [UPLOAD ONLY]";
fwrite($file,$testata);
fwrite($file,"\n");
$sql = "select {$cognome},{$nome} from {$tabella} order by {$cognome},{$nome}";
$rs = $con->query($sql);
while($row = $rs->fetch_object())
{
	
	$username = str_replace(array(" ","'"),"",strtolower($row->$cognome . '.' . $row->$nome . "@" . $dominio));
	$password = str_replace(array(" ","'"),"",ucfirst(strtolower($row->$cognome . $row->$nome . "*")));
	$stringa = strtoupper($row->$nome) . "," . strtoupper($row->$cognome) . "," . $username  . "," .  $password . ",," . $uo . ",,,,,,,,,,,,,,,,,,,,True,";
	fwrite($file,$stringa);
	fwrite($file,"\n");
	
}

fclose($file);
echo '<p style="text-align:center">';
echo 'File per caricamento massivo utenti  G_SUITE creato correttamente (nome file utentidb.csv): <a href="utentidb.csv" title="scarica">APRI</a><br><br>';
echo '<a href="index.php" title="home">TORNA INDIETRO</a>';
echo '</p>';

?>
		
	