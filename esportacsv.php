<?php
$datiok = true;



if(!isset($_POST["separatore"]) || empty(trim($_POST["separatore"])))
	$datiok = false;


if(!isset($_POST["dominio"]) || empty(trim($_POST["dominio"])))
	$datiok = false;

if(!isset($_POST["uo"]) || empty(trim($_POST["uo"])))
	$datiok = false;

if (!is_uploaded_file($_FILES['file']['tmp_name']))
	$datiok = false;	

if(!$datiok)
{
	echo '<p style="text-align:center">';
	echo 'Dati insufficienti per procedere';
	echo '<a href="dacsv.php" title="back">TORNA INDIETRO</a>';
	echo '</p>';
	exit;
}	


	

$dominio = filter_var($_POST["dominio"],FILTER_SANITIZE_STRING);
$uo = filter_var($_POST["uo"],FILTER_SANITIZE_STRING);

if(substr($uo,0,1) != "/")
	$uo = "/" . $uo;

$separatore = filter_var($_POST["separatore"],FILTER_SANITIZE_STRING);

$nomefile = 'uploads/' . $_FILES['file']['name'];

chmod('uploads',0777);
chmod('output',0777);
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);



$filein = fopen($nomefile,"r");

$nomefileout = "output/utenticsv" . rand(0,100) . ".csv";

$fileout = fopen($nomefileout ,"w+");

$testata = "First Name [Required],Last Name [Required],Email Address [Required],Password [Required],Password Hash Function [UPLOAD ONLY],Org Unit Path [Required],New Primary Email [UPLOAD ONLY],Recovery Email,Home Secondary Email,Work Secondary Email,Recovery Phone [MUST BE IN THE E.164 FORMAT],Work Phone,Home Phone,Mobile Phone,Work Address,Home Address,Employee ID,Employee Type,Employee Title,Manager Email,Department,Cost Center,Building ID,Floor Name,Floor Section,Change Password at Next Sign-In,New Status [UPLOAD ONLY]";
fwrite($fileout,$testata);
fwrite($fileout,"\n");


while(!feof($filein))
{
	
	$riga = fgets($filein);
	if(trim($riga) == "" || trim($riga) == $separatore )
		continue;
	$row = explode($separatore,$riga);
	
	$username = str_replace(array(" ","'","\n","\r"),"",strtolower($row[0] . '.' . $row[1] . "@" . $dominio));
	$password = str_replace(array(" ","'","\n","\r"),"",ucfirst(strtolower($row[0] . $row[1] . "*")));
	$stringa = strtoupper(str_replace(array("\n","\r"),"",$row[0])) . "," . strtoupper(str_replace(array("\n","\r"),"",$row[1])) . "," . $username  . "," .  $password . ",," . $uo . ",,,,,,,,,,,,,,,,,,,,True,";
	fwrite($fileout,$stringa);
	fwrite($fileout,"\n");
	
}

fclose($filein);
fclose($fileout);
chmod('uploads',0755);
chmod('output',0755);
echo '<p style="text-align:center">';
echo "File per caricamento massivo utenti  G_SUITE creato correttamente (nome file {$nomefileout}): <a href=\"{$nomefileout}\" title=\"scarica\">APRI</a><br><br>";
echo '<a href="index.php" title="home">TORNA INDIETRO</a>';
echo '</p>';

?>