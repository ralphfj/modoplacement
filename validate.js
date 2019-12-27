function checkWholeForm (thisForm) {
    var why = "";
    why = checkemail(thisForm.email,"Email");
    why = checkrequired(thisForm.vorname,"Vorname") + why;
    why = checkrequired(thisForm.name,"Name") + why;
    why = checkrequired(thisForm.firma,"Firma") + why;
    if (why != "") {
       alert(why);
       return false;
    }
return true;
}
function checkrequired (thisobject,field_name) {
 var error = "";
 if (thisobject.value == null || thisobject.value == "") {
    error = "Bitte das Feld \"" + field_name + "\" ausf\374llen.\n";
    thisobject.focus();
    return error;
 }
 else 
    return "";
}

function checkemail (thisobject,field_name) {
  var error = "";
  if (thisobject.value == null || thisobject.value == "") {
    error = "Bitte das Feld \"" + field_name + "\" ausf\374llen.\n";
    thisobject.focus();
    return error;
  }
  else
    atpos = thisobject.value.indexOf("@");
    dotpos = thisobject.value.indexOf(".");
    if ( atpos < 1 || dotpos < 1){
    //if (atpos<1||dotpos-atpos<2) {
    	error = "Die Email Adresse ist nicht g\374ltig.\n";
        thisobject.focus();
	return error;
    }
    else
        return "";
}
function disableEnterKey(evt)
{
var key = (window.Event) ? evt.which : evt.keyCode;
if (key == 13 ) return false;
return true;
}

//document.onkeypress = disableEnterKey;
