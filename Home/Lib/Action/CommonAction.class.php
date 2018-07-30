<?php
/**
*公共类
*
*/

class CommonAction extends Action {

    public function _initialize(){
        if($_REQUEST){
            foreach ($_REQUEST as $key =>$str){
                $filter_array = array("cnm","操你妈","草你妈","办证","代考","赌博","毒品","黑社会","杀人","色情");
                foreach ($filter_array as $filter){
                    if(strstr($str,$filter)){
                        $this->error("有敏感词,请重新输入!!");
                    }
                }

            }
        }
    }


    Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
	/**
	*@parem int $t 传入一个时间戳
	*return     返回$t和现在时间差
	*/
	public function gettime($t){   //获取时间差
		$a=time()-$t;
		if($a<60)
		{
			return "刚刚";
		}elseif($a>60&&$a<3600)
		{
			return floor($a/60)."分钟前";
		}elseif($a>3600&&$a<86400)
		{
			$tim=floor($a/3600)."小时";
			$m=(floor($a/3600))*3600;
			$n=$a-$m;
			if($n>60&&$n<3600)
			{
				 $tim.=floor($n/60)."分钟";
			}
			return $tim.'前';
		}elseif($a>86400)
		{
			$tim=floor($a/86400)."天";
			$k=$a-(floor($a/86400)*86400);
			//echo $k;
			if($k<86400&&$k>3600){
				$tim.=floor($k/3600)."小时";
				$m=(floor($k/3600))*3600;
				$n=$k-$m;
				if($n>60&&$n<3600)
				{
					$tim.=floor($n/60)."分钟";
				}
			}
			return $tim."前";
		}
	}


	/**
	*+----------------------------------------------------------------------------------------
	*		下面的都是多图片上传程序  
	*+----------------------------------------------------------------------------------------
	**/
	protected $imagePath = "../Public/uploads/active/"; //上传文件的目录,写相对入口文件的地址
	protected $truePath = "/WEB/WEB/Public/uploads/active/"; //上传文件的目录,写绝对地址，和上一个地址实际是一个目录
	protected $allowType = array(".jpg",".jpeg",".png",".gif");//允许上传的图片格式
	//执行图片上传
	public function swfupload(){
		$maxWidth  = $_GET['w'];//获取到的图片最大宽度
		$maxHeight = $_GET['h'];//获取到的图片最大高度
		$name = $_FILES["Filedata"]['name'];//获取上传图片的原名称
		$type = strrchr($name,".");//获取图片的格式
		
		//判断文件上传信息是否有效
		if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
			echo "ERROR:不是有效的上传文件";
			exit(0);
		}

		//判断是否为允许上传的图片格式
		if (!in_array($type, $this->allowType)) {
			echo "ERROR:{$type} 不是有有效的图片上传格式";
			exit(0);
		}

