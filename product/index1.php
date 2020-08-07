<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if($_SESSION["login"]===false){
	header("Location: ../From/SignIn.php");
}
$server="localhost";
$username="root";
$pass="root";
$dbname="demo";

$conn=mysqli_connect($server,$username,$pass,$dbname);

$sql="CREATE TABLE IF NOT EXISTS demo.tblproduct (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL


	)";
	mysqli_query($conn,$sql);
$sql="ALTER TABLE tblproduct
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `product_code` (`code`)";
mysqli_query($conn,$sql);

$sql="ALTER TABLE `tblproduct`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT";
mysqli_query($conn,$sql);
$sql="INSERT INTO tblproduct (id, name, code, image, price) VALUES
(1, 'Quran Pak', 'q001', 'product-images/q1.jpg', 5.00),
(2, 'Quran Pak', 'q002', 'product-images/quran.jpg', 5.00),
(3, 'Quran Pak', 'q003', 'product-images/q3.jpg', 7.00),
(4, 'Prayer Mat Blue', 'p001', 'product-images/n1.jpg', 25.00),
(5, 'Prayer Mat Green', 'p002', 'product-images/n2.jpg', 20.00),
(6, 'Prayer Mat Red', 'p003', 'product-images/n3.jpg', 20.00),
(7, 'Prayer Mat Red', 'p004', 'product-images/n4.jpg', 15.00),
(8, 'Black Cap', 'c001', 'product-images/c1.jpg', 10.00),
(9, 'Simple White Cap', 'c002', 'product-images/c2.jpg', 5.00),
(10, 'Simple Black Cap', 'c003', 'product-images/c3.jpg', 7.00),
(11, 'White Cap', 'c004', 'product-images/c4.jpg', 7.00),
(12, 'J dot Cap', 'c005','product-images/c5.jpg', 10.00),
(13, 'Miswak-1', 'm001', 'product-images/m1.jpg', 5.00),
(14, 'Miswak-2', 'm002', 'product-images/m2.jpg', 6.00),
(15, 'Miswak-3', 'm003', 'product-images/m3.jpg', 9.00),
(16, 'Miswak-4', 'm004', 'product-images/m4.jpg', 10.00),
(17, 'Miswak-5', 'm005', 'product-images/m5.jpg', 7.00),
(18, 'Couter Brown', 'counter001', 'product-images/counter1.jpg', 20.00),
(19, 'Couter Blue', 'counter002', 'product-images/counter2.jpg', 10.00),
(20, 'Couter Red', 'counter003', 'product-images/countr3.jpg', 10.00),
(21, 'Etar-1', 'pr001', 'product-images/p1.jpg', 20.00),
(22, 'Etar-2', 'pr002', 'product-images/p2.jpg', 22.00),
(23, 'Etar-3', 'pr003', 'product-images/p3.jpg', 25.00),
(24, 'Etar-4', 'pr004', 'product-images/p4.jpg', 25.00),
(25, 'Etar-5', 'pr005', 'product-images/p5.jpg', 30.00),
(26, 'Tasbeeh-1', 't001', 'product-images/1.jpg', 7.00),
(27, 'Tasbeeh-2', 't002', 'product-images/2.jpg', 9.00),
(28, 'Tasbeeh-3', 't003', 'product-images/3.jpg', 10.00),
(29, 'Tasbeeh-4', 't004', 'product-images/4.jpg', 8.00),
(30, 'Tasbeeh-5', 't005', 'product-images/5.jpg', 15.00)
";
mysqli_query($conn,$sql);




if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
}
}
?>
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="./style1.css" type="text/css" rel="stylesheet" />
<link href="./style.css" type="text/css" rel="stylesheet" />
<style media="screen">
BODY{
	background: lavender;

}
.button9248 {
	position: absolute;
	top:0;
	left:0;
	display: inline-block;
	border-radius: 2px;
	background-color: #167AC6;
	border: none;
	color: #FFFFFF;
	text-align: center;
	font-size: 16px;
	padding: 10px 20px;
	transition: all 0.5s;
	cursor: pointer;
	margin: 5px;
}
.pls{
	text-shadow: 0px 0px 2px dodgerblue;
 }
.button9248 .pls {
	cursor: pointer;
	display: inline-block;
	position: relative;
	transition: 0.5s;
}

.button9248 .pls:after {
	content: '\00AB';
	position: absolute;
	opacity: 0;
	top: 0;
	left: -20px;
	transition: 0.5s;
}

.button9248:hover .pls {
	padding-left: 25px;
}

.button9248:hover .pls:after {
	opacity: 1;
	left: 0;
}
/* width */
::-webkit-scrollbar {
	width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
	background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
	background: #167AC6;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
	background: #024EAF;
}
.raju{
	font-size:2.5rem;
	font-weight:bold;
	color: White;
	text-shadow: 0px 0px 5px black;
	text-align: center;
	margin: 10px;
	/* text-decoration:underline; */
}
</style>
</HEAD>
<BODY>

<h3 class="raju">Hidayah Shopping Center </h3>

<form action="../index.php">
    <button class="button9248" style="vertical-align:middle"><span class="pls">back to home </span></button>
</form>

<div id="shopping-cart">
<div class="txt-heading"><h3>Shopping Cart<h3></div>

<a id="btnEmpty" href="index1.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>
<?php
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?> "  class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index1.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
<tr>
	<td colspan="6" align="right"><button><a href="payment.html">Pay Amount</a></button></td>
</tr>
</tbody>
</table>
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php
}
?>
</div>

<div class="container">



	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
    ?>
<div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid6">
                <form method="post" action="index1.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                    <div class="product-image6">
                        <a href="#">
                        <img src="<?php echo $product_array[$key]["image"]; ?>">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?php echo $product_array[$key]["name"]; ?></a></h3>
                        <div class="price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                    </div>
                    <ul class="social">
                    <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                    </ul>
                    </form>
            </div>
        </div>

      </
	<?php
		}
	}
	?>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</BODY>
</HTML>
