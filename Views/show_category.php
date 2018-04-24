<!-- ajax phan hang  -->
<script>
	function showCustomer(str) {
		var xhttp;    
		if (str == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "public/Ajax/AjaxFilter.php?idTH="+str, true);
		xhttp.send();
	}

</script>

<div class="container-fluid" style="background: #f3f3f3">
<div class="container" style="margin-top: 50px">

		<!-- PHẤN BEN TRAI -->
		<div class="col-md-3" id="colll1">
			<br>
			<b>BỘ LỌC</b>
			<hr>
			<b>Hãng sản xuất</b><button type="button" id="btsht" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-filter"></i></button>

			<br><br>
			<div id="demo" class="active" class="collapse">
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm Thương Hiệu">
				<div class="vertical-menu">

					<table id="myTable">
						<tr class="header">
						</tr>
						<tr>
							<td><input type="radio" name="FilterDanhMuc" onchange="showCustomer(this.value)" value="0">Tất Cả</td>
						</tr>
						<?php foreach ($ShowallCate as $allCate ) {
							?>
							<tr>
								<td><input type="radio" name="FilterDanhMuc" onchange="showCustomer(this.value)" value="<?= $allCate->id?>"><?= $allCate->Ten?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>

				<hr>
				<b>Khác</b><button type="button" id="btsht" data-toggle="collapse" data-target="#demo1"><i class="glyphicon glyphicon-filter"></i></button>

				<br><br>
				<div id="demo1" class="collapse">
					<div class="vertical-menu">

						<table id="myTable">
							<tr class="header">
							</tr>
							<script>
	function showCustomer1(str1) {
		var xhttp;    
		if (str1 == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "public/Ajax/AjaxFilter.php?idM="+str1, true);
		xhttp.send();
	}

</script>
							<tr>
								<td><input type="radio" name="FKhac" onchange="showCustomer1(this.value)" value="0">Tất Cả</td>
							</tr>

							<tr>
								<td><input type="radio" name="FKhac" onchange="showCustomer1(this.value)" value="1">Sản phẩm mới</td>
							</tr>

							<tr>
								<td><input type="radio" name="FKhac" onchange="showCustomer1(this.value)" value="2">Sản phẩm mua nhiều</td>
							</tr>

							<tr>
								<td><input type="radio" name="FKhac" onchange="showCustomer1(this.value)" value="3">sản phẩm bán chạy</td>
							</tr>
							<tr>
								<td><input type="radio" name="FKhac" onchange="showCustomer1(this.value)" value="3">sản phẩm HOT</td>
							</tr>

						</table>
					</div>
				</div>
			</div>
			<!-- #PHẦN BÊN TRÁI -->



			<!-- PHẦN BÊN PHẢI -->
			<div class="col-md-9" id="txtHint"  style="background: white">
				<?php if (isset($_GET['id'])!=null): ?>

					<div class="boxmain">
						<br>
								<div class="tit-boxmain">
									<h3><span>ĐIỆN THOẠI <?= $allCate->Ten ?></span></h3>
								</div>
								<hr>
								<div class="ct-boxmain row m0">
									<?php foreach ($allproduct1 as $allproduct ) {
										?>

										<div class="col-xs-6 col-sm-4 col-md-3 p5">
											<div class="boxsp">
												<div class="imgsp">
													<a href='<?php echo getUrl("chitietsp?id=$allproduct->id") ?>'><img class="imgproduct" style="width: 160px;height: 180px;" src="public/images/<?= $allproduct->Hinh ?>"></a>
													<div class="img-label">
														<img src="public/images/hot.png">
													</div>
												</div>
												<div class="namesp">
													<a href=""><?= $allproduct->Ten ?></a>
												</div>
												<div class="pricesp"><?= $allproduct->gia ?> Đ</div>
							<div class="button-hd">
								<a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
								<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>

					<?php } ?>
					
				</div>
			</div>


				<?php else: ?>
					<h3>ko có sản phẩm nào phù hợp</h3>
				<?php endif ?>

			</div>

			<!-- PHẦN BÊN PHẢI # -->
		</div>
</div>