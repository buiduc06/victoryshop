<?php 

/**
*
* 
*/
// class admin
require_once 'Models/Category.php';
require_once 'Models/Product.php';
require_once 'Models/User.php';
require_once 'Models/ForgetPassword.php';
require_once 'BaseController.php';
class AdminController extends BaseController
{
	function Index(){
		if (isset($_GET['insert'])=='success') {
			$msg='Thêm Sản Phẩm Thành Công';
		}elseif (isset($_GET['delete'])=='success') {
			$msg='Xóa Sản Phẩm Thành Công';
		}
		elseif (isset($_GET['update'])=='success') {
			$msg='Update Sản Phẩm Thành Công';
		}
		elseif (isset($_GET['deletefail'])=='faile') {
			$msg='error ! xóa sản phẩm ko thành công vui lòng kiểm tra lại liên kết giữa các bảng hoặc thử lại sau';
		}

		else{
			$msg=null;
		}
		$product=Product::all();
		return $this->render("views/admin/index.php", ['product' => $product ,'msg' =>$msg], 'views/admin/admin.layout.php');
	}
	

	function ShowOder(){

		return $this->render("views/admin/show_oder.php", [], 'views/admin/admin.layout.php');
	}

	function ShowMember(){
		$users=User::all();
		if (isset($_GET['delete'])) {
			if ($_GET['delete']=='notdeleteadmin') {
				$msg='bạn không để xóa tài khoản quản trị viên nếu muốn xóa tài khoản này xin mời thay đổi cấp độ trong bảo mật';
			}else if ($_GET['delete']=='success') {
				$msg='xóa tài khoản thành công';
			}
			else{
				$msg=null;
			}
		}else
		{
			$msg=null;
		}

		return $this->render("views/admin/show_member.php", ['users' => $users,'msg' => $msg], 'views/admin/admin.layout.php');
	}









// ----category--------------------------------
// 

	function UpdateCategory(){
		$id = isset($_GET['id']) ? $id=$_GET['id'] : null ;
		if (isset($_GET['danhmuc'])=='datontai') {
			$msg='Danh Mục Đã Tồn Tại Trên Hệ Thống Vui Lòng Lựa Chọn Tên Khác';
		} else {
			$msg=null;
		}
		
		$ShowCategory=Category::findOne($id);
		return $this->render("views/admin/category_update.php", ['msg' => $msg , 'ShowCategory' => $ShowCategory], 'views/admin/admin.layout.php');
	}

	function Category(){
		$category=Category::all();
		if (isset($_GET['update'])=='success') {
			$msg='Cập nhật danh mục thành công';
		}elseif (isset($_GET['insert'])=='success') {
			$msg='tạo danh mục mới thành công';
		}
		elseif (isset($_GET['delete'])=='success') {
			$msg='xóa danh mục thành công';
		}
		else{
			$msg=null;
		}
		return $this->render("views/admin/admin_category.php", ['category' => $category, 'msg' =>$msg], 'views/admin/admin.layout.php');
	}

	function CreateCategory(){
		if (isset($_GET['danhmuc'])=='tontai') {
			$msg='Tên danh Mục Đã Tồn Tại Trên Hệ Thống Xin mời Chọn Tên Danh Mục Khác';
		}
		else if (isset($_GET['uploadimage'])=='error') {
			$msg='Định Dạng File ảnh bị lỗi vui lòng chọn lại';
		} 
		
		else{
			$msg=null;
		}
		$ShowCategory=Category::all();
		return $this->render("views/admin/create_category.php", ['msg' => $msg , 'ShowCategory' => $ShowCategory], 'views/admin/admin.layout.php');
	}

