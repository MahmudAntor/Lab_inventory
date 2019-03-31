$(function(){
	$(document).ready(function(e) {
        cal();
    });
	$(document).on('keyup','.pro_id',function(){
		var id=$(this).val();
		$this=$(this).parent().parent();
		if (id.length=='4'){
			$.ajax({
				type: "POST",
				url: 'include/product_info.php',
				data:  { "id": id},
				dataType: "json",
				success: function(data)
				{	//alert(data.DESCRIPTION);
				    $this.find('.pro_name').html(data.product_name);
					$this.find('.pro_des').html(data.product_des);
					$this.find('.pro_price').html(data.product_price);
					$this.find('.pro_discount').html(data.product_discount);
					
                    var pro_discount=$this.find('.pro_discount').html();
					var price=$this.find('.pro_price').html();
					var quantity=$this.find('.pro_quan').val();
					//var p_dis=parseFloat(price*quantity-((price*quantity*pro_discount)/100));
					//alert(quantity);
					$this.find('.pro_total').html(parseFloat(price*quantity-((price*quantity*pro_discount)/100)).toFixed(2));
					
					cal();
				}
			})
			
			
		}
		
		else{
			$this.find('.pro_name').html('Error');
			$this.find('.pro_des').html('');
			$this.find('.pro_price').html('0');
			$this.find('.pro_total').html('0.00');
			$this.find('.pro_discount').html('0%')
			cal();
		}
		
		
	});
	
	$(document).on('keyup','.pro_quan',function(){
		var pro_discount=$(this).parent().parent().find('.pro_discount').html();
		var price=$(this).parent().parent().find('.pro_price').html();
		var quantity=$(this).parent().parent().find('.pro_quan').val();
		
		//alert(quantity);
		$(this).parent().parent().find('.pro_total').html(parseFloat(price*quantity-((price*quantity*pro_discount)/100)).toFixed(2));
		
		cal();
	});
	
	$(document).on('click','#add_item',function(e){
		e.preventDefault();
		$('#tbl_product').append('<tr><td><img class="del" src="images/delete.png" /></td><td><input type="text" name="product_id[]" class="pro_id" style="width:60px" required="required" /></td><td class="pro_name"></td><td class="pro_des"></td><td class="pro_price">0</td><td><input type="text" name="product_quantity[]" value="1" class="pro_quan" /></td><td class="pro_discount">%</td><td class="pro_total">0.00</td></tr>');
	});
	
	
	$(document).on('click','.del',function(){
		$(this).parent().parent().remove();
		cal();
	});
	
	
	function cal(){
		var offer=parseFloat($('.pd').html());
		var test=parseFloat($('#discount').val());
		var test2=parseFloat(offer+test);
		var sum=0;
		
		$('.pro_total').each(function() {
            sum+=parseFloat($(this).html());
        });
		
		//var discount=parseFloat(($('#discount').val()*sum)/100).toFixed(2);
		var total_discount=parseFloat((test2*sum)/100).toFixed(2);
		var cash=parseFloat(sum-total_discount).toFixed(2);
		var p_amount=$('#payment_amount').val();
		var return_amount=parseFloat(p_amount-cash);
		//alert(return_amount);
		$('#total_price').html(sum.toFixed(2)+' TK');
		$('#ovr_dis').html(total_discount+' TK');
		$('#cash').html(cash+' TK');
		$('#return_amount').html(return_amount.toFixed(2)+' TK');
		//alert(return_amount);
		$('#total_amount').val(sum.toFixed(2));
		$('#total_cash').val(cash);
		$('#total_discount').val(total_discount);
		$('#total_return').val(return_amount.toFixed(2));
		
		
	}
	

	
	$(document).on('keyup','#discount',function(){
		cal();
	});
	
});