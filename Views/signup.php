<?php session_destroy(); ?>
<?php  if (isset($msg)) {
  echo "<script>alert('$msg')</script>";
}else{} ?>
 <div class="container" style="width: 800px;"> <h2>Đăng Kí</h2></div>
<div class="container" style="width: 500px">

  <form action="<?php echo getUrl('signup-submit')?>" method="POST" >
    <div class="form-group">
      <label for="email">Tên Hiển Thị</label>
      <input type="text" class="form-control"  placeholder="Enter Username" name="name" required> 
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"  required>
    </div>
    <div class="form-group">
      <label for="pwd">Nhập Lại Mật Khẩu</label>
      <input type="password" class="form-control" id="repwd" placeholder="Enter re-password" name="repwd" required>
    </div>
<br>
    <button type="submit" class="btn btn-default"  onclick="return myFunction()" >Đăng Kí</button>

  </form>
  <br>
  <div id="checkpass" style="color: red;"></div>
</div>
    
    <!-- phần validation -->
<script>
function myFunction() {
   var password = document.getElementById('pwd').value;
   var repassword = document.getElementById('repwd').value;


    // Bước 2: Kiểm tra dữ liệu hợp lệ hay không
    if (password != repassword){
        document.getElementById('checkpass').innerHTML ='2 mật khẩu phải trùng nhau';
    }
    else{
        return true;
    }
 
    return false;

}
</script>