<script src="<?php echo plugins_url( 'js/jquery-1.9.1.js' , __FILE__ ); ?>"></script>
<script src="<?php echo plugins_url( 'js/jquery-ui.js' , __FILE__ ); ?>"></script>
<script src="<?php echo plugins_url( 'js/jquery.validate.js' , __FILE__ ); ?>"></script>
<script src="<?php echo plugins_url( 'js/custom_validation.js' , __FILE__ ); ?>"></script>
<link rel="stylesheet" href="<?php echo plugins_url( 'css/table.css' , __FILE__ ) ?>"  type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo plugins_url( 'css/jquery-ui.css' , __FILE__ ); ?>" />
<style>select.error,textarea.error, input.error{border: 1px solid #DD7C8D!important;}label.error {clear: both;display: none;}</style>   
<script>
    $(document ).ready(function() {
        $(function() {
            $( "#start_date" ).datepicker({ 
                changeMonth: true,
                changeYear: true,
                yearRange: '1955:2020',
                dateFormat: 'dd/mm/yy' 
            });
            $( "#end_date" ).datepicker({ 
                changeMonth: true,
                changeYear: true,
                yearRange: '1955:2020',
                dateFormat: 'dd/mm/yy' 
            });
        });
    });
</script>
<?php
    global $wpdb;        
  
?>
<style type="text/css"> .hintText{color:#999999;} </style>

<script language="javascript" type="text/javascript">
    function menuSelection(obj){
        function removeSpaces(string) {
            return string.split(' ').join('');
        }
        if(removeSpaces(obj.imagetitle.value)==''){
            alert('Please enter image title');
            return false;
        }
        var file_edit= document.getElementById('fileUniName');
    }
</script>