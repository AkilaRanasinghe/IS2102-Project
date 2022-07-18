/*Organizer Add Event Form*/

function checkeventvalues(){
    var a=document.addEvent.maxp.value;
	var b=new Date(document.addEvent.hdate.value);
	var c=new Date(document.addEvent.rcdate.value);
	var d=document.addEvent.starttime.value;	
	var e=document.addEvent.endtime.value;
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

/*Orgnizer tournament date check*/

function checktournamentalues(){
    var a=document.addTournament.maxp.value;
	var b=new Date(document.addTournament.rcdate.value);
	var c=new Date(document.addTournament.sdate.value);
	var d=new Date(document.addTournament.edate.value);
	var date = new Date();
	if(a<2)
	{
		alert("Please set valid number of participants!");
		return false;		
	}	
	else if(c < date || b < date || c < b || d < c)
	{
		alert("Please Select Valid Dates!");
		return false;		
	}	
	else
	{
		return( true );			
	}
}