<!-- Begin page -->
<div id="layout-wrapper">

    <?php if(isset($topheader)){ print_r($topheader); }?>
    <!-- ========== Left Sidebar Start ========== -->
    <?php if(isset($sidebar_nav)) { print_r($sidebar_nav); }?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

            <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="card-title mb-4">Purchase Order Detail</h4>
										
										<table border="1" width="100%">
											<tr>
												<td><b>Bill No.</b></td>
												<td class="text-left"><b><?php echo $order_detail[0]['bill_no']; ?></b></td>
											</tr>
											<tr>
												<td><b>User Name</b></td>
												<td class="text-left"><?php echo $order_detail[0]['user_name']; ?></td>
											</tr>
											<tr>
												<td><b>User Detail</b></td>
												<td class="text-left">
													<table>
														<tr>
															<td>Contact No.:</td>
															<td><?php echo $order_detail[0]['contact_no']; ?></td>
														</tr>
														<tr>
															<td>Alter-net No.:</td>
															<td><?php echo $order_detail[0]['alternet_no']; ?></td>
														</tr>
														<tr>
															<td>Email:</td>
															<td><?php echo $order_detail[0]['email']; ?></td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td><b>State</b></td>
												<td class="text-left"><?php echo $order_detail[0]['state_name']; ?></td>
											</tr>
											<tr>
												<td><b>Order Date</b></td>
												<td class="text-left"><?php echo date('d/m/Y H:i:s',strtotime($order_detail[0]['created_at'])); ?></td>
											</tr>
											<tr>
												<td><b>Order Status</b></td>
												<td class="text-left"><?php echo $order_detail[0]['bill_status']; ?></td>
											</tr>
											<tr>
												<td><b>Bill Image</b></td>
												<td class="text-left">
													<img src="<?php echo base_url('assets/images/bill.png');?>" />
												</td>
											</tr>
											<tr>
												<td><b>Order Detail</b></td>
												<td>
													<div class="table-responsive">
														<table class="table table-bordered table-striped">
															<thead>
																<tr class="bg-dark text-light">
																	<th>SNo.</th>
																	<th>Crop</th>
																	<th>Variety</th>
																	<th>Quantity(gm)</th>
																	<th>Return(gm)</th>
																	<th>Balance(gm)</th>
																</tr>
															</thead>
															<tbody id="_billDetail">
															</tbody>
														</table>
													</div>
												</td>
											</tr>
										</table>
										<br/>
										<input class="btn btn-danger text-center" id="submit" type="button" value="Submit">
										
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        
      
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->
<div class="modal fade" id="AddbillEntry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bill Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="Details">
		<input type="hidden" id="addbillId" value="">
		<label>Crop</label>
		<select class="form-control" id="addCrop">
			<option value="">Select Crop</option>
			<?php foreach($crops as $crop){ ?>
				<option value="<?php echo $crop['CropId']; ?>"><?php echo $crop['CropName']; ?></option>
			<?php } ?>
		<select>
		
		<label>Crop Variety</label>
		<select class="form-control" id="addvariety">
			<option value="">Select CropVariety</option>
			<?php foreach($variety as $var){ ?>
				<option value="<?php echo $var['ProductId']; ?>"><?php echo $var['ProductName']; ?></option>
			<?php } ?>
		<select>
		
		<label>Qty</label>
		<input type="text" id="addQty" value="" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="Add-entry" data-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>


<!-- update bill -->
<div class="modal fade" id="updatebillEntry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bill Entry Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="Details">
		<input type="hidden" id="updatebillId" value="">
		<input type="hidden" id="index" value="">
		<label>Crop</label>
		<select class="form-control" id="updateCrop">
			<option value="">Select Crop</option>
			<?php foreach($crops as $crop){ ?>
				<option value="<?php echo $crop['CropId']; ?>"><?php echo $crop['CropName']; ?></option>
			<?php } ?>
		<select>
		
		<label>Crop Variety</label>
		<select class="form-control" id="updatevariety">
			<option value="">Select CropVariety</option>
			<?php foreach($variety as $var){ ?>
				<option value="<?php echo $var['ProductId']; ?>"><?php echo $var['ProductName']; ?></option>
			<?php } ?>
		<select>
		
		<label>Qty</label>
		<input type="text" id="updateQty" value="" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="update-entry" data-dismiss="modal">update</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){
    	var baseUrl = $('#baseUrl').val();
		bill = <?php if(isset($orders)){ echo json_encode($orders); } else { echo '[]'; } ?>;
		
		billEntry();
		
		$(document).on('click','#update-entry',function(){
			index = $('#index').val();
			bill.splice(index,1);
			
			var x = {
                'CropName': $("#updateCrop option:selected").text(),
                'ProductName' : $("#updatevariety option:selected").text(),
				'bill_detail_id' : 0,
				'bill_id' : $('#updatebillId').val(),
				'crop' : $('#updateCrop').val(),
				'crop_variety' : $('#updatevariety').val(),
				'qty' : $('#updateQty').val(),
				'status' : 1,
				'unit' : 1
            }
            bill.push(x);
			billEntry();
		});
		
		
		
		function billEntry(){
			var x;
			$.each(bill,function(key,value){
				x  = x + '<tr>'+
							'<td>'+ parseInt(key+1) +'</td>'+
							'<td>'+ value.CropName +'</td>'+
							'<td>'+ value.ProductName +'</td>'+
							'<td>'+ value.qty +'</td>'+
							'<td><input class="return_qty" id="bill_'+key+'_return" data-key="'+ key +'" data-qty="'+ value.qty +'" type="text" max="'+ value.qty +'"></td>'+
							'<td><span id="balance_qty_'+ key +'">'+ value.qty +'</span></td>'+
						'</tr>'; 
			});
			
			$('#_billDetail').html(x);
			
			console.log(bill);
		}
		
		
		$(document).on('blur','.return_qty',function(){
			var entryId = $(this).data('key');
			var qty = $(this).data('qty');
			var return_qty = $(this).val();
			if(return_qty != ''){
				if(return_qty >= 0){
					if((qty - return_qty) >= 0){
						$('#balance_qty_'+ entryId).html(qty - return_qty);
						bill[entryId]['return_qty'] = return_qty;
						bill[entryId]['qty'] = (qty - return_qty);
						console.log(bill);
					} else {
						alert('Return Qty not more then order Quantity.');
						$(this).val('0');
						$('#balance_qty_'+ entryId).html(qty - 0);
						bill[entryId]['return_qty'] = 0;
						bill[entryId]['qty'] = (qty - 0);
					}
				} else {
					alert('Enter valid no.');
					$(this).val('0');
					$('#balance_qty_'+ entryId).html(qty - 0);
					bill[entryId]['return_qty'] = 0;
					bill[entryId]['qty'] = (qty - 0);
				}
			}
		});
		
		$(document).on('click','#submit',function(){
			var c = confirm('');
			if(c){
				$.ajax({
					type: 'POST',
					url : baseUrl + 'Order_ctrl/returnOrder',
					data : {
						'orderId' : <?php echo $this->uri->segment(3); ?>,
						'entries' : bill,
					},
					dataType : 'json',
					
					success: function(response){
						console.log(response);
						if(response.status == 200){
							alert(response.msg);
							window.location.replace(baseUrl +'Order_ctrl/history');
						}
						else {
							alert(response.msg);
						}
					},
					cache: false,
				});
			}
		});
    });
</script>