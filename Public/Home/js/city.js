$(function(){
	$("#edloc").click(function(){
		$.ajax({
			url:"__URL__/getProvince/",
			dataType:"text",
			success:function(data){
				alert(data[0].name);
			}
		});
		$(this).after(
			"<select name=\"pid\" id=\"pid\"><option value=\"0\">-请选择-</option>{foreach $list as $v}<option value=\"{$v.id}\">{$v.name}</option>{/foreach}"
		);
	})
})