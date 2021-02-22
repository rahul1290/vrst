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
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Orders List</h4>
                                        <div class="table-responsive">
                                        	<table class="table table-bordered">
                                        		<thead>
                                        			<tr class="bg-dark text-light">
                                        				<th>SNo.</th>
                                        				<th>State</th>
                                        				<th>OrderBy</th>
														<th>Bill No.</th>
														<?php if($this->session->userdata('user_type') == 'admin'){?>
															<th>Bill Status</th>
															<th>Varified By</th>
															<th>Varified user type</th>
														<?php } ?>
                                        				<th>Order Date</th>
                                        				<th>Order Detail</th>
                                        			</tr>
                                        		</thead>
                                        		<tbody>
                                        			<?php 
                                        			if(count($orders)>0){
                                        			    $c = 1;
                                        			    foreach($orders as $order){ ?>
                                        			    <tr>
                                        			       <td><?php echo $c++; ?></td>
                                        			       <td><?php echo $order['state_name']; ?></td>
                                        			       <td><?php echo $order['user_name']; ?></td>
														   <td><?php echo $order['bill_no']; ?></td>
														   <?php if($this->session->userdata('user_type') == 'admin'){ ?>
															   <td><?php echo $order['bill_status']; ?></td>
															   <td><?php echo $order['varified_by']; ?></td>
															   <td><?php echo $order['user_type']; ?></td>
														   <?php } ?>
                                        			       <td>
																<?php echo date('d/m/Y H:i:s',strtotime($order['created_at'])); ?>
															</td>
                                        			       <td>
																<a href="javascript:void(0);" class="view" data-id="<?php echo $order['bill_id']; ?>" alt="Quick View">
																	<span class="bx bx-show-alt"></span>
																	
																</a>
															</td>
                                        			     </tr>
                                        			    <?php }
                                        			}?>
                                        		</tbody>
                                        	</table>
                                        </div>
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



<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="Details">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){
    	var baseUrl = $('#baseUrl').val();
    	
    	$(document).on('click','.view',function(){
    		var x = $(this).data('id');
    		$.ajax({
                type: 'GET',
                url : baseUrl + 'Order_ctrl/orderDetail/' + x,
                dataType : 'json',
                
                success: function(response){
                console.log(response);
                    if(response.status == 200){
						var x = '<table>'+
									'<tr>'+
										'<td><b>Bill No.</b></td>'+
										'<td class="text-left"><b>'+ response.data['order_info'][0].bill_no + '</b></td>'+
									'</tr>'+
									'<tr>'+
										'<td><b>User Name</b></td>'+
										'<td class="text-left">'+ response.data['order_info'][0].user_name + '</td>'+
									'</tr>'+
									'<tr>'+
										'<td><b>User Detail</b></td>'+
										'<td class="text-left">'+
											'<table>'+
												'<tr>'+
													'<td>Contact No.:</td>'+
													'<td>'+ response.data['order_info'][0].contact_no + '</td>'+
												'</tr>'+
												'<tr>'+
													'<td>Alter-net No.:</td>'+
													'<td>'+ response.data['order_info'][0].alternet_no + '</td>'+
												'</tr>'+
												'<tr>'+
													'<td>Email:</td>'+
													'<td>'+ response.data['order_info'][0].email + '</td>'+
												'</tr>'+
											'</table>'+
										'</td>'+
									'</tr>'+
									'<tr>'+
										'<td><b>State</b></td>'+
										'<td class="text-left">'+ response.data['order_info'][0].state_name + '</td>'+
									'</tr>'+
									'<tr>'+
										'<td><b>Order Date</b></td>'+
										'<td class="text-left">'+ response.data['order_info'][0].created_at + '</td>'+
									'</tr>'+
									'<tr>'+
										'<td><b>Order Status</b></td>'+
										'<td class="text-left">'+ response.data['order_info'][0].bill_status + '</td>'+
									'</tr>'+
									'<tr>'+
										'<td><b>Bill Image</b></td>'+
										'<td class="text-left">'+
											'<img src="#" />'+
										'</td>'+
									'</tr>'+
								'</table>'+
								'<table class="table table-bordered table-striped">'+
									'<thead class="bg-dark text-light">'+
										'<tr>'+
											'<th>Crop</th>'+
											'<th>Variety</th>'+
											'<th>Qty(gm)</th>'+
											'</tr>'+
										'</thead>'+
										'<tbody>';
						$.each(response.data['order_detail'],function(key,value){
							x = x + '<tr>'+
										'<td>'+ value.CropName +'</td>'+
										'<td>'+ value.ProductName +'</td>'+
										'<td>'+ value.qty +'</td>'+
									'</tr>';
						});
						x = x + '</tbody>';
                        $('#Details').html(x);
						$('#exampleModal').modal({
							'show' : true
						});
                    }
                },
                cache: false,
            });
    	});
	});
</script>