	function dosubmit()
		{
			var myform=document.myform;
			var cw=document.getElementById("cw");
			if(myform.phone.value.match(/^[1][3,5][0-9]{9}$/)==null)
			{
				cw.innerHTML="电话格式错误";
				cw.style.color="#b22b21";
				return false;
			}
			return true;
		} 