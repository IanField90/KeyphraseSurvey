var MAX_SELECTIONS = 15;
var selectedIndexes = new Array(MAX_SELECTIONS);


function radioSelection(){
	//Enable or disable tick boxes depending upon which radio button is selected.
	if(document.entry.inputChoice[0].checked == true){
		for(var i=0; i<MAX_SELECTIONS; i++){
			document.entry.selectedWords[i].disabled = false;
		}
	}
	else if(document.entry.inputChoice[1].checked == true){
		for(var i=0; i<MAX_SELECTIONS; i++){
			document.entry.selectedWords[i].disabled = true;
		}
	}	
}

function prepareForm(){
	if(document.entry.inputChoice[0].checked == true){
		//Select from list
		for(var i=0; i<MAX_SELECTIONS; i++){
			if(document.list.selectedWords[i].checked == true){
				selectedIndexes[i] = true;
			}else{
				selectedIndexes[i] = false;
			}
		}
		
		//TODO set up form data
	}
	else if(document.entry.inputChoice[1].checked == true){
		//None from above.
		for(var i=0; i<MAX_SELECTIONS; i++){
			selectedIndexes[i] = false;
		}
		
		//TODO set up form data
	}
	else{
		//No selections made
		alert("Please make a selection!");
	}
}