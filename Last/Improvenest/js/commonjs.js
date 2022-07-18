/*Registration form*/

function upassword(){
    var a=document.userForm.Password.value;
    var b=document.userForm.RPassword.value
	var c=new Date(document.userForm.Dob.value);
	var date = new Date();
	var age = date.getFullYear() - c.getFullYear();
	var m = date.getMonth() - c.getMonth();
    if (m < 0 || (m === 0 && date.getDate() < c.getDate())) {
        age--;
    }
    var checkboxs = document.getElementsByName('Sport[]');
    var okay=0;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            okay=1;
            break;
        }
    }
	if(c > date)
	{
		alert("Please Select Valid Birthday!");
		return false;		
	}
	else if(age < 18)
	{
		alert("You must be atleast 18 years old to register to Improvenest!");
		return false;
	}
    else if(okay == 0)
	{
		alert("Please Select Sport!");
		return false;		
	}
    else if(a!=b)
	{
		alert("Passsword Mismatch!");
		return false;
    }
	else
	{
		return true;			
	}
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

function epassword()	
{
    var e=document.updateForm.Password.value;
    var f=document.updateForm.RPassword.value	
	var g=new Date(document.updateForm.Dob.value);
	var today = new Date();
	var span = today.getFullYear() - g.getFullYear();
	var mont = today.getMonth() - g.getMonth();
    if (mont < 0 || (mont === 0 && today.getDate() < g.getDate())) {
        span--;
    }
    var checkboxs = document.getElementsByName('Sport[]');
    var okay=0;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            okay=1;
            break;
        }
    }
    var checkboxes = document.getElementsByName('Training[]');
    var flag=0;
    for(var i=0,l=checkboxes.length;i<l;i++)
    {
        if(checkboxes[i].checked)
        {
            flag=1;
            break;
        }
    }
	if(g > today)
	{
		alert("Please Select Valid Birthday!");
		return false;		
	}
	else if(span < 18)
	{
		alert("Age must be above 18!");
		return false;
	}
    else if(e!=f)
	{
		alert("Passsword Mismatch!");
		return false;
    }
    else if(okay == 0)
	{
		alert("Please Select Sport!");
		return false;		
	}
    else if(flag == 0)
	{
		alert("Please Select Training Aspect!");
		return false;		
	}
	else
	{
		return true;		
	}	
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