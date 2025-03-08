<script language='JavaScript'>
    checked = false;
    function checkedAll () {
      if (checked == false){checked = true}else{checked = false}
      for (var i = 0; i < document.getElementById('frmList').elements.length; i++) {
        document.getElementById('frmList').elements[i].checked = checked;
      }
    }

</script>

<link rel="stylesheet" href="<?php echo plugins_url( 'css/table.css' , __FILE__ ) ?>"  type="text/css" media="all" />

<?php

    global $wpdb;

    $pageNo=isset($_GET['paged'])?$_GET['paged']:1;

    $max=1000;
    $start=($max*($pageNo-1));
    $totSql="SELECT Count(*) FROM ".staff_grievance_details;
    $totalRec = $wpdb->get_row($totSql,ARRAY_N);

    $recCount=$totalRec[0];

	$querystr="SELECT * FROM ".staff_grievance_details." ORDER BY ".staff_grievance_details.".created_datetime DESC LIMIT $start,$max";

    $customPages = $wpdb->get_results($querystr);

    $totalPages=ceil($recCount/$max);
    if ( !defined('ABSPATH') )
    die('-1');	

?>

<div class="wrap">
    <div id="icon-edit-pages" class="icon32 icon32-posts-page"><br></div>
    <h2>
        <?php echo "Staff Form List"; ?> &nbsp;<input type="button" id="btnExport" value="Export in Excel" />
    </h2>
     <?php if(isset($msg)) : ?>
        <div id="message" class="updated fade"><p><?php echo $msg; ?></p></div>
    <?php endif; ?>
    <?php if(count($customPages)>0){?>
    <form id="frmList" action="" method="post" onsubmit="javascript:return confirm('Do you really want to proceed?')">
        <br class="clear" />
        <div class="tablenav">
            <?php
                $page_links = paginate_links( array(
                    'base' => add_query_arg( 'paged', '%#%' ),
                    'format' => '',
                    'prev_text' => __('&laquo;'),
                    'next_text' => __('&raquo;'),
                    'total' => $totalPages,
                    'current' => $_GET['paged']
                ));
            ?>

            <?php if ( $page_links ) { ?>
                <div class="tablenav-pages">
                    <?php 

                        $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s' ) . '</span>%s',
                            number_format_i18n( $start+1),
                            number_format_i18n( min( $pageNo * $max,$recCount ) ),
                            number_format_i18n( $recCount),
                            $page_links
                        ); echo $page_links_text; 
                    ?>
                </div>
            <?php } ?>
            <br class="clear" />
        </div>

       <table id="tblCustomers" class="widefat post fixed j_table" cellspacing="0" width="100%">
            <tbody>
                <tr>
				   <th width="4%"><strong>Sr. No.</strong></th>
                    <th width="10%"><strong>Student's Name</strong></th>
                    <th width="10%"><strong>Mobile No.</strong></th>
					<th width="10%"><strong>Email Id.</strong></th>
					<th width="10%"><strong>Grievance Details</strong></th>
					<th width="8%"><strong>Submission Date</strong></th>
                </tr>

                <?php $i=0; foreach($customPages as $cpage){ $i++; ?>
                    <tr id="custompage-<?php echo $cpage->id; ?>" class="alternate iedit">
					    <td><?php echo $i; ?></td>
                        <td><?php echo ucfirst($cpage->staff_name); ?></td>
						<td><?php echo $cpage->mobile_no; ?></td>
						<td><?php echo $cpage->email_id; ?></td>
						<td><?php echo $cpage->grievance; ?></td>
						 <td><?php echo $cpage->created_datetime; ?></td>	
                    </tr>  
                <?php }?>
            </tbody>
        </table>
        <div class="tablenav">
            <?php
                if($page_links)
                echo "<div class='tablenav-pages'>$page_links_text</div>";
            ?>
            <br class="clear" />
        </div>
    </form>
</div>
<?php }else{?>
    <br class="clear" />
    <table class="widefat post fixed j_table" cellspacing="10" cellpadding="10">
         <tr>
            <th width="100%"><strong>News</strong></th>
        </tr>
        <tr><td align="left"><?php _e('No Records Found.');?></td></tr>
    </table>
<?php }?>
<script type="text/javascript" src="<?php echo plugins_url( 'js/jquery-1.9.1.js' , __FILE__ ) ?>"></script>
	<script src="<?php echo plugins_url( 'js/table2excel.js' , __FILE__ ) ?>" type="text/javascript"></script>	
    <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#tblCustomers").table2excel({
                    filename: "staff-Form-Report.xls"
                });
            });
        });
    </script>