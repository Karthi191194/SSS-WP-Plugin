<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
    $id = $_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . "sss";
    $rows = $wpdb->get_results("SELECT * from $table_name WHERE id=$id");
	echo "<pre>"; print_r($rows);
	foreach ($rows as $value){
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
<th class='width-5'>Sl No</th>
<th class='width-45'>Description of Goods</th>
<th class='width-10'>HSN/SAC</th>
<th class='width-10'>Quantity</th>
<th class='width-10'>Rate</th>
<th class='width-20'>Amount(Rs)</th>
</tr>
<tr class='pdf-price-details'>
<td >1</td>
<td class='text-left'>Welding machine</td>
<td >123</td>
<td >1</td>
<td >42,000.00</td>
<td >42,000.00</td>
</tr>
<tr class='pdf-price-last'>
<td ></td>
<td ><strong>Total</strong></td>
<td ><strong></strong></td>
<td ><strong>1</strong></td>
<td ><strong></strong></td>
<td ><strong>Rs.42,000.00</strong></td>
</tr>
<tr>
<td colspan='6' class='text-left'>
Amount Chargeable(in words)
<br>	
<strong>INR Forty Nine Thousand Five Hundred Sixty Only</strong>
</td>
</tr>
</table>
<table class=' pdf-price pdf-tax'>
<tr>
<th class='width-25' rowspan='2'>HSN/SAC</th>
<th class='width-25' rowspan='2'>Taxable Value</th>
<th class='width-25' colspan='2'>Central Tax</th>
<th  class='width-25' colspan='2'>Store Tax</th>
</tr>
<tr>
<th >Rate</th>
<th >Amount</th>
<th >Rate</th>
<th >Amount</th>
</tr>
<tr>
<td class='text-left'>123</td>
<td>42,000.00</td>
<td>9%</td>
<td>3,780.00</td>
<td>9%</td>
<td>3,780.00</td>
</tr>
<tr>
<td ><strong>Total</strong></td>
<td><strong>42,000.00</strong></td>
<td><strong></strong></td>
<td><strong>3,780.00</strong></td>
<td><strong></strong></td>
<td><strong>Rs.3,780.00</strong></td>
</tr>
<tr>
<td colspan='6' class='text-left'>
Tax Amount(in words)
<br>	
<strong>INR Seven Thousand Five Hundred Sixty Only</strong>
</td>
</tr>
</table>
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

 
