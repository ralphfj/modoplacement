<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sprache,Sprachschule,Schule,International,Language, Center, Munich, M&uuml;nchen,School, Training, Communicative Method" />
<title>MODOLINGO Einstufungstest</title>
<link href="modolingo.css" rel="stylesheet" type="text/css" />
</head>

<?php
echo'
<body>
<table width="800" align="center" frame="void" rules="none" border="0" cellpadding="0" cellspacing="20" class="rahmen">
  <tr>
    <td width="800">
    <table width="800" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="199"><img src="images/intro/Bilder/logo.jpg" width="199" height="94" alt="modologo" /></td>
        <td width="609"><img src="images/letstalk.gif" width="609" height="94" alt="letstalk" /></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="800">
    </td>
  </tr>
  <tr>';

require_once __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

// Swiftmail - Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
  ->setUsername('ralph.f.jones@gmail.com')
  ->setPassword('gjprkgzbwoaphkgc')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function winchar($text) {
	return iconv("UTF-8","WINDOWS-1252",$text);
}


if(isset($_POST["basefile"]))
   $basefile=$_POST["basefile"];
else
   $basefile="";

if(isset($_POST["page_language"]))
   $page_language=$_POST["page_language"];
else
   $page_language="";

if(isset($_POST["language"]))
   $language=$_POST["language"];
else
   $language="";

if(isset($_POST["target_lang"]))
   $target_lang=$_POST["target_lang"];
else
   $target_lang="";

if(isset($_POST["target_lang_type"]))
   $target_lang_type=$_POST["target_lang_type"];
else
   $target_lang_type="";

if(isset($_POST["firma"]))
   $firma=$_POST["firma"];
else
   $firma="";

if(isset($_POST["name"]))
   $name=$_POST["name"];
else
   $name="";
if(isset($_POST["vorname"]))
   $vorname=$_POST["vorname"];
else
   $vorname="";
if(isset($_POST["email"]))
   $email=$_POST["email"];
else
   $email="";
if(isset($_POST["telbus"]))
   $telbus=$_POST["telbus"];
else
   $telbus="";
if(isset($_POST["telmob"]))
  $telmob=$_POST["telmob"];
else
   $telmob="";
if(isset($_POST["wunschtermine"]))
   $wunschtermine=$_POST["wunschtermine"];
else
   $wunschtermine="";
if(isset($_POST["moeglichetermine"]))
   $moeglichetermine=$_POST["moeglichetermine"];
else
   $moeglichetermine="";
if(isset($_POST["nichtmoeglichetermine"]))
   $nichtmoeglichetermine=$_POST["nichtmoeglichetermine"];
else
   $nichtmoeglichetermine="";
if(isset($_POST["beruf"]))
   $beruf=$_POST["beruf"];
else
   $beruf="";
if(isset($_POST["position"]))
   $position=$_POST["position"];
else
   $position="";
if(isset($_POST["howoften"])) 
   $howoften=$_POST["howoften"];
else
   $howoften="";
if(isset($_POST["wortschatz"])) 
   $wortschatz=$_POST["wortschatz"];
else
   $wortschatz="";
if(isset($_POST["situation"])) 
   $situation=$_POST["situation"];
else
   $situation="";
if(isset($_POST["schwierigkeiten"])) 
   $schwierigkeiten=$_POST["schwierigkeiten"];
else
   $schwierigkeiten="";
if(isset($_POST["selbsteinschaetzung"])) 
   $selbsteinschaetzung=$_POST["selbsteinschaetzung"];
else
   $selbsteinschaetzung="";
include $language.".inc";
//include "lang.inc";
include "parameters.inc";
//include "selbst.inc";
include "selbst".$page_language.".inc";
include "titles".$page_language.".inc";
//$target_lang = $lang[$language]["DE"];


$numcorrect=0;
$numquestions=sizeof($a);
for ( $i=1 ; $i <= $numquestions ; $i++ ){
	if(isset($_POST["q".$i])) 
	   $q[$i]=$_POST["q".$i];
        else
           $q[$i]="";
	if ($a[$i] == $q[$i]){
		$correct[$i]="Correct";
		$numcorrect++;
	}
	else
		$correct[$i]="False";
}
$perc=round(100*$numcorrect/$numquestions,1);

if ( $perc <= 20 )
	$niveau="Elementary I";
elseif ( $perc <= 26 )
	$niveau="Elementary I-II";
elseif ( $perc <= 28 )
	$niveau="Elementary III";
