/*Group Training Form*/

function checktraining(){
    var a=document.proposeGroupTrain.Participants.value;
	var b=new Date(document.proposeGroupTrain.HeldDate.value);
	var c=new Date(document.proposeGroupTrain.CloseDate.value);
	var d=document.proposeGroupTrain.STime.value;	
	var e=document.proposeGroupTrain.ETime.value;
	var date = new Date();
	var tomorrow = new Date(date);
	tomorrow.setDate(tomorrow.getDate() + 1);
	var dayaftom = new Date(date);
	dayaftom.setDate(dayaftom.getDate() + 2);
    var checkboxes = document.getElementsByName('Focus[]');
    var flag=0;
    for(var i=0,l=checkboxes.length;i<l;i++)
    {
        if(checkboxes[i].checked)
        {
            flag=1;
            break;
        }
    }
	if(a<2)
	{
		alert("Please set valid number of participants!");
		return false;		
	}	
	else if(b <= dayaftom || c <= tomorrow || b <= c)
	{
		alert("Please Select Valid Dates!");
		return false;		
	}	
    else if(e <= d)
	{
		alert("Please Select Valid Times!");
		return false;
    }
    else if(flag == 0)
	{
		alert("Please Select Event Focus!");
		return false;		
	}
	else
	{
		return true;			
	}
}