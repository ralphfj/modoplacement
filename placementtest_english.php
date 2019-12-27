<?php

include "lang.inc";
$basefile=basename($_SERVER['SCRIPT_FILENAME'],".php");
$base_basefile_array=split("_",$basefile);
$base_basefile=$base_basefile_array[0];
$language=$base_basefile_array[1];

switch($base_basefile) {
	case "einstufungstest":
		$page_language = "DE";
		break;
	case "placementtest":
		$page_language = "EN";
}
//echo "page_language=".$page_language."<br>";
//echo "language=".$language."<br>";

switch($language) {
	case "english":
	case "englisch":
		$language = "english";
		break;
	case "business":
		$language = "english";
		$target_lang_type = "Business";
		break;
	case "deutsch":
	case "german":
		$language = "deutsch";
		break;
	case "italian":
	case "italienisch":
		$language = "italian";
		break;
	case "french":
	case "franzoesisch":
		$language = "french";
		break;
	case "spanish":
	case "spanisch":
		$language = "spanish";
}
//echo $language;

$target_lang = $lang[$language][$page_language];
//echo $target_lang."<br>";

//echo $target_lang_type."<br>";
//echo $target_lang."<br>";
	

include "selbst".$page_language.".inc";
include "titles".$page_language.".inc";
include $basefile.".inc";
$num_questions=count($q);

echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sprache,Sprachschule,Schule,International,Language, Center, Munich, M&uuml;nchen,School, Training, Communicative Method" />
<title>MODOLINGO '.$title_head0.'</title>
<link href="modolingo.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript" src="validate.js"></script>
</head>';

