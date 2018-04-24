<form action="<?php echo getUrl('admin/create_product_submit') ?>" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
	<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<div class="col-sm-5 col-md-8">
					<h2>Thêm Sản Phẩm</h2>
					<br>
					<br>
					<!-- form upload thông tin bảng product -->
					
					<div class="form-group">
						<label class="control-label col-sm-2">Tên</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" placeholder="EX: IPHONE 8" name="Ten" required>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">Mô Tả</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id="comment" name="MoTa" required></textarea>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">Hình ảnh đặc trưng</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" id="email" name="hinhanh" required>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">giá</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="email" placeholder="200000" name="gia" required>
						</div>
					</div>

					<input type="hidden" name="created_by" value="<?php echo $_SESSION['id']; ?>">

					<div class="form-group">
            <label class="control-label col-sm-2">Danh Mục</label>
            <div class="col-sm-4">
              <select class="form-control" id="sel1" name="DanhMuc">
                <?php foreach ($ShowCategory as $ShowCategory) { ?>
                <option value="<?=$ShowCategory->id ?>"><?=$ShowCategory->Ten ?></option>
                <?php } ?>
              </select>
            </div>
          </div>


          	<div class="form-group">
            <label class="control-label col-sm-2">Tùy Chọn Hiển Thị</label>
            <div class="col-sm-6">
              <select class="form-control" id="sel1" name="ShowMain">
              
                <option value="1">sản phẩm mới</option>
                <option value="2">sản phẩm xem nhiều</option>
                <option value="3">sản phẩm Bán chạy</option>
                <option value="4">sản phẩm HOT</option>

       
              </select>
            </div>
          </div>




					
				<br>
			
			<div class="form-group">
				<label class="control-label col-sm-2"></label>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success" name="ok_upload">Submit</button>
				</div>
			</div>
</div>
</div>

		</div>

	</form>