	function CreateProduct(){
		if (isset($_GET['uploadimage'])) {
			$msg='Định Dạng ảnh sai xin mới chọn lại';
		}else{
			$msg=null;
		}
		$ShowUser=User::all();
		$ShowCategory=Category::all();
		return $this->render("views/admin/create_product_form.php", ['ShowUser' => $ShowUser , 'ShowCategory' => $ShowCategory ,'msg' => $msg], 'views/admin/admin.layout.php');
	}
	function CreateCategorySubmit(){

		$DanhMuc = isset($_POST['DanhMuc'])==true ? $_POST['DanhMuc'] : null;//gán post danh muc cho danh mục
		$id = isset($_POST['id'])==true ? $_POST['id'] : null;
		$checkdanhmuc=Category::where(['Ten',"$DanhMuc"]); //truyền $danhmuc vào nếu tồn tại và tồn tại biến $i(ko phải là upate) thì nhảy sang trường hợp 1 trở về và thông báo lỗi
		foreach ($checkdanhmuc as $checkdanhmuc1) {// vòng lặp láy ra giá trị
		}
		$checktru=Category::where(['Ten',"$DanhMuc"]);// vòng check dành cho update nếu tồn tại thì nhảy vào vòng lặp 
		foreach ($checktru as $checktru1 ) {
		}

		if (isset($id)!=true && !empty($checkdanhmuc1)) {
			return $this->redirect('admin/category_create?danhmuc=tontai');
			die;
		}else if (!empty($checktru1) && isset($id)) {
			return $this->redirect("admin/update_category?danhmuc=datontai&id=$id");
			die;
		}

		else{


			$created_by =$_SESSION['id'];
			if ($id != null) {
			// phần dành cho update
				$model=Category::findOne($id);
				$upLoadHA=new BaseModel();
				$upLoadHA->filename='hinhanh';
				$upLoadHA->UploadAnh1();
				$HAA=$upLoadHA->imgupload;
		// neu nguoi dung khong chon anh thi mac dinh se lay anh co san trong db
				if (!empty($upLoadHA->error)) {
					return $this->redirect("admin/update_category?uploadimage=error&id=$id");
					die;
				}else{
					$HA = (!empty($HAA)) ? $HAA : $model->Hinh ;
				}
			}else{
				$model = new Category();

// phần validate dành cho insert
				$upLoadHA=new BaseModel();
				$upLoadHA->filename='hinhanh';
				$upLoadHA->UploadAnh();
				if (!empty($upLoadHA->error)) {
					return $this->redirect('admin/category_create?uploadimage=error');
					die;
				}else{
					$HA=$upLoadHA->imgupload;

				}


			}


			$model->Ten = $DanhMuc;
			$model->created_by = $created_by;
			$model->Hinh = $HA;

			if(isset($model->id)){
				$model->update();

				return $this->redirect("admin/category?update=success");

			}else{
				$model->insert();
				return $this->redirect("admin/category?insert=success");

			}
		}


	}



// --------------------------end category------------------------
// 
// 
// 


	function UpdateFormProduct(){
		if (isset($_GET['uploadimage'])) {
			$msg='Định Dạng ảnh sai xin mới chọn lại';
		}else{
			$msg=null;
		}
		$id=$_GET['id'];
		$ShowUser=User::all();
		$ShowProduct=Product::where(['id',"$id"]);
		return $this->render("views/admin/update_Product_form.php", ['ShowUser' => $ShowUser , 'ShowProduct' => $ShowProduct , 'msg' => $msg], 'views/admin/admin.layout.php');
	}



