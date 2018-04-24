<form action="<?php echo getUrl('admin/create_category_submit') ?>" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
	<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<div class="col-sm-5 col-md-8">
					<h2>Thêm Danh Mục</h2>
					<br>
					<br>
					<!-- form upload thông tin bảng product -->
					
					<div class="form-group">
						<label class="control-label col-sm-3">Tên Danh Mục</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="email" placeholder="App, SamSung" name="DanhMuc" required>
						</div>
					</div>
				<br>

				<div class="form-group">
						<label class="control-label col-sm-3">Logo</label>
						<div class="col-sm-6">
							<input type="file" class="form-control" id="email" name="hinhanh" required>
						</div>
					</div>
			<br><br><br>
			<div class="form-group">
				<label class="control-label col-sm-4"></label>
				<div class="col-sm-8">
					<button type="submit" class="btn btn-success" name="ok_upload">Thêm</button>
				</div>
			</div>
</div>
</div>

		</div>

	</form>