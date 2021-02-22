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
                                        				<th>Crop</th>
                                        				<th>Variety</th>
                                        				<th>Quantity</th>
                                        			</tr>
                                        		</thead>
                                        		<tbody>
													<?php 
													$c = 1;
													foreach($order as $order){ ?>
														<tr>
															<td><?php echo $c++; ?></td>
															<td>
																<select class="form-control">
																	<option value="">Select Crop</option>
																<select>
																<?php echo $order['CropName']; ?>
															</td>
															<td><?php echo $order['ProductName']; ?></td>
															<td><?php echo $order['qty']; ?></td>
														</tr>
													<?php }
													?>
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

<script>
    $(document).ready(function(){
    	var baseUrl = $('#baseUrl').val();
    });
</script>