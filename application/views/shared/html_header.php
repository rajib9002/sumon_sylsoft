<head>
    <base href="<?= base_url()?>" />
    <?php $site_info=common::get_settings_data();?>
    <title><?php echo $site_info['company_name']?> :: <?php echo $title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="<?=base_url()?>images/favicon.ico" />
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <link href="style/screen.css" rel="stylesheet" type="text/css" media="screen" />

<!--    zoom-->


    <script type="text/javascript">
            var base_url="<?=site_url()?>";
        </script>

        <script type="text/javascript">

            function add_item(id,price_id){
                var qnt=$('#qnt_'+price_id).val();

                $.ajax({
                    url:base_url+"product/add_item",
                    type:"POST",
                    data:{product_id:id,quantity:qnt,price_id:price_id},

                        success:function(html) {

                        var item=html.split('|');
                        if (confirm(item[0]+' items in your cart')) {
                            $('.item').html(item[0]);
                            $('.price').html(item[1]);
                        }
                    }

                });
            }

            function deleterow(id){
                //  alert(id)
                if (confirm('Are you sure want to delete this item from your shopping cart?')) {
                    $.post(base_url+'product/delete_item', {id: +id, ajax: 'true' },


                    function(html){
                        $("#row_"+id).fadeOut("slow");
                        $('.total').html(html);
                        location.reload(true);
                    });
                
                }


                
                


            }

        </script>
</head>



<!-- Codes by Quackit.com -->
<html>
<head>

