<?php

// form data

$sender=$_POST['sender'];
$dated=$_POST['dated'];
$invoiceno=$_POST['invoiceno'];
$deliverynote=$_POST['deliverynote'];
$paymentmode=$_POST['paymentmode'];
$supplierref=$_POST['supplierref'];
$otherref=$_POST['otherref'];
$buyer=$_POST['buyer'];
$buyersorder=$_POST['buyersorder'];
$buyersdated=$_POST['buyersdated'];
$despatchno=$_POST['despatchno'];
$deliverydate=$_POST['deliverydate'];
$despatchedthrough=$_POST['despatchedthrough'];
$destination=$_POST['destination'];
$terms=$_POST['terms'];
$total=$_POST['total'];
$taxcgst=$_POST['taxcgst'];
$cgstamount=$_POST['cgstamount'];
$taxsgst=$_POST['taxsgst'];
$sgstamount=$_POST['sgstamount'];
$taxigst=$_POST['taxigst'];
$igstamount=$_POST['igstamount'];
$totaltax=$_POST['totaltax'];
$totalround=$_POST['totalround'];
$amountwords=$_POST['amountwords'];

// dynamic field data
$desc = $_POST['desc'];
$hsn = $_POST['hsn'];
$qty = $_POST['qty'];
$rate = $_POST['rate'];
$amount = $_POST['amount'];

// serialized dynamic field data
$ser_desc = serialize($desc);
$ser_hsn = serialize($hsn);
$ser_qty = serialize($qty);
$ser_rate = serialize($rate);
$ser_amount = serialize($amount);

    if (isset($_POST['submit']))
    {
        global $wpdb;
        $table_name = $wpdb->prefix .'sss';

        $wpdb->insert(
            $table_name, //table
            array('sender' => $sender,'dated' => $dated, 'invoiceno' => $invoiceno, 'deliverynote' => $deliverynote,'paymentmode' => $paymentmode, 'supplierref' => $supplierref, 'otherref' => $otherref,'buyer' => $buyer, 'buyersorder' => $buyersorder, 'buyersdated' => $buyersdated,'despatchno' => $despatchno, 'deliverydate' => $deliverydate, 'despatchedthrough' => $despatchedthrough,'destination' => $destination, 'terms' => $terms, 'description' => $ser_desc,'hsn' => $ser_hsn, 'qty' => $ser_qty, 'rate' => $ser_rate, 'amount' => $ser_amount,'total' => $total, 'taxcgst' => $taxcgst, 'cgstamount' => $cgstamount,'taxsgst' => $taxsgst, 'sgstamount' => $sgstamount, 'taxigst' => $taxigst,'igstamount' => $igstamount, 'totaltax' => $totaltax, 'totalround' => $totalround,'amountwords' => $amountwords ),
            array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%f','%f','%f','%f','%f','%f','%f','%f','%d','%s')
        );

/*$wpdb->show_errors();
$wpdb->print_error();
$wpdb->last_query();*/


        $message="Success";


    }

global $wpdb;
$table_name = $wpdb->prefix .'sss';
$maxinvoice = $wpdb->get_results("SELECT MAX(invoiceno) as maxinvoice FROM $table_name ");
$maxinvoiceValue = $maxinvoice[0]->maxinvoice;
$currentinoiceValue = $maxinvoiceValue + 1;

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>