elseif ( $perc <= 40 )
	$niveau="Pre-Intermediate I";
elseif ( $perc <= 50 )
	$niveau="Pre-Intermediate I-II";
elseif ( $perc <= 58 )
	$niveau="Pre-Intermediate II";
elseif ( $perc <= 72 )
	$niveau="Intermediate I";
elseif ( $perc <= 80 )
	$niveau="Intermediate I-II";
elseif ( $perc <= 88 )
	$niveau="Intermediate II";
elseif ( $perc <= 92 )
	$niveau="Upper Intermediate I";
elseif ( $perc <= 96 )
	$niveau="Upper Intermediate I-II";
else
	$niveau="Upper Intermediate II";

$textbody = "Test = ".$basefile.".php\n\n";
$textbody .= "Firma = ".$firma."\n";
$textbody .= "Name = ".$name."\n";
$textbody .= "Vorname = ".$vorname."\n";
$textbody .= "Email = ".$email."\n";
$textbody .= "Telefon Business = ".$telbus."\n";
$textbody .= "Telefon Mobil = ".$telmob."\n\n";
$textbody .= "Wunschtermine = ".$wunschtermine."\n";
$textbody .= "Mögliche Termine = ".$moeglichetermine."\n";
$textbody .= "Nicht mögliche Termine = ".$nichtmoeglichetermine."\n\n";
$textbody .= "Beruf = ".$beruf."\n";
$textbody .= "Position = ".$position."\n\n";
$textbody .= 'Sprechen Sie regelmäßig '.$target_lang.' = '.$howoftenoptions[$howoften]."\n\n";
$textbody .= "Welche Inhalte und welcher Wortschatz sind für Sie wichtig? = \n".$wortschatz."\n\n";
$textbody .= 'In welchen Situationen haben Sie Schwierigkeiten, '.$target_lang." zu sprechen? = \n".$schwierigkeiten."\n\n";
$textbody .= 'In welchen Situationen sprechen Sie '.$target_lang.' / Für welche Situationen benötigen Sie '.$target_lang."? = \n".$situation."\n\n";
$textbody .= "(".$selbsteinschaetzung.") ".$selbst[$selbsteinschaetzung]."\n\n";
$textbody .= "----------------------------------------------------------------------------\n";
$textbody .= "Number of correct = ".$numcorrect." out of ".sizeof($a)." (".$perc."%)\n";
$textbody .= "----------------------------------------------------------------------------\n";
for ( $i=1 ; $i <= sizeof($a) ; $i++ ){
	$textbody .= "Question ".$i." = ".$q[$i]." ( ".$correct[$i]." )\n";
}

$howoftentext[1]=winchar("mdl. Übung");
$howoftentext[2]=winchar("mdl. keine Übung");
$howoftentext[3]=winchar("mdl. kaum/wenig Übung");

if ( strlen($selbsteinschaetzung) == 0 )
	$selbsteinschaetzung = 0;
$selbstlevel[0]="K.A.";
$selbstlevel[1]="A1";
$selbstlevel[2]="A2";
$selbstlevel[3]="B1";
$selbstlevel[4]="B2";
$selbstlevel[5]="C1";
$selbstlevel[6]="C2";

//Generate spreadsheet
 $tmpfile=tempnam("/tmp","placement");
 // Create an instance, passing the filename to create
 $xls = new Spreadsheet_Excel_Writer($tmpfile);

 $format_header_bold =& $xls->addFormat();
 $format_header_bold->setBold();
 $format_header_bold->setSize('13');

 $format_header =& $xls->addFormat();
 $format_header->setSize('13');

 $format_title =& $xls->addFormat();
 $format_title->setBold();
 $format_title->setColor('black');
 $format_title->setFgColor('yellow');
 $format_wrap =& $xls->addFormat();
 $format_wrap->setTextWrap();

 // Add a worksheet to the file, returning an object to add data to
 $sheet =& $xls->addWorksheet(substr($target_lang.' - '.winchar($name).', '.winchar($vorname),0,31));

