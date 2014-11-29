$( document ).ready(function() {
 	
	var max_questions   = 10;
	var max_answers     = 6;
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $("#input_button"); //Add button ID
    
    var x = 2; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_answers){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><p>Answer '+ x +':</p><input type="text" name="answer'+ x +'"/><br><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	
	$("#addQuestion").on("click",addQuestion);
	$("#addAnswer").on("click",addAnswer);
	});

function firstTagChild(element) {

	return element.children().first();
}

function addQuestion() {
	var original = firstTagChild($("#poll"));
	original.clone().appendTo($("#questionsAdded"));
}