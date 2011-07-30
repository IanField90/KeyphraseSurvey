var MAX_SELECTIONS = 15; //normally 15, changes on load depending on duplicates
var selectedIndexes = new Array(MAX_SELECTIONS);

$(document).ready(function(){
	//Won't always be 15 - dynamically discover correct amount
	MAX_SELECTIONS = document.getElementsByName("selectedWords[]").length;
	
});

function radioSelection(){
	//Enable or disable tick boxes depending upon which radio button is selected.
	if(document.entry.inputChoice[0].checked == true){
		for(var i=0; i<MAX_SELECTIONS; i++){
			document.getElementsByName("selectedWords[]")[i].disabled  = false;
		}
	}
	else if(document.entry.inputChoice[1].checked == true){
		for(var i=0; i<MAX_SELECTIONS; i++){
			document.getElementsByName("selectedWords[]")[i].disabled  = true;
		}
	}	
}

function chk_click(){
	//Selection radio button on automatically
	document.entry.inputChoice[0].checked = true;
}

function prepareForm(){
	if(document.entry.inputChoice[0].checked == true){
		//Select from list below.
		// set up form data POST form to php page
		var selections = document.getElementsByName("selectedWords[]");
		var selected = new Array(MAX_SELECTIONS);
		var void_form = true;
		for(var i=0; i<MAX_SELECTIONS; i++){
			//fill selected array with all checked status
			selected[i] = selections[i].checked; //without this would just get 111, no 0's
			if(void_form == true && selections[i].checked){
				void_form = false;
			}
		}
		
		if(!void_form){
			// 10000101000 selected array used
			$.post("process_entry.php", { 'choices[]': selected }, function(data){
				alert("Thank-you for your time!"); //Can be removed or re-worded
				location.reload(true); // display a new page
			});
		}
		else{
			alert("Please make a selection!");
		}
	}
	else if(document.entry.inputChoice[1].checked == true){
		//None from above.
		var selected = new Array(MAX_SELECTIONS);
		//Even if checked don't count them
		for(var i=0; i<MAX_SELECTIONS; i++){
			selected[i] = false;
		}
		$.post("process_entry.php", { 'choices[]': selected }, function(data){
			alert("Thank-you for your time!");
			location.reload(true); // display a new page
		});
	}
	else{
		//No selections made
		alert("Please make a selection!");
	}
}