$sheet->setColumn(0,4,20);
$sheet->write(0, 0, "Firma:", $format_header_bold);
$sheet->write(0, 1, winchar($firma), $format_header);
$sheet->write(1, 0, "Name:", $format_header_bold);
$sheet->write(1, 1, winchar($name), $format_header);
$sheet->write(2, 0, "Vorname:", $format_header_bold);
$sheet->write(2, 1, winchar($vorname), $format_header);
$sheet->write(3, 0, "Sprache:", $format_header_bold);
$sheet->write(3, 1, $target_lang, $format_header);
$sheet->write(5, 0, "Name", $format_title);
$sheet->write(5, 1, "Vorname", $format_title);
$sheet->write(5, 2, "Position", $format_title);
$sheet->write(5, 3, winchar("Gewünschte Inhalte"), $format_title);
$sheet->setColumn(4,5,24);
$sheet->write(5, 4, "Sprachniveau", $format_title);
$sheet->write(5, 5, "mdl. Selbsteinsch.", $format_title);
$sheet->setColumn(6,12,20);
$sheet->write(5, 6, "Wunschtermine", $format_title);
$sheet->write(5, 7, winchar("Mögliche Termine"), $format_title);
$sheet->write(5, 8, winchar("Nicht mögliche Termine"), $format_title);
$sheet->write(5, 9, "Email", $format_title);
$sheet->write(5, 10, "Tel. gesch.", $format_title);
$sheet->write(5, 11, "Tel. mob.", $format_title);
$sheet->write(5, 12, "Beruf", $format_title);
 
$sheet->write(6, 0, winchar($name));
$sheet->write(6, 1, winchar($vorname));
$sheet->write(6, 2, winchar($position));
$sheet->write(6, 3, winchar($wortschatz).", ".winchar($situation).", ".winchar($schwierigkeiten),$format_wrap);
$sheet->write(6, 4, winchar($niveau)." (".$numcorrect."/".$numquestions.")");
$sheet->write(6, 5, winchar($selbstlevel[$selbsteinschaetzung]).", ".$howoftentext[$howoften],$format_wrap);
$sheet->write(6, 6, winchar($wunschtermine),$format_wrap);
$sheet->write(6, 7, winchar($moeglichetermine),$format_wrap);
$sheet->write(6, 8, winchar($nichtmoeglichetermine),$format_wrap);
$sheet->write(6, 9, winchar($email));
$sheet->write(6, 10, winchar($telbus));
$sheet->write(6, 11, winchar($telmob));
$sheet->write(6, 12, winchar($beruf));

  // Finish the spreadsheet, (dumping it to the browser, if no file given)
$xls->close(); 

$testdate=date('Y-m-d_H:i:s');
$testname=$testdate.'_'.$target_lang.'_'.$name.'_'.$vorname;
$newfilename=$testname.'.xls';
$textbodyfilename=$testname.'.txt';
 
//create message with Swift_Mailer
$message = (new Swift_Message())

  // Give the message a subject
  ->setSubject('Etest: '.$firma.' - '.$name.', '.$vorname)

  // Set the From address with an associative array
  ->setFrom(['etests@modolingo.de' => 'Modotest'])

  // Set the To addresses with an associative array (setTo/setCc/setBcc)
  ->setTo([$to])

  // Give it a body
  ->setBody($textbody)

  // And optionally an alternative body
  // ->addPart('<q>Here is the message itself</q>', 'text/html')

  // Optionally add any attachments
  ->attach(Swift_Attachment::fromPath($tmpfile)->setFilename($newfilename))
  ;

//debug - echo contents of message to screen
//echo $message->toString(); 

$numsent = $mailer->send($message);
if ($numsent)
{
  echo("<td>Thank you very much for your time. Your test has been sent to MODOLINGO.</td></tr>");
  echo("<tr><td>Vielen Dank f&uuml;r Ihre Zeit. Ihr Test wurde an MODOLINGO geschickt.</td>");
}
else
{
  echo("<td>Unfortunately the message could not be successfully delivered to Modolingo. Please contact MODOLINGO: Phone.: 089 2101982-0 or Email: info@modolingo.de. Thank you.</td></tr>");
  echo("<tr><td>Leider konnte ihre Nachricht nicht an Modolingo gesendet werden. Bitte mit MODOLINGO in Verbindung setzten: Tel.: 089 2101982-0 or Email: info@modolingo.de. Danke sch&ouml;n.</td>");
}

//Write file to storage
$bucketName=getenv('STORAGE_BUCKET');

$storage = new StorageClient();
$bucket = $storage->bucket($bucketName);
$object = $bucket->upload($tmpfile, ['name' => $newfilename]);
$object = $bucket->upload($textbody, ['name' => $textbodyfilename]);

unlink($tmpfile);
 ?>
</tr>
</table>
</body>
</html>
