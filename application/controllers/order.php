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
                                        <h4 class="card-title mb-4">Purchase Orderes</h4>
                                        <div class="table-responsive">
                                        	<table class="table table-bordered">
                                        		<thead>
                                        			<tr class="bg-dark text-light">
                                        				<th>SNo.</th>
                                        				<th>State</th>
                                        				<th>OrderBy</th>
                                        				<th>Varified By</th>
                                        				<th>Varified user type</th>
                                        				<th>Order Date</th>
                                        				<th>View Order</th>
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
                                        			       <td><?php echo $order['varified_by']; ?></td>
                                        			       <td><?php echo $order['user_type']; ?></td>
                                        			       <td><?php echo date('d/m/Y'); ?></td>
                                        			       <td>
                                        			       	<a href="javascript:void(0);" class="view" data-id="<?php echo $order['bill_id']; ?>">View</a></td>
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



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                url : baseUrl + 'Order_Ctrl/orderDetail/' + x,
                dataType : 'json',
                
                success: function(response){
                console.log(response);
                    if(response.status == 200){
                        console.log(response);
                    }
                    else {
                        //alert(response.msg);
                    }
                },
                cache: false,
            });
            
    		
//     		$('#exampleModal').modal({
//     			'show' : true
//     		})
    	});
	});
</script>