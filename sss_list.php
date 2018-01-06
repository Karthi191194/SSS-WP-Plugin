<?php

function sss_list(){?>
    <div style='text-align:center;'><h2>TAX INVOICE LIST</h2></div>
<?php
    global $wpdb;
    $table_name = $wpdb->prefix . "sss";
    $rows = $wpdb->get_results("SELECT * from $table_name ORDER BY id Desc");

    ?>
<table class='wp-list-table widefat fixed striped posts'>
    <tr>
        <th>Dated</th>
        <th>Invoice No</th>
        <th>Buyer</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach ($rows as $key => $value){?>
    <tr>
        <td><?php echo $value->dated;?></td>
        <td><?php echo $value->invoiceno;?></td>
        <td><?php echo $value->buyer;?></td>
        <td><a href="<?php echo admin_url('admin.php?page=sss_details&id='.$value->id);?>">View Details</a></td>


    </tr>
    <?php }?>
   </table>
<?php }