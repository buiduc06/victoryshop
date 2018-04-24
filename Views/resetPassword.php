 <h2 style="margin-left: 200px;">Quên Mật Khẩu</h2>
<div class="container" style="width: 500px;margin-top: 20px;margin-bottom: 100px;">
 <br>
<form action="<?php echo getUrl('resetpw-submit')?>" method="POST">
  <div class="form-group">
    <label for="email">Vui Lòng Nhập Địa Chỉ Email của bạn</label><br><br>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <br>
  <button type="submit" class="btn btn-default">Lấy Lại Mật Khẩu</button>
</form>

</div>