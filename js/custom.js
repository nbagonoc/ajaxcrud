$(document).ready(function(){

	//create
	$('#createForm').on('submit', function(event){	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
		if( ($.trim($('#jsName').val()) != "") && ($.trim($('#jsEmail').val()) != "") && (reg.test($.trim($('#jsEmail').val())) == true) && ($.trim($('#jsPassword').val()) != "" ) ){
			event.preventDefault();
			$.ajax({
				url: "createProcess.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(funcMessage){
					$('#jsMessage').html(funcMessage);
				}
			});
			$('#jsName').val(""),$('#jsEmail').val(""),$('#jsPassword').val("");
		}
		else if( ($.trim($('#jsName').val()) == "") && ($.trim($('#jsEmail').val()) == "") && ($.trim($('#jsPassword').val()) == "" ) ){
			$('#jsMessage').html('<p class="error">Please fill-up all forms</p>') + $('#jsName').focus();		
			return false;
		}
		else if( $.trim($('#jsName').val()) == "" ){
			$('#jsMessage').html('<p class="error">Please enter name</p>') + $('#jsName').focus();			
			return false;
		}
		else if( $.trim($('#jsEmail').val()) == "" ){
			$('#jsMessage').html('<p class="error">Please enter email</p>') + $('#jsEmail').focus();
			return false;
		}
		else if(reg.test($.trim($('#jsEmail').val())) == false){
			$('#jsMessage').html('<p class="error">Please enter a valid email</p>') + $('#jsEmail').focus();		
			return false;
		}
		else if( $.trim($('#jsPassword').val()) == "" ){
			$('#jsMessage').html('<p class="error">Please enter password</p>') + $('#jsPassword').focus();			
			return false;		
		}
		else{
			$('#jsMessage').html('<p class="error">There was a problem while submiting the form. Please try again.</p>');
			return false;
		}
	});

	//update
	$('#updateForm').on('submit', function(event){	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;	
		if( ($.trim($('#jsName').val()) != "") && ($.trim($('#jsEmail').val()) != "") && (reg.test($.trim($('#jsEmail').val())) == true) && ($.trim($('#jsPassword').val()) != "" ) ){
			event.preventDefault();
			$.ajax({
				url: "editProcess.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(funcMessage){
					$('#jsMessage').html(funcMessage);
				}
			});
		}
		else if( ($.trim($('#jsName').val()) == "") && ($.trim($('#jsEmail').val()) == "") && ($.trim($('#jsPassword').val()) == "" ) ){
			$('#jsMessage').html('<p class="error">Please fill-up all forms</p>') + $('#jsName').focus();		
			return false;
		}
		else if( $.trim($('#jsName').val()) == "" ){
			$('#jsMessage').html('<p class="error">Please enter name</p>') + $('#jsName').focus();			
			return false;
		}
		else if( $.trim($('#jsEmail').val()) == "" ){
			$('#jsMessage').html('<p class="error">Please enter email</p>') + $('#jsEmail').focus();
			return false;
		}
		else if(reg.test($.trim($('#jsEmail').val())) == false){
			$('#jsMessage').html('<p class="error">Please enter a valid email</p>') + $('#jsEmail').focus();		
			return false;
		}
		else if( $.trim($('#jsPassword').val()) == "" ){
			$('#jsMessage').html('<p class="error">Please enter password</p>') + $('#jsPassword').focus();			
			return false;		
		}
		else{
			$('#jsMessage').html('<p class="error">There was a problem while submiting the form. Please try again.</p>');
			return false;
		}
	});

	//index.php read
	var loadCounter = 5;
	$('#load').click(function(){
		loadCounter = loadCounter + 5;
		$('table').load('loadMore.php', {
			loadCounterNew: loadCounter
		});
	});

	//read
	var loadCounter = 5;
	$('#loadEdit').click(function(){
		loadCounter = loadCounter + 5;
		$('table').load('loadMoreEdit.php', {
			loadCounterNew: loadCounter
		});
	});

});
