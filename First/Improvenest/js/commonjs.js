/*Registration form*/

function upassword()	{
    var a=document.userForm.Password.value;
    var b=document.userForm.RPassword.value	
    if(a!=b)
	{
		alert("Passsword Mismatch!");
		return false;
    }
    if(a.length<8 || a.length>20)
	{
		alert("Password must contain only 8-20 characters");
		return false;
    }
    return( true );	
}

function usubmitenable(){
	if(document.getElementById("userAgree").checked)
	{
		document.getElementById("usersbt").disabled = false;
	}
	else
	{
		document.getElementById("usersbt").disabled = true;
	}
}

function opassword()	{
    var c=document.organiserForm.Password.value;
    var d=document.organiserForm.RPassword.value	
    if(c!=d)
	{
		alert("Passsword Mismatch!");
		return false;
    }
    if(c.length<8 || c.length>20)
	{
		alert("Password must contain only 8-20 characters");
		return false;
    }
    return( true );	
}

function osubmitenable(){
	if(document.getElementById("organiserAgree").checked)
	{
		document.getElementById("organisersbt").disabled = false;
	}
	else
	{
		document.getElementById("organisersbt").disabled = true;
	}
}

/*Edit Profile*/

function epassword()	{
    var e=document.updateForm.Password.value;
    var f=document.updateForm.RPassword.value	
    if(e!=f)
	{
		alert("Passsword Mismatch!");
		return false;
    }
    if(e.length<8 || e.length>20)
	{
		alert("Password must contain only 8-20 characters");
		return false;
    }
    return( true );	
}

/*Frequently asked questions*/

var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
		panel.style.maxHeight = null;
    } else {
		panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

/*tabs*/

function openUser(evt, userName) {
	var i, tabcontent, buttonlinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	buttonlinks = document.getElementsByClassName("buttonlinks");
	for (i = 0; i < buttonlinks.length; i++) {
		buttonlinks[i].className = buttonlinks[i].className.replace(" active", "");
	}
	document.getElementById(userName).style.display = "block";
	evt.currentTarget.className += " active";
	document.getElementById("userAgree").checked = false;
	document.getElementById("usersbt").disabled = true;
	document.getElementById("organiserAgree").checked = false;
	document.getElementById("organisersbt").disabled = true;
}