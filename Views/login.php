<?php session_destroy(); ?>
<?php 
if (isset($msg)) {
  echo "<script>alert('$msg')</script>";
}else{}

 ?>

<br>
<div class="container" style="background: #eee;height: 500px;">
  <br><br><br>

<form class="form-horizontal" style="margin-left: 300px;" action="login-submit" method="POST">
  <h2 style="margin-bottom: 20px;">ĐĂNG NHẬP</h2>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Địa Chỉ email :</label>
    <div class="col-sm-3">
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter username" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2"  for="pwd">Mật Khẩu :</label>
    <div class="col-sm-3"> 
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Nhớ Mật Khẩu</label>
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
       <a href="<?php echo getUrl('ResetPassword')?>" title="">Quên Mật Khẩu</a><br>
       <a href="" title="">Đăng Kí</a>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-success">Đăng Nhập</button>
    </div>
  </div>
</form>

</div>

</br>
