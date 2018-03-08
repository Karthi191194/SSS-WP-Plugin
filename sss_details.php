<?php

function sss_details()
{
    $id = $_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . "sss";
    $rows = $wpdb->get_results("SELECT * from $table_name WHERE id=$id");

    $max_id = $wpdb->get_results("SELECT MAX(id) AS maxid FROM $table_name");

    $max = $max_id[0]->maxid;

    if(isset($_POST['delete'])){
        $wpdb->delete( $table_name, array( 'id' => $id ) );

    /*}

    if($_POST['delete']){*/?>

        <div><p>Deleted !</p></div>
        <a href="<?php echo admin_url('admin.php?page=sss_list')?>">Back to Tax Invoice List</a>
  <?php  }else{

    foreach ($rows as $key => $value) { 
	//echo "<pre>";print_r($value);
	$unser_desc = unserialize($value->description);
$unser_hsn = unserialize($value->hsn);
$unser_qty = unserialize($value->qty);
$unser_rate = unserialize($value->rate);
//echo "<pre>";print_r($unser_desc);echo "<br>";print_r($unser_hsn);echo "<br>";print_r($unser_qty);echo "<br>";print_r($unser_rate);
        ?>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <div style='text-align:center;'><h2>INVOICE NO:<?php echo $value->invoiceno; ?> </h2></div>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="container-fluid">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sender">Sender</label>
                        <textarea class="form-control" rows="5" name="sender" id="sender"  readonly>Sri Sai Sakthi Services&#013;New No 29, Reddy Street,Koratthur, Chennai-600080,TamilNadu.&#013;GSTIN/UIIN:33BKVPS6894L1ZW
						</textarea>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="invoiceno">Invoice No</label>
                                <input type="number" class="form-control" name="invoiceno" id="invoiceno" value="<?php echo $value->invoiceno;?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="dated">Dated</label>
                                <input type="date" class="form-control" name="dated" id="dated" value="<?php echo $value->dated;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="deliverynote">Delivery Note</label>
                                <input type="text" class="form-control" name="deliverynote" id="deliverynote" value="<?php echo $value->deliverynote;?>">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="paymentmode">Mode/Terms of Payment</label>
                                <input type="text" class="form-control" name="paymentmode" id="paymentmode" value="<?php echo $value->paymentmode;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="supplierref">Supplier's Ref</label>
                                <input type="text" class="form-control" name="supplierref" id="supplierref" value="<?php echo $value->supplierref;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="otherref">Other Reference(s)</label>
                                <input type="text" class="form-control" name="otherref" id="otherref" value="<?php echo $value->otherref;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="buyer">Buyer</label>
                                <textarea class="form-control" rows="5" name="buyer" id="buyer" value="<?php echo $value->buyer;?>"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="buyersorder">Buyer's Order No</label>
                                <input type="text" class="form-control" name="buyersorder" id="buyersorder" value="<?php echo $value->buyersorder;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="buyersdated">Dated</label>
                                <input type="date" class="form-control" name="buyersdated" id="buyersdated" value="<?php echo $value->buyersdated;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="despatchno">Despatch Document No</label>
                                <input type="text" class="form-control" name="despatchno" id="despatchno" value="<?php echo $value->despatchno;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="deliverydate">Delivery Note Date</label>
                                <input type="date" class="form-control" name="deliverydate" id="deliverydate" value="<?php echo $value->deliverydate;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="despatchedthrough">Despatched through</label>
                                <input type="text" class="form-control" name="despatchedthrough" id="despatchedthrough" value="<?php echo $value->despatchedthrough;?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="destination">Destination</label>
                                <input type="text" class="form-control" name="destination" id="destination" value="<?php echo $value->destination;?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="terms">Terms of delivery</label>
                                <textarea class="form-control" rows="3" name="terms" id="terms" value="<?php echo $value->terms;?>"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                    $count = count($unser_desc);
                    for ($x=0;$x <$count; $x++){
                    ?>
                    <div class="row removedy-<?php echo $x;?>">
                       <!-- <div class="col-sm-1">
                            <div class="form-group">

                                <input type="text" class="form-control" id="slno" value="1" name="slno[]" placeholder="Sl No" readonly>
                            </div>
                        </div> -->
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                            <div class="form-group">

                                <input type="text" class="form-control" id="desc"  name="desc[]"  value="<?php echo $unser_desc[$x];?>" placeholder="Description of Goods">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">

                                <input type="text" class="form-control" id="hsn" name="hsn[]" value="<?php echo $unser_hsn[$x];?>" placeholder="HSN/SAC">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">

                                <input type="text" class="form-control" id="qty" name="qty[]" value="<?php echo $unser_qty[$x];?>" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">

                                <input type="text" class="form-control" id="rate" name="rate[]" value="<?php echo $unser_rate[$x];?>" placeholder="Rate">
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="form-group">
                                <div class="input-group">

                                    <input type="text" class="form-control" id="amount" name="amount[]" placeholder="Amount">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" onclick="remove_dynamic_fields_old(<?php echo $x; ?>);"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-sm-1">
                            <!--   <div class="form-group">

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

                                <input type="text" class="form-control" id="qty" name="qty[]" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">

                                <input type="text" class="form-control" id="rate" name="rate[]" placeholder="Rate">
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="form-group">
                                <div class="input-group">

                                    <input type="text" class="form-control" id="amount" name="amount[]" placeholder="Amount">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="button" onclick="dynamic_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="dym_fields">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">

                            <div class="form-group ">
                                <label for="total">Total (Rs)</label>
                                <input type="text" class="form-control" id="total" name="total" value="<?php echo $value->total;?>"placeholder="Total">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="taxcgst">CGST(%)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="taxcgst" name="taxcgst" value="<?php echo $value->taxcgst;?>" placeholder="CGST">
                                    <span class="input-group-addon"><strong>%</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="cgstamount">CGST(Rs)</label>
                                <input type="text" class="form-control" id="cgstamount" name="cgstamount"  value="<?php echo $value->cgstamount;?>" placeholder="Tax" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="taxsgst">SGST(%)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="taxsgst" name="taxsgst" value="<?php echo $value->taxsgst;?>" placeholder="SGST">
                                    <span class="input-group-addon"><strong>%</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="sgstamount">CGST(Rs)</label>
                                <input type="text" class="form-control" id="sgstamount" name="sgstamount" value="<?php echo $value->sgstamount;?>" placeholder="Tax" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="taxigst">IGST(%)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="taxigst" name="taxigst" value="<?php echo $value->taxigst;?>" placeholder="IGST">
                                    <span class="input-group-addon"><strong>%</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="igstamount">IGST(Rs)</label>
                                <input type="text" class="form-control" id="igstamount" name="igstamount"  value="<?php echo $value->igstamount;?>" placeholder="Tax" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="totaltax">Amount (Rs)</label>
                                <input type="text" class="form-control" id="totaltax" name="totaltax" value="<?php echo $value->totaltax;?>"  placeholder="Total + Tax" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="totalround">Round Off (Rs) </label>
                                <input type="text" class="form-control" id="totalround" name="totalround" value="<?php echo $value->totalround;?>" placeholder="Total" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="amountwords">Amount Chargrable (in words)</label>
                                <textarea class="form-control" rows="2" name="amountwords" id="amountwords" value="<?php echo $value->amountwords;?>" placeholder="Amount Chargrable (in words)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-lg" name="submit" value="Update">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </form>
            <?php if ($value->id == $max) { ?>
             <table>  <tr> <td>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                        <input type="submit" name="delete" value="Delete"
                               onclick="return confirm('Are you sure you want to delete?')">
                    </form>
                </td></tr>
            <?php } ?>
        </table>
        <?php
        /*echo "<pre>";
        print_r($value);*/
    }?>
<script>
var room = 1;
function dynamic_fields(){
room++;
var objTo = document.getElementById('dym_fields')
var divadd = document.createElement("div");
divadd.setAttribute("class","form-group removeclass"+room);
divadd.innerHTML = '<div class="col-sm-1"></div><div class="col-sm-5"><div class="form-group"><input type="text" class="form-control" id="desc"  name="desc[]" placeholder="Description of Goods"></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="hsn" name="hsn[]" placeholder="HSN/SAC"> </div></div><div class="col-sm-1"><div class="form-group"><input type="text" class="form-control" id="qty" name="qty[]" placeholder="Qty"></div></div><div class="col-sm-1"><div class="form-group"><input type="text" class="form-control" id="rate" name="rate[]" placeholder="Rate"></div></div><div class="col-sm-2 "><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="amount" name="amount[]" placeholder="Amount"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_dynamic_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div>';
objTo.appendChild(divadd)
}
function remove_dynamic_fields(rid){
$('.removeclass'+rid).remove();}
function remove_dynamic_fields_old(rid){
    $('.removedy-'+rid).remove();}

</script>
<script>

$("#total,#taxcgst,#taxsgst,#taxigst").keyup(function(){
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
});

</script>
   <?php }
}