echo'
<body>
<form name="placementtest" action="'.$base_basefile.'.process.php" method="post" onsubmit="return checkWholeForm(this);">
<input type="hidden" name="basefile" value="'.$basefile.'" />
<input type="hidden" name="language" value="'.$language.'" />
<input type="hidden" name="title"    value="'.$title_head5.'" />
<input type="hidden" name="language_upper" value="'.$language_upper.'" />
<input type="hidden" name="language_lower" value="'.$language_lower.'" />
<input type="hidden" name="page_language" value="'.$page_language.'" />
<input type="hidden" name="language" value="'.$language.'" />
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
	    <table width="800" frame="void" rules="none" border="0" align="center" cellpadding="3" cellspacing="5">
	      <tr>
	        <th colspan="2" align="left">'.$title_head1.'</th>
	      </tr>
	      <tr>
	        <td width="199" align="right">'.$title_firm.':</td>
	        <td width="599" align="left"><input type="text" name="firma" size="60" onkeypress="return disableEnterKey(event)" /></td>
	      </tr>
	      <tr>
	        <td width="199" align="right">'.$title_surname.':</td>
	        <td width="599" align="left"><input type="text" name="name" size="30" onkeypress="return disableEnterKey(event)" /></td>
	      </tr>
	      <tr>
	        <td width="199" align="right">'.$title_vorname.':</td>
	        <td width="599" align="left"><input type="text" name="vorname" size="30" onkeypress="return disableEnterKey(event)" /></td>
	      </tr>
	      <tr>
	        <td width="199" align="right">'.$title_email.':</td>
	        <td width="599" align="left"><input type="text" name="email" size="60" onkeypress="return disableEnterKey(event)" /></td>
	      </tr>
	      <tr>
	        <td width="199" align="right">'.$title_telbus.':</td>
	        <td width="599" align="left"><input type="text" name="telbus" size="60" onkeypress="return disableEnterKey(event)" /></td>
	      </tr>
	      <tr>
	        <td width="199" align="right">'.$title_telmob.':</td>
	        <td width="599" align="left"><input type="text" name="telmob" size="60" onkeypress="return disableEnterKey(event)" /></td>
	      </tr>
	    </table>
    </td>
  </tr>
  <tr>
    <td width="800">
	    <table width="800" frame="void" rules="none" border="0" align="center" cellpadding="3" cellspacing="5">
	    	<tr>
	    		<th colspan="2" align="left">'.$title_head2.'</th>
	    	</tr>
	        <tr>
	          <td width="199" align="right">'.$title_wunschtermine.':</td>
	          <td width="599" align="left"><input type="text" name="wunschtermine" size="60" onkeypress="return disableEnterKey(event)" /></td>
	        </tr>
	        <tr>
	          <td width="199" align="right">'.$title_moeglichetermine.':</td>
	          <td width="599" align="left"><input type="text" name="moeglichetermine" size="60" onkeypress="return disableEnterKey(event)" /></td>
	        </tr>
	        <tr>
	          <td width="199" align="right">'.$title_nichtmoeglichetermine.':</td>
	          <td width="599" align="left"><input type="text" name="nichtmoeglichetermine" size="60" onkeypress="return disableEnterKey(event)" /></td>
	        </tr>
	    </table>
    </td>
  </tr>
  <tr>
    <td width="800">
	    <table width="800" frame="void" rules="none" border="0" align="center" cellpadding="3" cellspacing="5">
	    	<tr>
	    		<th colspan="2" align="left">'.$title_head3.'</th>
	    	</tr>
	        <tr>
	          <td width="199" align="right">'.$title_beruf.':</td>
	          <td width="599" align="left"><input type="text" name="beruf" size="60" onkeypress="return disableEnterKey(event)" /></td>
	        </tr>
	        <tr>
	          <td width="199" align="right">'.$title_position.':</td>
	          <td width="599" align="left"><input type="text" name="position" size="60" onkeypress="return disableEnterKey(event)" /></td>
	        </tr>
	        <tr>
	          <td colspan="2" align="left">'.$title_question1.'</td>
		</tr>
		<tr>
	          <td width="199" align="right"></td>
		  <td width=599" alight="left"><input type="radio" name="howoften" value="1" onkeypress="return disableEnterKey(event)" />'.$howoftenoptions[1].'</td>
		</tr>
		<tr>
	          <td width="199" align="right"></td><td width=599" alight="left"><input type="radio" name="howoften" value="2" onkeypress="return disableEnterKey(event)" />'.$howoftenoptions[2].'</td>
		</tr>
		<tr>
		  <td width="199" align="right"></td><td width="599" align="left"><input type="radio" name="howoften" value="3" onkeypress="return disableEnterKey(event)" />'.$howoftenoptions[3].'</td>
	        </tr>
	        <tr>
	          <td colspan="2" align="left">'.$title_question2.'</td>
	        </tr>
	        <tr>
		  <td width="199"></td><td width="599" align="left"><textarea name="wortschatz" rows="3" cols="60" ></textarea></td>
	        </tr>
	        <tr>
	          <td colspan="2" align="left">'.$title_question3.'</td>
	        </tr>
	        <tr>
		<td width="199"></td><td width="599" align="left"><textarea rows="3" cols="60" name="schwierigkeiten" ></textarea></td>
	        </tr>
	        <tr>
	          <td colspan="2" align="left">'.$title_question4.'</td>
	        </tr>
	        <tr>
		<td width="199"></td><td width="599" align="left"><textarea rows="3" cols="60" name="situation" ></textarea></td>
	        </tr>
	    </table>
    </td>
  </tr>
  <tr>
    <td width="800">
            <table width="800" frame="void" rules="none" border="0" align="center" cellpadding="3" cellspacing="5">
                <tr>
                        <th colspan="2" align="left">'.$title_head4.'</th>
                </tr>
		<tr>
			<td colspan="2" align="left">'.$title_selbst.'</td>
		</tr>
                <tr>
                  <td width="199" align="right"><input type="radio" name="selbsteinschaetzung" value="1" onkeypress="return disableEnterKey(event)" /></td><td width=599" alight="left">'.$selbst[1].'</td>
                </tr>
                <tr>
                  <td width="199" align="right"><input type="radio" name="selbsteinschaetzung" value="2" onkeypress="return disableEnterKey(event)" /></td><td width=599" alight="left">'.$selbst[2].'</td>
                </tr>
                <tr>
                  <td width="199" align="right"><input type="radio" name="selbsteinschaetzung" value="3" onkeypress="return disableEnterKey(event)" /></td><td width=599" alight="left">'.$selbst[3].'</td>
                </tr>
                <tr>
                  <td width="199" align="right"><input type="radio" name="selbsteinschaetzung" value="4" onkeypress="return disableEnterKey(event)" /></td><td width=599" alight="left">'.$selbst[4].'</td>
                </tr>
                <tr>
                  <td width="199" align="right"><input type="radio" name="selbsteinschaetzung" value="5" onkeypress="return disableEnterKey(event)" /></td><td width=599" alight="left">'.$selbst[5].'</td>
                </tr>
                <tr>
                  <td width="199" align="right"><input type="radio" name="selbsteinschaetzung" value="6" onkeypress="return disableEnterKey(event)" /></td><td width=599" alight="left">'.$selbst[6].'</td>
                </tr>
	    </table>
    </td>
  </tr>
  <tr>
    <td width="800">
	    <table width="800" frame="void" rules="none" border="0" align="center" cellpadding="3" cellspacing="5">
	    	<tr>
	    		<th colspan="4" align="left">'.$title_head5.'</th>
	    	</tr>
	    </table>
    </td>
  </tr>';
  for ( $i = 1; $i<=$num_questions ; $i++ ){
  echo '<tr>
      <td>
            <table width="800" border="1" align="center" cellpadding="3" cellspacing="4">
	    	<tr>
	    		<th colspan="4" align="left">'.$question_word.' '.$i.'</th>
	    	</tr>';
		for ( $j = 1 ; $j <= count($q[$i]); $j++){
			echo '<tr><td colspan="4" >'.$q[$i][$j].'</td></tr>';
		}
		echo '<tr>';
		for ( $j = 1 ; $j <= count($o[$i]); $j++){
			echo '<td align="left" width="200">'.$o[$i][$j].'<input type="radio" name="q'.$i.'" value="'.$responses[$j].'" onkeypress="return disableEnterKey(event)" /></td>';
		}
	  	echo '</tr>
	    </table>
    </td>
  </tr>';
  }
echo '<tr>
    <td>
	<input type="submit" value="'.$title_submit.'"/>
    </td>
  </tr>
</table>
</form>
</body>
</html>';
?>
