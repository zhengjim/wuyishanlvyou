		function dosubmit()		{			var lzform=document.lzform;			var email=lzform.email;			var y=document.getElementById("yz");			var yx=document.getElementById("yx");			if(lzform.email.value.match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/)==null)			{				yx.innerHTML="*邮箱的格式错误!";				yx.style.color="#b22b21";				return false;			}						return true;		} 		window.onload=function(){			var lzform=document.lzform;			var email=lzform.email;			var y=document.getElementById("yz");			var yx=document.getElementById("yx");				email.onblur=function()				{										if(lzform.email.value.match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/)==null)					{						yx.innerHTML="*邮箱的格式错误!";						yx.style.color="#b22b21";					}else					{						yx.innerHTML="*正确";						yx.style.color="#b22b21";					}				}					}