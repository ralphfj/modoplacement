<?php

echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sprache,Sprachschule,Schule,International,Language, Center, Munich, M&uuml;nchen,School, Training, Communicative Method" />
<title>MODOLINGO Placement Test</title>
<link href="modolingo.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript" src="validate.js"></script>
</head>';


echo'
<body>
<form name="frontcontroller" action="placementtest_form.php" method="post" onsubmit="return checkWholeForm(this);">
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

<br>
<br>
  
	<tr>
    <td width="800">
        <table width="800" frame="void" rules="none" border="0" align="center" cellpadding="3" cellspacing="5">
            <tr>
                <th colspan="2" align="left">Select languages / Sprachen auswählen</th>
            </tr>
            <tr>
				<td width="199" align="right">Your language / Ihre Sprache</td>
				<td width="599" align="left">
					<select name="page_language" onkeypress="return disableEnterKey(event)" >
						<option value="EN">English</option>
						<option value="DE">Deutsch</option>
					</select>
				</td>
            </tr>
            <tr>
				<td width="199" align="right">Target language / Zielsprache</td>
				<td width="599" align="left">
					<select name="language" onkeypress="return disableEnterKey(event)" >
						<option value="english">English / Englisch</option>
						<option value="Business english"> English / Geschäftsenglisch</option>
						<option value="german">German / Deutsch</option>
						<option value="italian">Italian / Italienisch</option>
						<option value="french">French / Französisch</option>
						<option value="spanish">Spanish / Spanisch</option>
					</select>
				</td>
            </tr>
		</table>
	</td>
	</tr>';

echo '<tr>
    <td>
        <input type="submit" value="Go to the test / Weiter zum Test"/>
    </td>
  </tr>
</table>
</form>
</body>
</html>';
?>

	

