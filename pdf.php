<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
    $id = $_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . "sss";
    $rows = $wpdb->get_results("SELECT * from $table_name WHERE id=$id");
	//echo "<pre>"; print_r($rows);
	foreach ($rows as $value){
$unser_desc = unserialize($value->description);
$unser_hsn = unserialize($value->hsn);
$unser_qty = unserialize($value->qty);
$unser_rate = unserialize($value->rate);
$unser_amount = unserialize($value->amount);
$count = count($unser_desc);		
$content = "<html>
<head>
<title>Sri SaiSakthi Services</title>
<style>
@page{
	margin:0px;
} 
 
body{
background-color:#e9f3f8;
}
.pdf{
margin:0px 25px;
}
.pdf h2{
text-align:center;
color:#82a9ba;
}
.detail{
width:100%;
border-collapse: collapse;
}
.detail td{
border: 1px solid black; 
padding: 2px 10px;
line-height: 25px;
}
.detail .width-50{
width:50%;
}
.detail .width-25{
width:25%;}
.pdf-price{
width:100%;
border-collapse: collapse;}
.pdf-price .width-5{
width:5%;}
.pdf-price .width-10{
width:10%;}
.pdf-price .width-20{
width:20%;}
.pdf-price .width-25{
width:25%;}
.pdf-price .width-45{
width:45%;}
.pdf-price th{
background-color:#82a9ba;}
.pdf-price tr:nth-child(1){
height: 35px;}
.pdf-price th{
border: 1px solid black;
border-top: none;
} 
.pdf-price .pdf-price-details td{
border: 1px solid black; 
border-top: none;
border-bottom: none;
padding: 2px 10px;
text-align: right;
}
.pdf-price td{
border: 1px solid black; 
padding: 2px 10px;
text-align: right;
line-height: 25px;
}
.pdf-price .pdf-price-last{
height: 35px;}
.pdf-price .pdf-price-last td{
border: 1px solid black; 
padding: 2px 10px;
text-align: right;
}
.pdf-price .pdf-price-details .text-left{
text-align:left;}
.pdf-price .text-left{
text-align:left;}
.pdf-tax{
	width:99.1%;
}
.width-20{
	width:20%;
}
.text-right{
float:right;}
.text-center{
text-align:center;}
</style>
</head>
<body>
<div class='pdf'>
<h2>TAX INVOICE</h2>
<table class='detail'>
<tr>
<td rowspan='3' class='width-50' >
<strong>$value->sender
</strong>
</td>
<td class='width-25'>
Invoice No<br><strong>$value->invoiceno</strong>
</td>
<td class='width-25'>
Dated<br><strong>$value->dated</strong>
</td>
</tr>
<tr>
<td class='width-25'>
Delivery Note<br><strong>$value->deliverynote</strong>
</td>
<td class='width-25'>
Mode/Terms of Payment<br><strong>$value->paymentmode</strong>
</td>
</tr>
<tr>
<td class='width-25'>
Supplier's Ref<br><strong>$value->supplierref</strong>
</td>
<td class='width-25'>
Other Reference(s)<br><strong>$value->otherref</strong>
</td>
</tr>
<tr>
<td rowspan='4' class='width-50'>
<strong>
Buyer:
</strong>
<br>
$value->buyer
</td>
<td class='width-25'>
Buyer's Order No<br><strong>$value->buyersorder</strong>
</td>
<td class='width-25'>
Dated<br><strong>$value->buyersdated</strong>
</td>
</tr>
<tr>
<td class='width-25'>
Despatch Document No<br><strong>$value->despatchno</strong>
</td>
<td class='width-25'>
Delivery Note Date<br><strong>$value->deliverydate</strong>
</td>
</tr>
<tr>
<td class='width-25'>
Despatched through<br><strong>$value->despatchedthrough</strong>
</td>
<td class='width-25'>
Destination<br><strong>$value->destination</strong>
</td>
</tr>
<tr>
<td colspan='2' style='height:50px;'>
Terms of Delivery<br>
<strong>
$value->terms
</strong>
</td>
</tr>
</table>
<table  class='pdf-price'>
<tr>
<th class='width-5' class='text-center'>Sl No</th>
<th class='width-45' class='text-center'>Description of Goods</th>
<th class='width-10' class='text-center'>HSN/SAC</th>
<th class='width-10' class='text-center'>Quantity</th>
<th class='width-10' class='text-center'>Rate<br><small style='font-size:12px;'>(per Nos)</small></th>
<th class='width-20' class='text-center'>Amount(Rs)</th>
</tr>";
for ($x=0;$x <$count; $x++){ 
if(empty($unser_desc[$x] ) && empty($unser_hsn[$x] ) && empty($unser_qty[$x] )&& empty($unser_rate[$x] )) continue;
$content.="<tr class='pdf-price-details' >
<td >";
$content.=$x+1;
$content.="</td>
<td class='text-left'><strong>$unser_desc[$x]</strong></td>
<td >$unser_hsn[$x]</td>
<td >$unser_qty[$x]</td>
<td >$unser_rate[$x]</td>
<td >$unser_amount[$x]<br><strong></td>
</tr>";
}
$content.="<tr class='pdf-price-details'><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ></tr>
<tr class='pdf-price-details'><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ></tr>
<tr class='pdf-price-details'><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ></tr>
<tr class='pdf-price-details'><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ><td ></td ></tr>
<tr class='pdf-price-details'><td></td><td>CGST $value->taxcgst%</td><td></td><td></td><td></td><td>$value->cgstamount</td></tr>
<tr class='pdf-price-details' style='border-top:none;'><td></td><td>SGST $value->taxsgst%</td><td></td><td></td><td></td><td>$value->sgstamount</td></tr>
<tr class='pdf-price-details' style='border-top:none;'><td></td><td>IGST $value->taxigst%</td><td></td><td></td><td></td><td>$value->igstamount</td></tr>
<tr class='pdf-price-details'><td></td><td>Round off</td><td></td><td></td><td></td><td>";
$content.=$value->total - $value->totalround;
$content.="</td></tr><tr class='pdf-price-last'>
<td ></td>
<td ><strong>Total</strong></td>
<td ><strong></strong></td>
<td ><strong></strong></td>
<td ><strong></strong></td>
<td ><strong>Rs.$value->totalround</strong></td>
</tr>
<tr>
<td colspan='6' class='text-left'>
Amount Chargeable(in words)
<br>	
<strong>INR $value->amountwords</strong>
</td>
</tr>
</table>";
$content.="
<div style='float:left;margin-top:20px;'>
<strong>
Declaration<br>
We declare that the invoice shows the actual price of the<br>
goods described and that all particulars are true and correct.
</strong>
</div>
<div style='float:right;margin-top:55px;'>
<strong>Sri SaiSakthi Services</strong>
</div>
</div>
</body>
</html>";						  
	}

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
ob_end_clean();
$dompdf->stream("SSS_TAX_INVOICE_".date("Ymd"), array("Attachment" => 0));
exit();

echo $content;
 
