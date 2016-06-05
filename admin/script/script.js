var inc=1;
$j(document).ready(function(){
    item_calculation.init();
    new_window_open.init();
    $j(".date_picker").datepicker({
        dateFormat:'yy-mm-dd',
        buttonImageOnly:true,
        changeYear:true
    });
    validator.init();
    common.init();
    $j(".date_picker").datepicker({
        dateFormat:'yy-mm-dd'
    });
    $j('button.button,input[type="button"].button,input[type="submit"].button,input[type="reset"].button,button.cancel,input[type="button"]').button();
    $j(".tooolbars #add").button({
        icons: {
            primary: 'ui-icon-plus'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-pencil'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-info'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-link'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-trash'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-refresh'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-disk'
        }
    }).next().button({
        icons: {
            primary: 'ui-icon ui-icon-disk'
        }
    });
    $j("#type_name").change(function(){
        if($j(this).val()=='Other')
            $j('#type_field').show();
        else
            $j('#type_field').hide();
        return true;
    });
    $j('.cancel').click(function(){
        window.history.back(-1);
    });
    $j("#valid_form").validate();
    $j('.staff_salary').bind("keyup",function(){
        common.calculate_staff_salary();
    });
    $j('.staff_bonus').bind("keyup",function(){
        common.calculate_staff_salary();
    });

    $j('.joperator_name').change(function(){        
        common.get_operator_code(this);
    });

    $j('.jopt_name').change(function(){
        common.get_operator_number(this);
    });

    $j('.joperator_number').change(function(){
        common.get_flexi_balance(this);
    });
    $j('#backup').live('click',function(){
        common.back_up_db();
        return false;
    });
    $j('.card_customer').change(function(){
        common.get_card_customer($j(this).val());
    });
    $j('.deposit_customer').change(function(){
        common.get_recharge_customer($j(this).val());
    });
    $j('.card_seller').change(function(){
        common.get_card_seller($j(this).val());
    });

$j('.jpopwindow_button').click(function(){
            common.popwindow_content(this);
        });





//    $j('.main_cat_value').live('change',function(){
//        var main_cat_id=$j(this).val();
//        alert(main_cat_id);
//        common.get_sub_cat_name(m_cat_id);
//
//    });

});
var item_calculation={
    init:function(){
        $j('.paid_amount').keyup(function(){
            item_calculation.claculate_balance();
        });

        $j('.vat').keyup(function(){
            item_calculation.claculate_balance();
        });

        $j('.discount').keyup(function(){
            item_calculation.claculate_balance();
        });
        $j('.calculate_total').keyup(function(){
            item_calculation.claculate_balance();
        });
    }
       
}
var new_window_open={
    init:function(){
        $j('.print_view').click(function(){
            new_window_open.print_view(this);
            return false;
        });
    },
    print_view:function(obj){
        var url=$j(obj).attr('rel');
        var title=$j(obj).attr('title');
        TheNewWin=window.open(url,title,'location = 1, width=800,height=600 resizable = no, status = 1, scrollbars = 1');
        var left   = (screen.width  - 800)/2;
        var top    = (screen.height - 600)/2;
        TheNewWin.moveTo(left,top);
    },
    print:function(){
        $j('#print').click(function(){
            window.print();
        });
    }
}
var common={
    init:function(){
        $j('.jadd_button').click(function(){
            common.add_content(this);
        });
        $j('.jedit_button').click(function(){
            common.edit_content(this);
        });
        $j('.jdelete_button').click(function(){
            common.delete_content(this);
        });
        $j('.jstatus_button').click(function(){
            common.status_content(this);
        });
        $j('.print_view_button').click(function(){
            common.print_view_content(this);
        });
        $j('.print_view_all').click(function(){
            common.print_view_all(this);
        });
        $j('.direct_print').click(function(){
            common.direct_print(this);
        });
        $j('#supplier_id').live('keyup',function(){
            common.get_supplier(this);
            return true;
        });
        $j('.supplier_name').live('click',function(){
            var supplier_id=$j(this).attr('rel');
            $j('#supplier_id').val(supplier_id);
            $j('.list').hide();
            var seller_id=$j(this).attr('id');
            common.supplier_info(seller_id);
            return false;
        });
        $j('#customer_id').live('keyup',function(){
            common.get_customer(this);
            return true;
        });
        $j('.customer_name').live('click',function(){
            var customer_id=$j(this).attr('rel');
            $j('#customer_id').val(customer_id);
            $j('.list').hide();
            common.customer_info(customer_id);
            return false;
        });
        $j('.product_serial').live('keyup',function(){
            common.get_product(this);
            return false;
        });
        $j('.product_name').live('click',function(){
            var p_id=$j(this).attr('rel');
            var id=$j(this).attr('title');
            var title=$j(this).attr('id');
            // alert(title)
            $j('#'+id).val(title);
          
            $j('.product_data_'+id).hide();
            common.product_info(p_id,id);
            return false;
        });
        $j('.show_link').click(function(){
            $j('.customer_info').show();
            $j('.hide_link').show();
            $j('.show_link').hide();
            $j('#display_customer_info').val('show');
        });
        $j('.hide_link').click(function(){
            $j('.customer_info').hide();
            $j('.hide_link').hide();
            $j('.show_link').show();
            $j('#display_customer_info').val('hide');
        });

        $j('.jreturn_button').click(function(){
            common.return_content(this);
        });


   


//    get_sub1_cat_name:function(main_cat_id){
//        $j.ajax({
//            type:'POST',
//            dataType:'json',
//            url:base_url+'product_category/get_sub_cat_name',
//            data:{
//                main_cat_id:main_cat_id
//            },
//            success:function(json){
//                var json_data=eval(json);
//                alert(json_data);
//                $j('.sub_cat_id').val(json_data.sub_cat_name);
//            },
//            error:function(h,m,s){
//                alert(h+m+s);
//            }
//        });
//    }



    },
    back_up_db:function(id){
        $j.ajax({
            type:'POST',
            url:base_url+"settings/backup",
            dataType:  'json',
            success:function(json){
                alert('Your database export successfully');
            }
        });
    },



   
    add_content:function(obj){
        var url=$j(obj).attr('title');
        window.location=base_url+url;
    },
    edit_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        window.location=base_url+url+'/'+id;
        return false;
    },
    delete_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        if(confirm('Are you sure want to delete the content?')){
            var url=$j(obj).attr('title');
            window.location=base_url+url+'/'+id;
        }

        return false;
    },
    status_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        window.location=base_url+url+'/'+id;
        return false;
    },
    print_view_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        var width=$j(obj).attr('name');
        open_win(url+id,width);
        return false;
    },


    direct_print:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var url=$j(obj).attr('title');
        var id=s[0];
        $j.ajax({
            type:'POST',
            url:base_url+url+id,
            success:function(html){
               
            },
            error:function(e,m,s)
            {

            }
        });
    },
    print_view_all:function(obj){
        var url=$j(obj).attr('title');
        var width=$j(obj).attr('name');
        open_win(url,width);
        return true;
    },
    return_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s;
        var url=$j(obj).attr('title');
        var name=$j(obj).attr('name');
        var set_data_url="";
        

        if(name=='sale'){
            set_data_url='sale/get_product_sale_id';
        }
        if(name=='purchase'){
            set_data_url='purchase/get_purchased_product_id';
        }

        $j.ajax({
            type:'POST',
            url:base_url+set_data_url,
            data:{
                id:id
            },
            success: function(proceed){
                if(proceed==true){
                    window.location=url;
                }
            }
            
        });
        return true;
    },
     popwindow_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=base_url+$j(obj).attr('title')+'/'+id;
        TheNewWin=window.open(url,'Print view','menubar=1,location = 1, width=900,height=600 resizable = no, status = 1, scrollbars = 1');
    var left   = (screen.width  - 880)/2;
        var top    = (screen.height - 600)/2;
        TheNewWin.moveTo(left,top);
         return false;
    }



   
    
}

