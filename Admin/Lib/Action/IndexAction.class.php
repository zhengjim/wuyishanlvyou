<?php
/**
+--------------------------------------------------------
* 后台首页，登录验证
*
*/

class IndexAction extends CommonAction{

	/**
	* 后台首页
	* 
	*/
    public function index(){
		if(!$_SESSION['adminuser']){
			$this->display('login');
		}
		else{
			$this->display('index');
		}
        
    }

	/**
	* 后台登录验证
	* 
	*/
	public function login(){
		$m = M('Users');
		//判断验证码是否正确
		if($_SESSION['verify'] != md5($_POST['verify'])) {
		   $this->error('验证码错误！');
		   $this->display('login');
		}


		//判断用户名、密码是否为空
		if(empty($_POST['name']) || empty($_POST['pass'])) {
		   $this->error('用户名或密码为空！');
		   $this->display('login');
		}

		//判断是否为管理员
        $flag = $m ->where("name = '{$_POST['name']}'")->select();
        if($flag['uid'] > 5) {
            $this->error('用户名或密码错误!');
            $this->display('login');
        }


		$res = $m->where("name = '{$_POST['name']}' and pass = '".md5($_POST['pass'])."'")->select();
		if($res){
			$_SESSION['adminuser'] = $res[0];
			if($_SESSION['adminuser']['level']<100){
				unset($_SESSION['adminuser']);
				$this->error("用户名或密码错误!");
			}
			$this->success('登录成功',__APP__);
		}
		else{
			$this->error('登录失败');
			$this->display('login');
		}
	}

	/**
	* 退出登录
	*
	*/
	public function logOut(){
		unset($_SESSION['adminuser']);
		$this->display('login');
	}

	/**
	* 验证码函数
	*
	*/
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}

}