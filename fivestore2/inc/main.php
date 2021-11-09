<?php
if(@$_GET){
	switch($_GET['p']){
		case "register";
			include "user/register.php";
		break;
		case "profil";
			include "user/profil.php";
		break;
		case "login";
			include "user/login.php";
		break;
		case "logout";
			include "user/logout.php";
		break;
		case "delete";
			include "user/deleteaccount.php";
		break;
		case "sukses";
			include "user/sukses.php";
		break;
		case "single";
			include "page/detail.php";
		break;
		case "brands";
			include "page/brands.php";
		break;
		case "laptop";
			include "page/laptop.php";
		break;
		case "accecories";
			include "page/accecories.php";
		break;
		case "laptop";
			include "page/laptop.php";
		break;
		case "accecories";
			include "page/accecories.php";
		break;
		case "home";
			include "page/home.php";
		break;
		case "productbrand=ACER";
			include "page/productbrandacer.php";
		break;
		case "productbrand=APPLE";
			include "page/productbrandapple.php";
		break;
		case "productbrand=ASUS";
			include "page/productbrandasus.php";
		break;
		case "productbrand=AXIOO";
			include "page/productbrandaxioo.php";
		break;
		case "productbrand=DELL";
			include "page/productbranddell.php";
		break;
		case "productbrand=GENIUS";
			include "page/productbrandgenius.php";
		break;
		case "productbrand=HP";
			include "page/productbrandhp.php";
		break;
		case "productbrand=HUAWEI";
			include "page/productbrandhuawei.php";
		break;
		case "productbrand=LENOVO";
			include "page/productbrandlenovo.php";
		break;
		case "productbrand=LG";
			include "page/productbrandlg.php";
		break;
		case "productbrand=LOGITECH";
			include "page/productbrandlogitech.php";
		break;
		case "productbrand=MICROSOFT";
			include "page/productbrandmicrosoft.php";
		break;
		case "productbrand=PANASONIC";
			include "page/productbrandpanasonic.php";
		break;
		case "productbrand=RAZER";
			include "page/productbrandrazer.php";
		break;
		case "productbrand=ROG";
			include "page/productbrandrog.php";
		break;
		case "productbrand=SAMSUNG";
			include "page/productbrandsamsung.php";
		break;
		case "productbrand=TOSHIBA";
			include "page/productbrandtoshiba.php";
		break;
		case "productbrand=VAIO";
			include "page/productbrandvaio.php";
		break;
		case "productbrand=XIAOMI";
			include "page/productbrandxiaomi.php";
		break;
		case "productbrand=ZYREX";
			include "page/productbrandzyrex.php";
		break;
		case "cart";
			include "page/cart.php";
		break;
		case "checkout";
			include "page/checkout.php";
		break;
		case "order";
			include "page/order_detail.php";
		break;
		
		
		default:
			echo '<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h2 class="text-center text1">Halaman Tidak Ditemukan</h2>
								</div>
							</div>
					</div>';
		break;
	}
}else{
	include "page/home.php";
}
?>