
<!-- het memu -->



<!-- phần silde show -->
<br>
<div class="container" >
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="public/images/index1.jpg" alt="Los Angeles">
			</div>

			<div class="item">
				<img src="public/images/index2.png" alt="Chicago">
			</div>

			<div class="item">
				<img src="public/images/index4.jpg" alt="New York">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<hr>
</div>
<!-- hết phần slide show -->


<!-- phần logo -->

<div class="container">
	<?php foreach ($allCate as $allCate) {
		?>
		<a href='<?php echo getUrl("chitietdanhmuc?id=$allCate->id") ?>' ><div class="logo1"><p><?= $allCate->Ten?></p><img src='<?php echo getUrl("public/images/$allCate->Hinh") ?>' alt=""></div></a>
		<?php } ?>
	</div>

	<!-- hết phần logo -->


	<!-- phần content show -->
	<div class="container-fluid text-center">
		<div class="row content">
			<div class="col-sm-1"></div>
			<div class="col-sm-10 ">
				<section id="main">

					<hr>


					<div id="maincontent" class="col-xs-12 col-sm-8 col-md-12" >
						<div class="boxmain spmoi">
							<div class="tit-boxmain">
								<h3><span>Sản phẩm mới</span></h3>
							</div>
							<div class="ct-boxmain">
								<div class="row">
									<div id="spmoi" class="owl-carousel">
										<?php foreach ($allpro as $allpro1 ) {
											?>

											<div class="item">
												<div class="boxsp">
													<div class="imgsp">
														<a href="<?php echo getUrl("chitietsp?id=$allpro1->id") ?>"><img class="imgproduct" style="width: 170px;height: 200px;" src="public/images/<?= $allpro1->Hinh?>"></a>
														<div class="img-label">
															<img src="images/hot.png">
														</div>
													</div>
													<div class="namesp">
														<a href=""><?= $allpro1->Ten?></a>
													</div>
													<div class="pricesp"><?= number_format($allpro1->gia) ?>  Đ</div>
													<div class="button-hd">
														<a href='<?php echo getUrl("add-to-cart?id=$allpro1->id") ?>'><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
														<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
													</div>
												</div>
											</div>
											<?php } ?>

										</div>
									</div>
								</div>
							</div>

							<div class="boxmain">
								<div class="tit-boxmain">
									<h3><span>Sản Phẩm Xem Nhiều</span></h3>
								</div>
								<div class="ct-boxmain row m0">
									<?php foreach ($spxemnhieu as $spxemnhieu ) {
										?>

										<div class="col-xs-6 col-sm-4 col-md-3 p5">
											<div class="boxsp">
												<div class="imgsp">
													<a href='<?php echo getUrl("chitietsp?id=$spxemnhieu->id") ?>'><img class="imgproduct" style="width: 170px;height: 200px;" src="public/images/<?= $spxemnhieu->Hinh ?>"></a>
													<div class="img-label">
														<img src="public/images/hot.png">
													</div>
												</div>
												<div class="namesp">
													<a href=""><?= $spxemnhieu->Ten ?></a>
												</div>
												<div class="pricesp"><?= $spxemnhieu->gia ?> Đ</div>
												<div class="button-hd">
													<a href="<?php echo getUrl("add-to-cart?id=$spxemnhieu->id") ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
													<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>

										<?php } ?>
										
									</div>
								</div>
								<div class="boxmain">
									<div class="tit-boxmain">
										<h3><span>Sản Phẩm Bán Chạy</span></h3>
									</div>
									<div class="ct-boxmain row m0">

										<?php foreach ($spbanchay as $spbanchay ) {
											?>

											<div class="col-xs-6 col-sm-4 col-md-3 p5">
												<div class="boxsp">
													<div class="imgsp">
														<a href='<?php echo getUrl("chitietsp?id=$spbanchay->id") ?>'><img class="imgproduct" style="width: 170px;height: 200px;" src="public/images/<?= $spbanchay->Hinh ?>"></a>
														<div class="img-label">
															<img src="public/images/hot.png">
														</div>
													</div>
													<div class="namesp">
														<a href=""><?= $spbanchay->Ten ?></a>
													</div>
													<div class="pricesp"><?= $spbanchay->gia ?> Đ</div>
							<div class="button-hd">
								<a href="<?php echo getUrl("add-to-cart?id=$spbanchay->id") ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
								<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>

					<?php } ?>
					
				</div>
			</div>



			<div class="boxmain">
				<div class="tit-boxmain">
					<h3><span>Sản Phẩm HOT</span></h3>
				</div>
				<div class="ct-boxmain row m0">

					<?php foreach ($sphot as $sphot ) {
						?>

						<div class="col-xs-6 col-sm-4 col-md-3 p5">
							<div class="boxsp">
								<div class="imgsp">
									<a href='<?php echo getUrl("chitietsp?id=$sphot->id") ?>'><img class="imgproduct" style="width: 170px;height: 200px;" src="public/images/<?= $sphot->Hinh ?>"></a>
									<div class="img-label">
										<img src="public/images/hot.png">
									</div>
								</div>
								<div class="namesp">
									<a href=""><?= $sphot->Ten ?></a>
								</div>
								<div class="pricesp"><?= $sphot->gia ?> Đ</div>
							<div class="button-hd">
								<a href="<?php echo getUrl("add-to-cart?id=$sphot->id") ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
								<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>

					<?php } ?>
					
				</div>
			</div>



		</div>
	</section>
</div>
</div>
</div>




