<?php 

/**
*
* 
*/
require_once 'Models/Category.php';
require_once 'Models/Product.php';
require_once 'Models/User.php';
require_once 'BaseController.php';
class HomeController extends BaseController
{
	function Index(){
		// config index o day
		
		if (isset($_GET['error'])=='mailfail') {
			$msg='tài khoản hoặc mật khẩu không chính xác';
		}
		else if (isset($_GET['logout'])=='true') {
			$msg=' Đăng xuất thành công';
		}
		else if (isset($_GET['sendmail'])=='success') {
			$msg='gửi mail thành công vui lòng check mail để lấy lại pass';
		}
		else if (isset($_GET['msg'])=='tokendie') {
			$msg='Token đã hết hạn hoặc không chính xác mời bạn lấy lại';
		}
		else if (isset($_GET['changepass'])=='error') {
			$msg=' thay đổi mật khẩu thất bại';
		}
		else if (isset($_GET['error'])=='mailfail') {
			$msg='  ';
		}

		else{
			$msg=null;
		}


		$spmoi=Product::where(['ShowMain','1']);
		$spxemnhieu=Product::where(['ShowMain','2']);
		$spbanchay=Product::where(['ShowMain','3']);
		$sphot=Product::where(['ShowMain','4']);
		$allpro=Product::all();
		$allCate=Category::all();
		$allinfo=['allCate' => $allCate,
		'allpro' => $spmoi,
		'spbanchay' => $spbanchay,
		'spxemnhieu' => $spxemnhieu,
		'sphot' => $sphot,
		'msg' =>$msg,


	];

	return $this->render("views/homepage.php", $allinfo, 'views/main.layout.php');
}
function About(){

	return $this->render("views/about.php", [''], 'views/main.layout.php');
}
function Contact(){
	return $this->render("views/contact.php", [''], 'views/main.layout.php');
}
function category(){
	$allCate=Category::all();
	return $this->render("views/category.php", ['allCate' => $allCate], 'views/main.layout.php');
}
function showcategory(){
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
	}else{$id=null;}
	$ShowallCate=Category::all();
	$allCate=Category::findOne($id);
	$allproduct1=Product::where(['idDanhMuc',$id]);
	return $this->render("views/show_category.php", ['allCate' => $allCate ,'allproduct1' => $allproduct1, 'ShowallCate' => $ShowallCate], 'views/main.layout.php');
}
function showProduct(){
	$id=$_GET['id'];
	$allproduct=Product::findOne($id);
	$showcate=Category::findOne($allproduct->idDanhMuc);
	return $this->render("views/chitietsp.php", ['allproduct' => $allproduct ,'showcate' => $showcate], 'views/main.layout.php');
}

function Login(){
	if (isset($_GET['signup'])=='success') {
		$msg='đăng kí thành công xin mới bạn đăng nhập';
	}
	else if (isset($_GET['changepass'])=='success') {
		$msg='Thay đổi mật khẩu thành công mời bạn đăng nhập lại';
	}
	else{
		$msg=null;
	}
	return $this->render("views/login.php", ['msg' =>$msg], 'views/main.layout.php');
}
function LoginSubmit(){
	if (isset($_POST['email'])) {
		$email=addslashes($_POST['email']);
		$password=sha1($_POST['password']);

		$checkmail=User::where(['email',$email]);
		foreach ($checkmail as $checkmail ) {
		}
		if (!empty($checkmail)) {
			if ($password=$checkmail->password && $email=$checkmail->email) {
				if ($checkmail->level==1) {
					$_SESSION['name']=$checkmail->Ten;		
					$_SESSION['id']=$checkmail->id;		
					$_SESSION['email']=$checkmail->email;		
					$_SESSION['level']="admin";			
					return $this->redirect('admin/admin');
				}else{
					$_SESSION['name']=$checkmail->Ten;		
					$_SESSION['id']=$checkmail->id;	
					$_SESSION['email']=$checkmail->email;		
					$_SESSION['level']='member';		
					return $this->redirect('member');
				}
			}else{
				return $this->redirect('login?error=mailfail');
			}
		}else{
			return $this->redirect('login?error=mailfail');
		}

	}else{
		return $this->redirect('login?error=loginfail');
	}

}


	// function 

function logout(){
	session_destroy();
}



function SignUp(){
	if (isset($_GET['signup'])=='issetemail') {
		$msg='Địa chỉ email đã tồn tại trên hệ thống xin mời chọn email khác';
	}else{
		$msg=null;
	}
	return $this->render("views/signup.php", ['msg' =>$msg], 'views/main.layout.php');
}


function SignUpSubmit(){
	if (isset($_POST['email'])) {
		$email=$_POST['email'];
		$checkmail=User::where(['email',"$email"]);
		if (empty($checkmail)) {
			$name=$_POST['name'];
			$pwd=$_POST['pwd'];

			$model=new User();
			$model->email=$email;
			$model->password=sha1($pwd);
			$model->Ten=$name;
			$model->level=2;
			$model->insert();
			return $this->redirect('login?signup=success');
		}else{
			return $this->redirect('signup?signup=issetemail');
		}
	}else{

	}
}

function AddToCard(){
	$id=$_GET['id'];
	$sosp=count($_SESSION['cart']);
	$dem=$sosp+1;
	$_SESSION['cart']["$dem"]=$id;
	return $this->redirect('index?cart=addsuccess');
}



}
?>