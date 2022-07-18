/*tabs*/

function viewTab(evt, tabName) {
	var i, tabcontent, buttonlinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	buttonlinks = document.getElementsByClassName("buttonlinks");
	for (i = 0; i < buttonlinks.length; i++) {
		buttonlinks[i].className = buttonlinks[i].className.replace(" active", "");
	}
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";

	/*document.getElementById("defaultOpen").click();
	document.getElementById("traineesAgree").checked = false;
	document.getElementById("traineessbt").disabled = true;
	document.getElementById("requestsAgree").checked = false;
	document.getElementById("requestsbt").disabled = true;*/
}
