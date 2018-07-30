function dosubmit()
		{
			var myform=document.myform;
			var cw=document.getElementById("cw");
			if(myform.pass1.value.match(/^[0-9a-zA-Z]{6,20}$/)==null)
			{
				cw.innerHTML="密码格式错误!";
				cw.style.color="#b22b21";
				return false;
			}
			if(myform.pass1.value!=myform.pass2.value)
			{
				cw.innerHTML="两次密码不一致!";
				cw.style.color="#b22b21";
				return false;
			}
			return true;
		} 