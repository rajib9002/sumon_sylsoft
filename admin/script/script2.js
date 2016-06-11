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
    },
    photostate_sale_item:function(inc){
        var sale_rate;
        var press=$j('#press_'+inc).val();
        if(press=='' || isNaN(press)){
            alert('invalid input');
            $j('.rate_'+inc).val(0);
            $j('.total_amount_'+inc).val(0);
    
        }
        sale_rate=$j('#sale_rate').val();
        if($j('.rate_'+inc).val())
            sale_rate=$j('.rate_'+inc).val();
        
        $j('.rate_'+inc).val(sale_rate);
        var total=parseFloat(sale_rate*press);
      
        var accurate_total=(Math.round(total));
        $j('.total_amount_'+inc).val(accurate_total.toFixed(2));
    },
    photostate_sale_rate:function(inc){
        var press=$j('#press_'+inc).val();
        var sale_rate=$j('.rate_'+inc).val();
        //$j('.rate_'+inc).val(sale_rate);
        var total=parseFloat(sale_rate*press);

        var accurate_total=(Math.round(total));
        $j('.total_amount_'+inc).val(accurate_total.toFixed(2));
    },
    check_return_quantity:function(inc){
        var return_quantity=parseFloat($j('.quantity_'+inc).val());
        var sold_quantity=parseFloat($j('.quantity_'+inc).attr('title'));
        if(return_quantity>sold_quantity){
            alert("Invalid Quantity");
            $j('.quantity_'+inc).val(sold_quantity);
        }
    },
    price_quantity:function(inc){

        var available=$j('.available_'+inc).val();
        var available_quantity=parseFloat(available);

        var vat_type=$j("input[name='vat_type']").val();
        var vat=0;
        if(vat_type==1){
            vat=$j('.vat_'+inc).val()
            
        }

        var q=$j('.quantity_'+inc).val()
        if(q==''){
            q=0;
        }
        var quantity=parseFloat(q);
        if($j('#type').val()=='sale' && quantity>available_quantity){
            alert('Quantity out of stock!!');
            $j('.quantity_'+inc).val(available_quantity);
            quantity=available_quantity;
            
        }
        var p=$j('.price_'+inc).val();
        if(p==''){
            p=0;
        }
        var price=parseFloat(p);
        var amount=quantity*price;
        var total_vat=parseFloat((amount*vat)/100);
        $j('.amount_'+inc).val((amount+total_vat).toFixed(2));
        item_calculation.reset_price_quantity();
        item_calculation.claculate_balance();
    },
    reset_price_quantity:function(){
        var tot_amount=0;
        var amount=0;
        var price=0;
        var tot_quan=0;
        var tot_vat=0;
        var quan=0;
        for(i=0;i<inc;i++){
            amount=$j('.amount_'+i).val();
            quan=$j('.quantity_'+i).val();
            price=$j('.price_'+i).val();
            vat=$j('.vat_'+i).val();
            if(amount!=''&& amount!=null && amount!=undefined){
                tot_amount+=parseFloat(amount);
            }
            if(quan!=''&& quan!=null && quan!=undefined){
                tot_quan+=parseInt(quan);
            }
            if(vat!=''&& vat!=null && vat!=undefined){
                tot_vat+=parseInt((price*quan*vat)/100);
            }
        }
        $j('.total_amount').val(tot_amount.toFixed(2));
        vat=$j("input[name='t_vat']").val();
        $j('.total_vat').val(tot_vat.toFixed(2));
        $j('#total_vat').html(tot_vat.toFixed(2));
        $j('.total_quantity').val(tot_quan);

        $j('#total_amount').html(tot_amount.toFixed(2));
        $j('#total_quantity').html(tot_quan);
    },
    claculate_balance:function(){
        var a=$j('.total_amount').val();
        if(a==''|| a == null){
            a=0;
        }
        var total_amount=parseFloat(a);
        var pre_amount=$j("input[name='previous_amount']").val();
        if(pre_amount==''||pre_amount==null||pre_amount==undefined){
            pre_amount=0;
        }
        var pre_a=parseFloat(pre_amount);
        var discount=$j("input[name='discount']").val();
        if(discount==''||discount==null||discount==undefined){
            discount=0;
        }
        var total_discount;
        var discount_type=$j("input[name='discount']").attr('title');
        if(discount_type==0){
            total_discount=parseFloat(discount)
        }else{
            total_discount=parseFloat((total_amount*discount)/100);
        }
        var d=$j('.paid_amount').val();
        if(d==''||d==null){
            d=0;
        }
        var vat_type=$j("input[name='vat_type']").val();
        var vat=0;
        if(vat_type==0){
            vat=$j("input[name='t_vat']").val();
        }
        var total_vat=parseFloat((total_amount*vat)/100);
        var deposit_amount=parseFloat(d);
        var b=total_amount+total_vat-deposit_amount+pre_a-total_discount;
        $j('.due').val(b.toFixed(2));
        $j('#due').html(b.toFixed(2));
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
    get_product:function(obj){
        var txt=$j(obj).val();
        var id=$j(obj).attr('id');        
        var product_array=new Array(id);
        for(i=id;i>=0;i--){
            product_array[i]=$j('#'+i).val();
        }
        $j.ajax({
            type:'POST',

            url:base_url+'products/get_product',
            data:{
                txt:txt,
                id:id,
                product_array:product_array
            },
            success:function(html){
                if(txt==''){
                    $j('.product_data_'+id).css('display','none');
                }
                else if(html=='')
                {
                    $j('.product_data_'+id).css('display:block','color:red');

                    $j('#supplier_info').html('<span  generated="true" class="error" style="padding-left:170px!important">No Supplier Found on this Id</span>');
                    $j('.product_data_'+id).html("");
                }
                else{
                    $j('.product_data_'+id).css('display','block');
                    $j('.product_data_'+id).html(html);
                }
            },
            error:function(e,m,s)
            {

            }
        });
    },
    get_card_customer:function(cid){
        $j.ajax({
            type:'POST',
            url:base_url+"flexi/card_customer_due",
            data:{
                cid:cid
            },
            success:function(data){
                var amount=parseFloat(data);
                $j('#amount_1').val(amount.toFixed(2));
                $j('#due_1').val(amount.toFixed(2));
            }
        });
    },
    get_card_seller:function(cid){
        $j.ajax({
            type:'POST',
            url:base_url+"flexi/card_seller_due",
            data:{
                cid:cid
            },
            success:function(data){
                var amount=parseFloat(data);
                $j('#amount_1').val(amount.toFixed(2));
                $j('#due_1').val(amount.toFixed(2));
            }
        });
    },
    get_recharge_customer:function(cid){
        $j.ajax({
            type:'POST',
            url:base_url+"flexi/recharge_customer_due",
            data:{
                cid:cid
            },
            success:function(data){
                var amount=parseFloat(data);
                $j('#amount_1').val(amount.toFixed(2));
                $j('#due_1').val(amount.toFixed(2));
            }
        });
    },
    get_recharge_customer_by_due:function(){
        var to_date=$j("input[name='due_to']").val();
      
        var from_date=$j("input[name='due_from']").val();
        $j.ajax({
            type:'POST',
            url:base_url+"flexi/card_customer_list_by_due",
            data:{
                from_date:from_date,
                to_date:to_date
            },
            success:function(data){
                var amount=parseFloat(data);
                $j('#amount_1').val(amount.toFixed(2));
                $j('#due_1').val(amount.toFixed(2));
            }
        });
    },
    product_info:function(pid,id){
        $j.ajax({
            type:'POST',
            url:base_url+"products/product_info",
            data:{
                pid:pid
            },
            dataType:  'json',
            success:function(json){
                var pdata=eval(json);
                var sale_price=pdata.pr_sale_rate;
                var available_quantity=pdata.pr_quantity;
                var vat_type=$j("input[name='vat_type']").val();
                var vat=0;
                if(vat_type==1){
                    vat=pdata.pr_vat;
                }
                $j('#pr_serial_'+id).val(pdata.pr_serial);
                $j('.available_'+id).val(available_quantity);
                if($j('#type').val()=='sale'){
                    $j('.price_'+id).val(sale_price);
                    
                    $j('.quantity_'+id).val(1);
                    $j('.vat_'+id).val(vat);
                    item_calculation.price_quantity(id);
                    var price=parseFloat(sale_price);
                    if(available_quantity<=0){
                        $j('.amount_'+id).val(0);
                    }else{
                        var amount=1*price;
                        var total_vat=parseFloat((amount*vat)/100);
                        amount+=total_vat;
                        $j('.amount_'+id).val(amount.toFixed(2));
                    }
                }
            }
        });
    },
    customer_info:function(id){
        $j.ajax({
            type:'POST',
            url:base_url+"customer/get_customer_info",
            data:{
                id:id
            },
            dataType:  'json',
            success:function(json){
                customer=eval(json);
                if(customer==null){
                    $j('#customer_info').html('<span  generated="true" class="error" style="padding-left:170px!important">No Buyer Found on this Id</span>');
                    $j('#previous_balance').val('0.00');
                    return false;
                }
                else
                {
                    $j('#customer_name').val(customer.cust_name);
                    $j('#customer_phone').val(customer.cust_phone);
                    $j('#customer_address').val(customer.cust_address);
                    $j('#customer_emial').val(customer.cust_email);
                    $j('#customer_mobile').val(customer.cust_mobile);
                    $j('#previous_balance').val(customer.balance);
                    var current_due=parseFloat($j('#total_amount').val())-parseFloat($j('#discount').val())-parseFloat($j('#paid_amount').val());
                    //   alert(current_due);
                  
                    if(current_due!=null || current_due!=undefined || current_due!=''&&!isNaN(current_due))
                    {
                        $j('#due').html(parseFloat(current_due)+parseFloat(customer.balance));
                        $j('.due').val(parseFloat(current_due)+parseFloat(customer.balance));
                    }
                    else{
                        $j('#due').html(customer.balance);
                        $j('.due').val(customer.balance);
                    }
                    item_calculation.claculate_balance();
                }
            }
        });
    },
    supplier_info:function(id){
        $j.ajax({
            type:'POST',
            url:base_url+"seller/get_seller_info",
            data:{
                id:id
            },
            dataType:  'json',
            success:function(json){
                supplier=eval(json);
                if(supplier==null){
                    $j('#supplier_info').html('<span  generated="true" class="error" style="padding-left:170px!important">No Supplier Found on this Id</span>');
                    $j('#previous_balance').val('0.00');
                    return false;
                }
                else
                {
                    $j('#seller_name').val(supplier.seller_name);
                    $j('#company_name').val(supplier.company_name);
                    $j('#seller_address').val(supplier.seller_address);
                    $j('#seller_phone').val(supplier.seller_phone);
                    $j('#seller_mobile').val(supplier.seller_mobile);
                    $j('#seller_email').val(supplier.seller_email);
                    $j('#previous_balance').val(supplier.balance);
                    var current_due=parseFloat($j('#total_amount').val())-parseFloat($j('#discount').val())-parseFloat($j('#paid_amount').val());
                    if((current_due!=null || current_due!=undefined || current_due!='')&&!isNaN(current_due))
                    {
                        $j('#due').html(parseFloat(current_due)+parseFloat(supplier.balance));
                        $j('.due').val(parseFloat(current_due)+parseFloat(supplier.balance));
                    }
                    else{
                        $j('#due').html(supplier.balance);
                        $j('.due').val(supplier.balance);
                    }
                    item_calculation.claculate_balance();
                }
            }
        });
    },
    get_product_list:function(product_name,serial_number){
        $j.ajax({
            type:'POST',
            url:base_url+'products/get_product_list',
            data:{
                pr_search:product_name
            },
            success:function(html){
                var id=".list";
                var price_id=".price"+serial_number;
                if(html=='')
                {
                    $j(id).css('display:block','color:red');
                    $j('#supplier_info').html('<span  generated="true" class="error" style="padding-left:170px!important">No Supplier Found on this Id</span>');
                    $j(price_id).val('');
                    $j(id).html("");
                }
                else{
                    $j(id).css('display','block');
                    $j(id).html(html);
                }
            },
            error:function(e,m,s)
            {
            }
        });
    },
    get_supplier:function(txt){
        $j.ajax({
            type:'POST',
            url:base_url+'seller/get_seller',
            data:{
                id:txt.value
            },
            success:function(html){
                if(txt.value==''){
                    $j('.list').css('display','none');
                }
                else if(html=='')
                {
                    $j('.list').css('display:block','color:red');

                    $j('#supplier_info').html('<span  generated="true" class="error" style="padding-left:170px!important">No Supplier Found on this Id</span>');
                    $j('#seller_name').val('');
                    $j('#company_name').val('');
                    $j('#seller_address').val('');
                    $j('#seller_phone').val('');
                    $j('#seller_mobile').val('');
                    $j('#seller_email').val('');


                    $j('.list').html("");
                }
                else{
                    $j('.list').css('display','block');
                    $j('.list').html(html);
                }
            },
            error:function(e,m,s)
            {
            }
        });
    },
    get_customer:function(txt){

        $j.ajax({
            type:'POST',
            url:base_url+'customer/get_customer',
            data:{

                id:txt.value
            },
            success:function(html){
                if(txt.value==''){
                    $j('.list').css('display','none');
                }
                else if(html=='')
                {
                    $j('.list').css('display:block','color:red');

                    $j('#customer_info').html('<span  generated="true" class="error" style="padding-left:170px!important">No Supplier Found on this Id</span>');
                    $j('#customer_name').val('');
                    $j('#customer_phone').val('');
                    $j('#customer_address').val('');
                    $j('#customer_emial').val('');
                    $j('#customer_mobile').val('');
                    //$j('#seller_email').val('');


                    $j('.list').html("");
                }
                else{
                    $j('.list').css('display','block');
                    $j('.list').html(html);
                }
            },
            error:function(e,m,s)
            {

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
    calculate_staff_salary:function(){
        $j("[id^=staff_total]").calc("staff_bonus+staff_salary",
        {
            staff_bonus: $j(".staff_bonus"),
            staff_salary: $j(".staff_salary")
        },
        function (s){
            return s.toFixed(2);
        }
        )
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
    get_operator_code:function(obj){
        var operator_name=$j(obj).val();
        
        $j.ajax({
            type:'POST',
            url:base_url+'flexi/get_operator_code',
            data:{
                operator_name:operator_name
            },
            success:function(code){
                
                $j('.joperator_code').val(code);
                
                
            }

        });
        
    },
    get_operator_number:function(obj){
        var operator_name=$j(obj).val();       

        $j.ajax({
            type:'POST',
            url:base_url+'flexi/get_operator_number',
            data:{
                operator_name:operator_name
            },
            success:function(html){
                
                $j('.joperator_number').html(html);

            }

        });

    },
    get_flexi_balance:function(obj){
        var operator_id=$j(obj).val();

        $j.ajax({
            type:'POST',
            url:base_url+'flexi/get_flexi_balance',
            data:{
                operator_id:operator_id
            },
            success:function(html){
                if(html=='')
                    $j('.jflexi_balance').html(0);
                else
                    $j('.jflexi_balance').html(html);

            }

        });

    }
}

function open_win(url,width)
{
    var width=800;
        var full_url=base_url+url;
        var height=600;
        var left = parseInt((screen.availWidth / 2) - (width / 2));
        var top = parseInt((screen.availHeight / 2) - (height / 2));
         var windowFeatures = "width=" + width + ",height=" + height + ",menubar=1,status=0,resizable=no,location=1,toolbar=0,scrollbars=1,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
        child1 = window.open(full_url, "Print", windowFeatures);
}
function cancel_thickbox(){
    $j('.err').val('');
    $j('.error').val('');
    $j('#err').val('');
    $j("TB_window").delay(2000).fadeOut(1000);
    $j("#TB_window").fadeOut("slow",function(){
        $j('#TB_window,#TB_overlay,#TB_HideSelect').trigger("unload").unbind().remove();
    });
    $j("#TB_load").remove();
}

//function add_more_purchase(){
//
//                var new_products="<tr>"+
//                    "<td><select class='input_txt product_serial width_160'  name='pro_serial[]' ><?=customSql::get_products()?></select></td>"+
//                    "<td><input type='text' class='input_txt width_80 number price_<?=$i++?>' onkeyup='javascript:item_calculation.price_quantity(<?=$i++?>)'  name='price[]' /></td>"+
//                    "<td><input type='text' class='input_txt width_80 number quantity_<?=$i++?>' onkeyup='javascript:item_calculation.price_quantity(<?=$i++?>)'  name='quantity[]' /></td>"+
//                    "<td><input type='text' class='input_txt width_80' name='warrenty[]' /></td>"+
//                    "<td><input type='text' class='input_txt width_80' name='service[]' /></td>"+
//                    "<td><input type='text' class='input_txt width_80 number amount_<?=$i++?>' name='amount[]' /></td>"+
//                    "</tr>";
//                $j('#purchase_product').append(new_products);
//                return false;
//
//    }

function product_autocompleter()
{
    $j('.product_serial').autocomplete(products,{
        minChars: 0,
        width: 200,
        matchContains: "word",
        autoFill: false,
        formatItem: function(row, i, max) {
            //return i + "/" + max + ": \"" + row.pro_serial + "\" [" + row.pro_name + "]";
            return row.pr_serial + " [" + row.pr_name + "]";
        },
        formatMatch: function(row, i, max) {
            return row.pr_serial + " " + row.pr_name;
        },
        formatResult: function(row) {
            return row.pr_serial;
        }
    });
}

function get_product_info(serial_number){
    // alert(serial_number.toString());
    var id="#product_name_"+serial_number;
    // alert(id);
    var product_name=$j(id).val();
    //alert(seller_id);
    var products=common.get_product_list(product_name,serial_number);


}
function change_paid(inch){
    var amount=parseFloat($j('#amount_'+inch).val());
    var paid=parseFloat($j('#paid_'+inch).val());
    $j('#paid_'+inch).val(parseFloat(amount));
    $j("[id^=due_"+inch+"]").calc("amount_val-paid_val",
    {
        amount_val: $j("#amount_"+inch),
        paid_val: $j("#paid_"+inch)
    //   staff_salary: $j(".staff_salary")
    },

    function (s){
        return s.toFixed(2);
    }
    );

}
function change_paid(inch){
    var amount=parseFloat($j('#amount_'+inch).val());
    var paid=parseFloat($j('#paid_'+inch).val());
    $j('#paid_'+inch).val(parseFloat(amount));
    $j("[id^=due_"+inch+"]").calc("amount_val-paid_val",
    {
        amount_val: $j("#amount_"+inch),
        paid_val: $j("#paid_"+inch)
    
    },

    function (s){
        return s.toFixed(2);
    }
    );

}
function change_due(inch){
    $j("[id^=due_"+inch+"]").calc("amount_val-paid_val",
    {
        amount_val: $j("#amount_"+inch),
        paid_val: $j("#paid_"+inch)
    },
    function (s){
        return s.toFixed(2);
    }
    );

}
function change_sale_due(inch){
    $j("[id^=due_"+inch+"]").calc("amount_val*qnt-paid_val",
    {
        amount_val: $j("#amount_"+inch),
        paid_val: $j("#paid_"+inch),
        qnt: $j("#qnt_"+inch)
    },
    function (s){
        return s.toFixed(2);
    }
    );

}
function change_sale(inch){
   
    $j("[id^=total_"+inch+"]").calc("amount_val*qnt",
    {
        amount_val: $j("#amount_"+inch),
        paid_val: $j("#paid_"+inch),
        qnt: $j("#qnt_"+inch)
    },
    function (s){
        return s.toFixed(2);
    }
    );
    $j("[id^=due_"+inch+"]").calc("amount_val*qnt-paid_val",
    {
        amount_val: $j("#amount_"+inch),
        paid_val: $j("#paid_"+inch),
        qnt: $j("#qnt_"+inch)
    },
    function (s){
        return s.toFixed(2);
    }
    );

}

