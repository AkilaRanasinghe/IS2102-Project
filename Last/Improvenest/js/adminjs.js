/*Federation account password check

function upassword(){
    var a=document.userForm.Password.value;
    var b=document.userForm.RPassword.value
	
   
	
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
*/
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

/*
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

/*Edit Profile

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

*/