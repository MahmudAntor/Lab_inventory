$(function(){	
	$(document).ready(function() {
		var options = { 
			dataType:'JSON',
			url: '../add_user.php', 
			success:    function(data) { 
				if (data['chk']!='0'){
					if (typeof data['f']!="undefined")
						$('#h_file').html(data['f']);
					else
						$('#h_file').html('');
				}
			} 
		}; 
		$('#sign_form').ajaxForm(options);
	}); 
});