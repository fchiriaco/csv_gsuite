<?php
$datiok = true;



if(!isset($_POST["utenti"]) || empty(trim($_POST["utenti"])))
	$datiok = false;


if(!isset($_POST["dominio"]) || empty(trim($_POST["dominio"])))
	$datiok = false;

if(!isset($_POST["uo"]) || empty(trim($_POST["uo"])))
	$datiok = false;


if(!$datiok)
{
	echo '<p style="text-align:center">';
	echo 'Dati insufficienti per procedere';
	echo '<a href="dainput.php" title="back">TORNA INDIETRO</a>';
	echo '</p>';
	exit;
}	


	

$dominio = filter_var($_POST["dominio"],FILTER_SANITIZE_STRING);
$uo = filter_var($_POST["uo"],FILTER_SANITIZE_STRING);
if(substr($uo,0,1) != "/")
	$uo = "/" . $uo;

$utenti = filter_var($_POST["utenti"],FILTER_SANITIZE_STRING);

$arutenti = explode('|',$utenti);

chmod('output',0777);
$nomefileout = "output/utentiman" . rand(0,100) . ".csv";
$fileout = fopen($nomefileout,"w+");
$testata = "First Name [Required],Last Name [Required],Email Address [Required],Password [Required],Password Hash Function [UPLOAD ONLY],Org Unit Path [Required],New Primary Email [UPLOAD ONLY],Recovery Email,Home Secondary Email,Work Secondary Email,Recovery Phone [MUST BE IN THE E.164 FORMAT],Work Phone,Home Phone,Mobile Phone,Work Address,Home Address,Employee ID,Employee Type,Employee Title,Manager Email,Department,Cost Center,Building ID,Floor Name,Floor Section,Change Password at Next Sign-In,New Status [UPLOAD ONLY]";
fwrite($fileout,$testata);
fwrite($fileout,"\n");


foreach($arutenti as $utente)
{
	
	
	$row = explode(";",$utente);
	
	$username = str_replace(array(" ","'"),"",strtolower($row[0] . '.' . $row[1] . "@" . $dominio));
	$password = str_replace(array(" ","'"),"",ucfirst(strtolower($row[0] . $row[1] . "*")));
	$stringa = strtoupper($row[0]) . "," . strtoupper($row[1]) . "," . $username  . "," .  $password . ",," . $uo . ",,,,,,,,,,,,,,,,,,,,True,";
	fwrite($fileout,$stringa);
	fwrite($fileout,"\n");
	
}

fclose($fileout);
chmod('output',0755);
echo '<p style="text-align:center">';
echo "File per caricamento massivo utenti  G_SUITE creato correttamente (nome file {$nomefileout}): <a href=\"{$nomefileout}\" title=\"scarica\">APRI</a><br><br>";
echo '<a href="index.php" title="home">TORNA INDIETRO</a>';
echo '</p>';

?>