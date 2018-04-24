<?php 

/**
*
* 
*/
// class admin
require_once 'Models/Category.php';
require_once 'Models/Product.php';
require_once 'Models/User.php';
require_once 'BaseController.php';
/**
* 
*/

class DeleteController extends BaseController
{
	

	function Deleteproduct(){
		$id=$_GET['id'];
		$xoasp=new Product();
		$xoasp->id="$id";
		$xoasp->delete();
		$checkDelete=Product::findOne($id);
		if (!empty($checkDelete)) {
			return $this->redirect("admin/index?deletefail=faile");
		}else{
			return $this->redirect("admin/index?delete=success");
		}
	}

	function DeleteUsers(){
		$id=$_GET['id'];
		$cid=$_SESSION['id'];
		$xoathanhvien=new User();
		$checklv=User::findOne($id);
		$xoatintucofthanhvien1=Product::delete2(['create_by',"$id"]);
		$xoatintucofthanhvien4=Category::delete2(['create_by',"$id"]);
		$xoathanhvien->id="$id";
		if ($checklv->level=='1') {
		return $this->redirect("admin/show-member?delete=notdeleteadmin");
		}else if ($id==$cid) {
			return $this->redirect("admin/show-member?delete=notdeleteyou");
		}
		else{
			$xoathanhvien->delete();
			$checkDelete=User::findOne($id);
			if (!empty($checkDelete)) {
				return $this->redirect("admin/show-member?deletefail=faile");
			}else{
				return $this->redirect("admin/show-member?delete=success");
			}
		}
	}

	function Deletecategory(){
		$id=$_GET['id'];
		$xoatintuc=new Category();
		$XoaTinTucOfDanhMuc=Product::delete2(['idDanhMuc',"$id"]);
		$xoatintuc->id="$id";
		$xoatintuc->delete();
		$checkDanhMuc=Category::findOne($id);
		if (!empty($checkDanhMuc)) {
			return $this->redirect("admin/category?deletefail=error");
		}else{
			return $this->redirect("admin/category?delete=success");
		}
	}


}
