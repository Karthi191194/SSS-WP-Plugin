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

    }

    if($_POST['delete']){?>

        <div><p>Deleted !</p></div>
        <a href="<?php echo admin_url('admin.php?page=sss_list')?>">Back to Tax Invoice List</a>
  <?php  }else{

    foreach ($rows as $key => $value) {
        ?>
        <div style='text-align:center;'><h2>INVOICE NO:<?php echo $value->invoiceno; ?> </h2></div>
        <table>
            <tr>
                <td><STRONG>Sender</STRONG></td>
                <td><?php echo $value->sender; ?></td>
            </tr>
            <tr>
                <td><STRONG>Invoice No</STRONG></td>
                <td><?php echo $value->invoiceno; ?></td>
            </tr>
            <tr>
                <td><STRONG>Dated</STRONG></td>
                <td><?php echo $value->dated; ?></td>
            </tr>
            <tr>
                <td><STRONG>Delivery Note</STRONG></td>
                <td><?php echo $value->deliverynote; ?></td>
            </tr>
            <tr>
                <td><STRONG>Mode/Terms of Payment</STRONG></td>
                <td><?php echo $value->paymentmode; ?></td>
            </tr>
            <tr>
                <td><STRONG>Supplier's Ref </STRONG></td>
                <td><?php echo $value->supplierref; ?></td>
            </tr>
            <tr>
                <td><STRONG>Other Reference(s)</STRONG></td>
                <td><?php echo $value->otherref; ?></td>
            </tr>
            <tr>
                <td><STRONG>Buyer</STRONG></td>
                <td><?php echo $value->buyer; ?></td>
            </tr>
            <tr>
                <td><STRONG>Buyer's Order No</STRONG></td>
                <td><?php echo $value->buyersorder; ?></td>
            </tr>
            <tr>
                <td><STRONG>Dated</STRONG></td>
                <td><?php echo $value->buyersdated; ?></td>
            </tr>
            <tr>
                <td><STRONG>Despatch Document No</STRONG></td>
                <td><?php echo $value->despatchno; ?></td>
            </tr>
            <tr>
                <td><STRONG>Delivery Note Date</STRONG></td>
                <td><?php echo $value->deliverydate; ?></td>
            </tr>
            <tr>
                <td><STRONG>Despatched through</STRONG></td>
                <td><?php echo $value->despatchedthrough; ?></td>
            </tr>
            <tr>
                <td><STRONG>Destination</STRONG></td>
                <td><?php echo $value->destination; ?></td>
            </tr>
            <tr>
                <td><STRONG>Terms of delivery</STRONG></td>
                <td><?php echo $value->terms; ?></td>
            </tr>
            <?php if ($value->id == $max) { ?>
                <td>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                        <input type="submit" name="delete" value="Delete"
                               onclick="return confirm('Are you sure you want to delete?')">
                    </form>
                </td>
            <?php } ?>
        </table>
        <?php
        /*echo "<pre>";
        print_r($value);*/
    }

    }
}