<body>
<div><h1 style="text-align:center;">TAX INVOICE</h1></div>
<?php if (isset($message)): ?><div class=""><p><?php echo $message; ?></p></div><?php endif; ?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
    <div class="container-fluid">
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="sender">Sender</label>
                        <textarea class="form-control" rows="5" name="sender" id="sender"  readonly>Sri Sai Sakthi Services, &#013;New No 29 Reddy Street, Koratthur, Chennai-600080, TamilNadu. &#013;GSTIN/UIIN:33BKVPS6894L1ZW
						</textarea>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="invoiceno">Invoice No</label>
                        <input type="number" class="form-control" name="invoiceno" id="invoiceno" value="<?php echo $currentinoiceValue;?>" readonly>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="dated">Dated</label>
                        <input type="date" class="form-control" name="dated" required id="dated">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="deliverynote">Delivery Note</label>
                        <input type="text" class="form-control" name="deliverynote" id="deliverynote">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="paymentmode">Mode/Terms of Payment</label>
                        <input type="text" class="form-control" name="paymentmode" id="paymentmode">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="supplierref">Supplier's Ref</label>
                        <input type="text" class="form-control" name="supplierref" id="supplierref">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="otherref">Other Reference(s)</label>
                        <input type="text" class="form-control" name="otherref" id="otherref">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="buyer">Buyer</label>
                        <textarea class="form-control" rows="5" name="buyer" required id="buyer"></textarea>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="buyersorder">Buyer's Order No</label>
                        <input type="text" class="form-control" name="buyersorder" id="buyersorder">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="buyersdated">Dated</label>
                        <input type="date" class="form-control" name="buyersdated" id="buyersdated">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="despatchno">Despatch Document No</label>
                        <input type="text" class="form-control" name="despatchno" id="despatchno">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="deliverydate">Delivery Note Date</label>
                        <input type="date" class="form-control" name="deliverydate" id="deliverydate">
                    </div>
                </div>
				                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="despatchedthrough">Despatched through</label>
                        <input type="text" class="form-control" name="despatchedthrough" id="despatchedthrough">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" class="form-control" name="destination" id="destination">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="terms">Terms of delivery</label>
                        <textarea class="form-control" rows="3" name="terms" id="terms"></textarea>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
						  <div id="dym_fields">
          
        </div>
              <div class="col-sm-1">
                  <!--    <div class="form-group">

                        <input type="text" class="form-control" id="slno" value="1" name="slno[]" placeholder="Sl No" readonly>
                    </div>-->
                </div>
                <div class="col-sm-5">
                    <div class="form-group">

                        <input type="text" class="form-control" id="desc"  name="desc[]" placeholder="Description of Goods">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">

                        <input type="text" class="form-control" id="hsn" name="hsn[]" placeholder="HSN/SAC">
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">

                        <input type="number" class="form-control" id="qty" name="qty[]" placeholder="Quantity">
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">

                        <input type="number" class="form-control" id="rate" name="rate[]" placeholder="Rate">
                    </div>
                </div>
                <div class="col-sm-2 ">
                    <div class="form-group">
                        <div class="input-group">

                            <input type="text" class="form-control" id="amount" name="amount[]" readonly placeholder="Amount">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="dynamic_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                            </div>
                        </div>
                    </div>
                </div>
				

            </div>
			<div class="row">
			<div class="col-sm-10"></div>
			                <div class="col-sm-2">
							
                    <div class="form-group ">
<label for="total">Total (Rs)</label>
                        <input type="text" class="form-control" id="total" name="total" readonly placeholder="Total">
                    </div>
                </div>
                </div>
				<div class="row">
				<div class="col-sm-8"></div>
				      <div class="col-sm-2">
                    <div class="form-group">
<label for="taxcgst">CGST(%)</label>
<div class="input-group">
                        <input type="number" class="form-control" id="taxcgst" required name="taxcgst" value="9" placeholder="CGST">
						<span class="input-group-addon"><strong>%</strong></span>
                    </div>
                    </div>
                </div>
				                <div class="col-sm-2">
                    <div class="form-group">
<label for="cgstamount">CGST(Rs)</label>
                        <input type="text" class="form-control" id="cgstamount" name="cgstamount" placeholder="Tax" readonly>
                    </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-8"></div>
				      <div class="col-sm-2">
                    <div class="form-group">
<label for="taxsgst">SGST(%)</label>
<div class="input-group">
                        <input type="number" class="form-control" id="taxsgst" required name="taxsgst" value="9" placeholder="SGST">
						<span class="input-group-addon"><strong>%</strong></span>
                    </div>
                    </div>
                </div>
				                <div class="col-sm-2">
                    <div class="form-group">
<label for="sgstamount">CGST(Rs)</label>
                        <input type="text" class="form-control" id="sgstamount" name="sgstamount" placeholder="Tax" readonly>
                    </div>
                </div>
			</div>
			<div class="row">
				<div class="col-sm-8"></div>
				      <div class="col-sm-2">
                    <div class="form-group">
