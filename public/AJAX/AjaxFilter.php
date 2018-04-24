<?php 
require_once '../../Models/BaseModel.php';
require_once '../../Models/Category.php';
require_once '../../Models/Product.php';

?>
<?php if (isset($_GET['idTH'])!=null && !isset($_GET['idM'])): ?>
	<?php if ($_GET['idTH']==0): ?>
		<?php 
		$allCatek=null;
		$kk1=Product::all();
		?>
	<?php else: ?>
		<?php 
		$idd=$_GET['idTH'];
		$allCatek=Category::findOne($idd);
		$kk1=Product::where(['idDanhMuc',$idd]);
		?>
	<?php endif ?>
	<div class="boxmain">
		<br>
		<div class="tit-boxmain">
			<?php if ($allCatek!=null): ?>
				<h3><span>ĐIỆN THOẠI <?= $allCatek->Ten ?></span></h3>
			<?php else: ?>
				<h3><span>TẤT CẢ ĐIỆN THOẠI</span></h3>
			<?php endif ?>

		</div>
		<hr>
		<?php foreach ($kk1 as $kkk2 ): ?>

			<div class="col-xs-6 col-sm-4 col-md-3 p5" style="margin-top: 5px;margin-bottom: 5px;">
				<div class="boxsp">
					<div class="imgsp">
						<a href=""><img class="imgproduct" style="width: 160px;height: 180px;" src="public/images/<?= $kkk2->Hinh?>"></a>
						<div class="img-label">
							<img src="images/hot.png">
						</div>
					</div>
					<div class="namesp">
						<a href=""><?= $kkk2->Ten?></a>
					</div>
					<div class="pricesp"><?= number_format($kkk2->gia)?> Đ</div>
					<div class="button-hd">
						<a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
						<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		<?php endforeach ?>

	</div>


<?php else: ?>
	<!-- 	<h3>ko có sản phẩm nào phù hợp</h3> -->
<?php endif ?>













<?php if (isset($_GET['idM'])!=null && !isset($_GET['idTH'])): ?>
	
	<?php 
	if ($_GET['idM']==0) {
		$namea='Tất cả';
		$aa1=Product::all();
	}elseif ($_GET['idM']==1) {
		$namea='Sản phẩm mới';
		$aa1=Product::where(['ShowMain',1]);
	}elseif ($_GET['idM']==2) {
		$namea='Sản phẩm mua nhiều';
		$aa1=Product::where(['ShowMain',2]);
	}elseif ($_GET['idM']==3) {
		$namea='sản phẩm bán chạy';
		$aa1=Product::where(['ShowMain',3]);
	}
	elseif ($_GET['idM']==4) {
		$namea='sản phẩm HOT';
		$aa1=Product::where(['ShowMain',4]);
	}
	else{
		echo "loi";
	}

	?>

	<div class="boxmain">
		<br>
		<div class="tit-boxmain">

			<?php if (isset($allCatek)!=null) {
				?>
				<h3><span>ĐIỆN THOẠI <?= $allCatek->Ten ?></span></h3>
				<?php }elseif (isset($namea)!=null) {
					?>
					<h3><span>ĐIỆN THOẠI <?php echo $namea; ?></span></h3>
					<?php }else{ ?>
					<h3><span>TẤT CẢ ĐIỆN THOẠI</span></h3>
					<?php } ?>


				</div>
				<hr>
				<?php foreach ($aa1 as $aaa1 ): ?>

					<div class="col-xs-6 col-sm-4 col-md-3 p5" style="margin-top: 5px;margin-bottom: 5px;">
						<div class="boxsp">
							<div class="imgsp">
								<a href=""><img class="imgproduct" style="width: 160px;height: 180px;" src="public/images/<?= $aaa1->Hinh?>"></a>
								<div class="img-label">
									<img src="images/hot.png">
								</div>
							</div>
							<div class="namesp">
								<a href=""><?= $aaa1->Ten?></a>
							</div>
							<div class="pricesp"><?= number_format($aaa1->gia)?> Đ</div>
							<div class="button-hd">
								<a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
								<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				<?php endforeach ?>

			</div>
		<?php else: ?>
			
		<?php endif ?>


		<?php if (isset($_GET['idM'])!=null && isset($_GET['idTH'])!=null): ?>
			
			<?php 
			$iddd=$_GET['idTH'];
			$idf=$_GET['idM'];
			if ($_GET['idM']==0) {
				$namea='Tất cả';
				$aa1=Product::all();
			}elseif ($_GET['idM']==1) {
				$namea='Sản phẩm mới';
				$aa1=Product::where(['idDanhMuc',"$iddd",'ShowMain',"$idf"]);
			}
			else{
				echo "loi";
			}

			?>
			<div class="boxmain">
				<br>
				<div class="tit-boxmain">

					<?php if (isset($allCatek)!=null) {
						?>
						<h3><span>ĐIỆN THOẠI <?= $allCatek->Ten ?></span></h3>
						<?php }elseif (isset($namea)!=null) {
							?>
							<h3><span>ĐIỆN THOẠI <?php echo $namea; ?></span></h3>
							<?php }else{ ?>
							<h3><span>TẤT CẢ ĐIỆN THOẠI</span></h3>
							<?php } ?>


						</div>
						<hr>
						<?php foreach ($aa1 as $aaa1 ): ?>

							<div class="col-xs-6 col-sm-4 col-md-3 p5" style="margin-top: 5px;margin-bottom: 5px;">
								<div class="boxsp">
									<div class="imgsp">
										<a href=""><img class="imgproduct" style="width: 160px;height: 180px;" src="public/images/<?= $aaa1->Hinh?>"></a>
										<div class="img-label">
											<img src="images/hot.png">
										</div>
									</div>
									<div class="namesp">
										<a href=""><?= $aaa1->Ten?></a>
									</div>
									<div class="pricesp"><?= number_format($aaa1->gia)?> Đ</div>
									<div class="button-hd">
										<a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						<?php endforeach ?>

					</div>


				<?php else: ?>
				<?php endif ?>


				