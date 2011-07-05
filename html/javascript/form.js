var MAX_SELECTIONS = 15;
var selectedIndexes = new Array(MAX_SELECTIONS);

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

function prepareForm(){
	if(document.entry.inputChoice[0].checked == true){
		//Select from list
		for(var i=0; i<MAX_SELECTIONS; i++){
					if(document.getElementsByName("selectedWords[]")[i].checked == true){
					}else{
						selectedIndexes[i] = false;
					}
				}
		
		//TODO set up form data POST form to php page
		var selections = document.getElementsByName("selectedWords[]");
		var selected = new Array(MAX_SELECTIONS);
		for(var i=0; i<MAX_SELECTIONS; i++){
			selected[i] = selections[i].checked;
		}
		
		
		$.post("process_entry.php", { 'choices[]': selected }, function(data){
			alert(data);//Completed Thanks!
			location.reload(true);
		});
	}
	else if(document.entry.inputChoice[1].checked == true){
		//None from above.
		for(var i=0; i<MAX_SELECTIONS; i++){
			document.getElementsByName("selectedWords[]")[i].checked = false;
			selectedIndexes[i] = false;
		}
		
		var selections = document.getElementsByName("selectedWords[]");
		var selected = new Array(MAX_SELECTIONS);
		for(var i=0; i<MAX_SELECTIONS; i++){
			selected[i] = selections[i].checked;
		}
		
		$.post("process_entry.php", { 'choices[]': selected }, function(data){
			alert(data);//Completed Thanks!
			location.reload(true);
		});
	}
	else{
		//No selections made
		alert("Please make a selection!");
	}
}