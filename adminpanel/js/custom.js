$(document).ready(function(){
	$("#classes").on("change",function(){
		var c_id = $("#classes").val();
		var classid = 'cid='+c_id;
		
		$.ajax({
			type: 'POST',
			url: 'ajax_student.php',
			data: classid,
			success:function(res){
				$("#students").html(res);
			}
		})
	})
})