<label for="taxigst">IGST(%)</label>
<div class="input-group">
                        <input type="number" class="form-control" id="taxigst" required name="taxigst" value="0" placeholder="IGST">
						<span class="input-group-addon"><strong>%</strong></span>
                    </div>
                    </div>
                </div>
				                <div class="col-sm-2">
                    <div class="form-group">
<label for="igstamount">IGST(Rs)</label>
                        <input type="text" class="form-control" id="igstamount" name="igstamount"  placeholder="Tax" readonly>
                    </div>
                </div>
			</div>
							<div class="row">
							<div class="col-sm-10"></div>
				                <div class="col-sm-2">
                    <div class="form-group">
<label for="totaltax">Amount (Rs)</label>
                        <input type="text" class="form-control" id="totaltax" name="totaltax" placeholder="Total + Tax" readonly>
                    </div>
                </div>
			</div>
			<div class="row">
							<div class="col-sm-10"></div>
				                <div class="col-sm-2">
                    <div class="form-group">
<label for="totalround">Round Off (Rs) </label>
                        <input type="text" class="form-control" id="totalround" name="totalround" placeholder="Total" readonly>
                    </div>
                </div>
			</div>
			            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
					    <label for="amountwords">Amount Chargrable (in words)</label>
                        <textarea class="form-control" rows="2" name="amountwords" id="amountwords" placeholder="Amount Chargrable (in words)"></textarea>
                    </div>
                </div>
            </div>
			 <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-lg" name="submit" value="Print">
						
                    </div>
                </div>
            </div>
        </form>
    </div>
</form>

<div><a href="<?php echo admin_url('admin.php?page=sss_list');?>">Click here for Tax Invoce List</a></div>
</body>
<script>
var room = 1;
function dynamic_fields(){
room++;
var objTo = document.getElementById('dym_fields')
var divadd = document.createElement("div");
divadd.setAttribute("class","form-group removeclass"+room);
divadd.innerHTML = '<div class="col-sm-1"></div><div class="col-sm-5"><div class="form-group"><input type="text" class="form-control" id="desc"  name="desc[]" placeholder="Description of Goods"></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="hsn" name="hsn[]" placeholder="HSN/SAC"> </div></div><div class="col-sm-1"><div class="form-group"><input type="number" class="form-control" id="qty" name="qty[]" placeholder="Quantity"></div></div><div class="col-sm-1"><div class="form-group"><input type="number" class="form-control" id="rate" name="rate[]" placeholder="Rate"></div></div><div class="col-sm-2 "><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="amount" name="amount[]" readonly placeholder="Amount"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_dynamic_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div>';
objTo.appendChild(divadd)
}
function remove_dynamic_fields(rid){
$('.removeclass'+rid).remove();}

</script>
<script>
$(document).on('keyup', "input[name^='qty'],input[name^='rate'],input[name^='amount'],#total,#taxcgst,#taxsgst,#taxigst,#amountwords,#totalround", function(e){
      var uv = $("input[name^='qty']").length;
	  var qty = $("input[name^='qty']");
	  var rate = $("input[name^='rate']");
	  var amount = $("input[name^='amount']");

	  var total = 0;
	   for(i=0;i < uv;i++) {
			qty_values = qty.eq(i).val();
			rate_values = rate.eq(i).val();
			var amounts= qty_values * rate_values;
			amount.eq(i).val(amounts);

			 total+= parseFloat(amount.eq(i).val());
			 $('#total').val(total);

    }

	var d = parseFloat($('#total').val());
	var e = parseFloat($('#taxcgst').val());
	var g = parseFloat($('#taxsgst').val());
	var h = parseFloat($('#taxigst').val());
	var f = (e/100) * d;
	$('#cgstamount').val(f);
	var i = (g/100) * d;
	$('#sgstamount').val(i);
	var j = (h/100) * d;
	$('#igstamount').val(j);
	var c = d + f + i + j;
	$('#totaltax').val(c);
	var k = c.toFixed();
	$('#totalround').val(k);
	
	var total = $("#totalround").val();
    var total_words = convertNumberToWords(total);
	$("#amountwords").val(total_words);
	
	function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return words_string+"rupees only";
}
	
});

</script>

</html>