		// 获取图片上传临时文件名及路径
		//创建图片资源
		switch ($type) {
			case ".jpg":
				$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]);
				break;

			case ".jpeg":
				$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]);
				break;

			case ".gif":
				$img = imagecreatefromgif($_FILES["Filedata"]["tmp_name"]);
				break;

			case ".png":
				$img = imagecreatefrompng($_FILES["Filedata"]["tmp_name"]);
				break;

			default:
				$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]);
				break;
		}
		
		
		if (!$img) {
			echo "ERROR:无法创建图片 ". $_FILES["Filedata"]["tmp_name"];
			exit(0);
		}
		//保存图片信息
		$filename = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000).$type;
		move_uploaded_file($_FILES["Filedata"]["tmp_name"],$this->imagePath.$filename);
		
		//进行图片缩放小图
		$this->loadpic($img,$filename,"p_",$maxWidth,$maxHeight);
		$this->thumbpic($img,$filename,"p_s_",100,100);
		unlink($this->imagePath.$filename); //删除原图
		$_SESSION['images'][] = "p_".$filename;//把大图存到session里面
		$_SESSION['images'][] = "p_s_".$filename;//把小图存到session里面

	}
	

	/**
	*+----------------------------------------------------------------------------------------
	*		图片缩放和保存  不填充白色图床的
	*+----------------------------------------------------------------------------------------
	* @param resource  $img原图图片资源
	* @param string    $filename图片名称
	* @param string    $prefix图片前缀
	* @param string    $target_width图片最大宽度
	* @param string    $target_height图片最大高度
	**/
	public function loadpic($img,$filename,$prefix = "",$target_width = 100,$target_height = 100){
		$width = imageSX($img);
		$height = imageSY($img);
		$target_ratio = $target_width / $target_height;

		$img_ratio = $width / $height;

		if ($target_ratio > $img_ratio) {
			$new_height = $target_height;
			$new_width = $img_ratio * $target_height;
		} else {
			$new_height = $target_width / $img_ratio;
			$new_width = $target_width;
		}

		if ($new_height > $target_height) {
			$new_height = $target_height;
		}
		if ($new_width > $target_width) {
			$new_height = $target_width;
		}

		$new_img = ImageCreateTrueColor($new_width,$new_height);
		if (!@imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height)) {
			echo "ERROR:无法进行图片上传处理";//实际是缩放失败
			exit(0);
		}

		//根据不同的图片格式保存新图
		switch ($this->type) {
			case ".jpg":
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".jpeg":
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".gif":
				imagegif($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".png":
				imagepng($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			default:
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;
		}
		echo "FILEID:".$this->truePath.$prefix.$filename;
	}

	/**
	*+----------------------------------------------------------------------------------------
	*		图片缩放和保存  不填充白色图床，只做图片缩放，不做输出、显示
	*+----------------------------------------------------------------------------------------
	* @param resource  $img原图图片资源
	* @param string    $filename图片名称
	* @param string    $prefix图片前缀
	* @param string    $target_width图片最大宽度
	* @param string    $target_height图片最大高度
	**/
	public function thumbpic($img,$filename,$prefix = "",$target_width = 100,$target_height = 100){
		$width = imageSX($img);
		$height = imageSY($img);
		$target_ratio = $target_width / $target_height;

		$img_ratio = $width / $height;

		if ($target_ratio > $img_ratio) {
			$new_height = $target_height;
			$new_width = $img_ratio * $target_height;
		} else {
			$new_height = $target_width / $img_ratio;
			$new_width = $target_width;
		}

		if ($new_height > $target_height) {
			$new_height = $target_height;
		}
		if ($new_width > $target_width) {
			$new_height = $target_width;
		}

		$new_img = ImageCreateTrueColor($new_width,$new_height);
		if (!@imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height)) {
			echo "ERROR:无法进行图片上传处理";//实际是缩放失败
			exit(0);
		}

		//根据不同的图片格式保存新图
		switch ($this->type) {
			case ".jpg":
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".jpeg":
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".gif":
				imagegif($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".png":
				imagepng($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			default:
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;
		}
	}


	/**
	*+----------------------------------------------------------------------------------------
	*		图片缩放和保存  填充白色图床并在当前页面输出的
	*+----------------------------------------------------------------------------------------
	* @param resource  $img原图图片资源
	* @param string    $filename图片名称
	* @param string    $prefix图片前缀
	* @param string    $target_width图片最大宽度
	* @param string    $target_height图片最大高度
	**/
	public function loadpic2($img,$filename,$prefix = "",$target_width = 100,$target_height = 100){
		$width = imageSX($img);
		$height = imageSY($img);
		$target_ratio = $target_width / $target_height;

		$img_ratio = $width / $height;

		if ($target_ratio > $img_ratio) {
			$new_height = $target_height;
			$new_width = $img_ratio * $target_height;
		} else {
			$new_height = $target_width / $img_ratio;
			$new_width = $target_width;
		}

		if ($new_height > $target_height) {
			$new_height = $target_height;
		}
		if ($new_width > $target_width) {
			$new_height = $target_width;
		}

		$new_img = ImageCreateTrueColor($target_width,$target_height);
		$c = imagecolorallocate($new_img,255,255,255); //分配一个颜色
		imagefill($new_img,0,0,$c); //填充背景颜色
		if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) {
			echo "ERROR:无法进行图片上传处理";//实际是缩放失败
			exit(0);
		}
		//根据不同的图片格式保存新图
		switch ($this->type) {
			case ".jpg":
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".jpeg":
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".gif":
				imagegif($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			case ".png":
				imagepng($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;

			default:
				imagejpeg($new_img,$this->imagePath.$prefix.$filename); //输出图像
				break;
		}
		echo "FILEID:".$this->truePath.$prefix.$filename;
	}

	/**
	*+----------------------------------------------------------------------------------------
	*		存放在$_SESSION['images']中的图片删除
	*+----------------------------------------------------------------------------------------
	* @param string    $path图片存放真实路径
	* @param array     $picture  文件名
	**/
	public function delImgs($path,$picture){
		if($picture){
            unlink($path."p_".$picture);
            unlink($path."p_s_".$picture);
		}
	}

}