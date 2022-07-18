/*Coaching Sessions*/

function checkcoachingsession(){
  var a=document.addcoachingsession.Participants.value;
	var b=new Date(document.addcoachingsession.HeldDate.value);
	var c=new Date(document.addcoachingsession.CloseDate.value);
	var d=document.addcoachingsession.STime.value;
	var e=document.addcoachingsession.ETime.value;
	var date = new Date();
	if(a<2)
	{
		alert("Please set valid number of participants!");
		return false;
	}
	else if(b < date || c < date || b < c)
	{
		alert("Please Select Valid Dates!");
		return false;
	}
    else if(e <= d)
	{
		alert("Please Select Valid Times!");
		return false;
    }
	else
	{
		return( true );
	}
}
