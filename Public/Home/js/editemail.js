function dosubmit()
		{
			var myform=document.myform;
			var cw=document.getElementById("cw");
			if(myform.email.value.match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/)==null)
			{
				cw.innerHTML="邮箱格式有误!";
				cw.style.color="#b22b21";
				return false;
			}
			return true;
		} 