	function CreateProductSubmit(){

		$id = isset($_POST['id'])==true ? $_POST['id'] : null;
		$Ten = isset($_POST['Ten'])==true ? $_POST['Ten'] : null;
		$NoiDung = isset($_POST['MoTa'])==true ? $_POST['MoTa'] : null;
		$gia = isset($_POST['gia'])==true ? $_POST['gia'] : null;
		$ShowMain = isset($_POST['ShowMain'])==true ? $_POST['ShowMain'] : null;
		$DanhMuc = isset($_POST['DanhMuc'])==true ? $_POST['DanhMuc'] : null;
		$created_by = isset($_POST['created_by'])==true ? $_POST['created_by'] : null;
		if ($id != null) {
			// phần dành cho update
			$model=Product::findOne($id);
			$upLoadHA=new BaseModel();
			$upLoadHA->filename='hinhanh';
			$upLoadHA->UploadAnh1();
			$HAA=$upLoadHA->imgupload;
		// neu nguoi dung khong chon anh thi mac dinh se lay anh co san trong db
			if (!empty($upLoadHA->error)) {
				return $this->redirect("admin/update_Product_form?uploadimage=error&id=$id");
				die;
			}else{
				$HA = (!empty($HAA)) ? $HAA : $model->Hinh ;
			}
		}else{
			$model = new Product();

// phần validate dành cho insert
			$upLoadHA=new BaseModel();
			$upLoadHA->filename='hinhanh';
			$upLoadHA->UploadAnh();
			if (!empty($upLoadHA->error)) {
				return $this->redirect('admin/create_product?uploadimage=error');
				die;
			}else{
				$HA=$upLoadHA->imgupload;

			}


		}


		$model->Ten = $Ten;
		$model->NoiDung = $NoiDung;
		$model->gia = $gia;
		$model->ShowMain = $ShowMain;
		$model->created_by = $created_by;
		$model->idDanhMuc = $DanhMuc;
		$model->Hinh = $HA;

		if(isset($model->id)){
			$model->update();

			return $this->redirect("admin/index?update=success");

		}else{
			$model->insert();
			return $this->redirect("admin/index?insert=success");

		}

	}
	function Security(){
		$users=User::all();
		if (isset($_GET['capquyen'])=='success') {
			$msg='cấp quyền thành công';
		}else{
			$msg=null;
		}
		return $this->render("views/admin/security.php", ['users' => $users, 'msg' => $msg], 'views/admin/admin.layout.php');
	}

	function addUser(){
		return $this->render("views/admin/addUser.php", [], 'views/admin/admin.layout.php');
	}
	function CapQuyenuse(){
		if (isset($_POST['id']) && isset($_POST['idaccess'])) {
			$id=$_POST['id'];
			$level=$_POST['idaccess'];
			$capquyen=User::findOne($id);
			$capquyen->level=$level;
			$capquyen->update();
			return $this->redirect("admin/security?capquyen=success");
		}else{
			return $this->redirect("admin/index?fail");
		}
	}

	function blockUser(){
		if (isset($_POST['id']) && isset($_POST['idactive'])) {
			$id=$_POST['id'];
			$active=$_POST['idactive'];
			$capquyen=User::findOne($id);
			$capquyen->active=$active;
			$capquyen->update();
			return $this->redirect("admin/security?Active=$active");
		}else{
			return $this->redirect("admin/index?fail");
		}
	}

	function ResetPassword(){
		return $this->render("views/resetPassword.php",[],"views/main.layout.php");
	}
	function ResetPwSubmit(){
		if (isset($_POST['email'])!=null) {
			$email=$_POST['email'];
			$checkmail=User::where(['email',"$email"]);
			$token1=$email.date('Y-m-d :H:s');
			$token=sha1($token1);
			if (!empty($checkmail)) {
				$model=new ForgetPassword();
				$model->email=$email;
				$model->token=$token;
				$model->insert();
				return $this->redirect("sendmail?token=$token");
			}else{
				return $this->redirect('index?sendmail=success');
			}
		}else{
			return $this->redirect('index?sendmail=success');
		}
	}

	function ChangePW(){
		if (isset($_GET['token'])!=null) {
			$token=$_GET['token'];
			$checktoken=ForgetPassword::where(['token',"$token"]);
			if (!empty($checktoken)) {
				foreach ($checktoken as $checktoken ) {
				}
				$mggg=$checktoken->email;
				return $this->render("views/changepw.php",['mggg' => $mggg],"views/main.layout.php");
			}else{
				return $this->redirect('index?msg=tokendie');
			}

		}else{
			return $this->redirect('index?msg=tokendie');
		}
		
	}
	function updatepasssss(){
		if (isset($_POST['pws'])) {
			$password=$_POST['pws'];
			$email=$_POST['email'];
			$layid=User::where(['email',"$email"]);
			foreach ($layid as $layid1 ) {
			}
			$model=User::findOne($layid1->id);
			$model->email=$email;
			$model->password=sha1($password);
			$model->update();
			$deletetoken3=ForgetPassword::delete2(['email',"$email"]);

			return $this->redirect('login?changepass=success');
		}else{
			return $this->redirect('index?changepass=error');
		}
	}

}
