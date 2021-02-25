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
                                        <h4 class="card-title mb-4">Create New Scheme</h4>
                                        <form class="outer-repeater" name="f1" id="f1">
                                            <div data-repeater-list="outer-group" class="outer">
                                                <div data-repeater-item class="outer">
                                                    <div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">State</label>
                                                        <div class="col-lg-10">
                                                            <select name="state" id="state" class="form-control">
                                                                <option value="0">Select State</option>
                                                                <?php 
                                                                    foreach($state as $row){ ?>
                                                                        <option value="<?php echo $row['state_code']; ?>"
                                                                        <?php 
                                                                        if(isset($schemeDetail)){
                                                                            if($schemeDetail[0]['state_code'] == $row['state_code']){
                                                                                echo "selected";
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                        ?>
                                                                        >
                                                                            <?php echo $row['state_name']; ?>
                                                                        </option>
                                                                <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
													
													<div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">Crop</label>
                                                        <div class="col-lg-10">
                                                            <select name="crop" id="crop" class="form-control">
                                                                <option value="0">Select Crop</option>
                                                                <?php 
                                                                    foreach($crops as $crop){ ?>
                                                                        <option value="<?php echo $crop['CropId']; ?>"
																		<?php if(isset($schemeDetail)){
                                                                            if($schemeDetail[0]['crop_id'] == $crop['CropId']){ 
																			echo "selected";
																		} } ?>
																		>
                                                                            <?php echo $crop['CropName']; ?>
                                                                        </option>
                                                                <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
													
													<!--<div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">Variety</label>
                                                        <div class="col-lg-10">
                                                            <select name="state" id="variety" class="form-control">
                                                                <option value="0">Select Crop Variety</option>
                                                            </select>
                                                        </div>
                                                    </div>-->
													
                                                    <div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">Headling</label>
                                                        <div class="col-lg-10">
                                                            <input id="heading" name="heading" type="text" class="form-control" placeholder="Heading"
                                                            value = "<?php if(isset($schemeDetail) && (count($schemeDetail)>0)){
                                                                            echo $schemeDetail[0]['heading'];
                                                                        } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">Sub-Headling</label>
                                                        <div class="col-lg-10">
                                                            <input id="subheading" name="subheading" type="text" class="form-control" placeholder="Sub Heading"
                                                            value = "<?php if(isset($schemeDetail) && (count($schemeDetail)>0)){
                                                                            echo $schemeDetail[0]['subheading'];
                                                                    } ?>">
                                                        </div>
                                                    </div>
                                                    
                                                	<div class="form-group row ">
                                                        <label for="taskname" class="col-form-label col-lg-2">Scheme Date</label>
                                                        <input class="col-4 ml-1 mr-2" name="from_date" id="from_date" type="date" value="<?php if(isset($schemeDetail) && (count($schemeDetail)>0)){
                                                                            echo date('Y-m-d',strtotime($schemeDetail[0]['from_date']));
                                                                    } ?>" />
                                                        <input class="col-4" name="to_date" id="to_date" type="date" value="<?php if(isset($schemeDetail) && (count($schemeDetail)>0)){
                                                                            echo date('Y-m-d',strtotime($schemeDetail[0]['to_date']));
                                                                    } ?>" />	
                                                    </div>
                                                        
                                                    
													<div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">Term & Condition </label>
                                                        <div class="col-lg-10">
                                                            <textarea name="instruction" id="instruction">
																	<?php if(isset($schemeDetail) && (count($schemeDetail)>0)){
                                                                            echo $schemeDetail[0]['instruction'];
                                                                    } ?>
															</textarea>
															<script>
																CKEDITOR.replace('instruction');
															</script>
                                                        </div>
                                                    </div>
													
													
                                                    <div class="form-group row mb-4">
                                                        <label for="taskbudget" class="col-form-label col-lg-2">Scheme Detail</label>
                                                        <div class="col-lg-10">
                                                            <div class="row pl-2 pr-3">
                                                            		<?php if($this->session->userdata('user_type') == 'admin'){ ?>
                                                                        <input type="hidden" id="entryId" />
                                                                        <input type="text" class="fromqtyText col form-control" placeholder="Enter From Quntity" />
                                                                        <input type="text" class="toqtyText col form-control ml-2" placeholder="Enter to Quntity" />
                                                                        <input type="text" class="giftText col form-control ml-2" placeholder="Enter Gift" />
                                                                        <input type="button" class="btn btn-primary addButton ml-2 mb-2" value="Add More"/>
                                                                    <?php } ?>
                                                                    <input type="button" class="btn btn-warning updateButton" style="display:none;" value="Update"/>
                                                            </div>
                                                            
                                                            <table class="table table-bordered text-center">
                                                                <thead>
                                                                    <tr class="bg-dark text-light text-center">
                                                                        <th>SNO.</th>
                                                                        <th>Sold Qty. in gm</th>
                                                                        <th>Gift</th>
                                                                        <?php if($this->session->userdata('user_type') == 'admin'){ ?>
                                                                        <th>Action</th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="billBody">
                                                                    
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row justify-content-end text-center">
                                            <div class="col-lg-10">
                                                <?php if(isset($schemeGiftDetail)){ ?>
                                                	<?php if($this->session->userdata('user_type') == 'admin'){ ?>
                                                    <button type="button" id="submit" class="btn btn-lg btn-warning">Update</button>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <button type="button" id="submit" class="btn btn-lg btn-success">Submit</button>
                                                <?php } ?>
                                                
                                            </div>
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
        var entries = <?php if(isset($schemeGiftDetail)){ echo json_encode($schemeGiftDetail); } else { echo '[]'; } ?>;
		console.log(entries);
        billEnteries();
        
        $(document).on('click','.addButton',function(){
            var x = {
                'from_qty': $('.fromqtyText').val(),
                'to_qty': $('.toqtyText').val(),
                'gift' : $('.giftText').val()
            }
            entries.push(x);
            $('.fromqtyText').val('');
            $('.toqtyText').val('');
            $('.giftText').val('');
            console.log(entries);
            billEnteries();

        });

        $(document).on('click','.remove',function(){
            const index = $(this).data('index');
            if(entries.length){
                entries.splice(index,1);
            } else {
                entries = [];
                console.log(entries);
            }
            billEnteries();
            //$(this).closest('tr').hide();
        });

        $(document).on('click','.editEntries',function(){
            const i = $(this).data('index');
            $('.fromqtyText').val(entries[i].from_qty),
            $('.toqtyText').val(entries[i].to_qty),
            $('.giftText').val(entries[i].gift),
            $('.addButton').hide();
            $('.updateButton').css('display','block');
            $('#entryId').val(i);
        });

    
        $(document).on('click','.updateButton',function(){
            const i = $('#entryId').val();
            entries[i]['from_qty'] = $('.fromqtyText').val();
            entries[i]['to_qty'] = $('.toqtyText').val();
            entries[i]['gift'] = $('.giftText').val();

            $('.fromqtyText').val('');
            $('.toqtyText').val('');
            $('.giftText').val('');
            $('.addButton').css('display','block');
            $('.updateButton').hide();
            billEnteries();
        });

        function billEnteries(){
            var x;
			<?php if($this->session->userdata('user_type') != 'admin'){ ?>
			    $.each(entries,function(key,value){
                    x = x + '<tr>'+
                    '<td>'+ (key + 1) +'</td>'+
                    '<td>'+ value.from_qty +'</td>'+
                    '<td>'+ value.gift +'</td>'+
                    '</tr>';
                });
			<?php } else { ?>
                $.each(entries,function(key,value){
                        x = x + '<tr>'+
                        '<td>'+ (key + 1) +'</td>'+
                        '<td>'+ value.from_qty +' - '+ value.to_qty +'</td>'+
                        '<td>'+ value.gift +'</td>'+
                        '<td>'+
                        '<a href="javascript:void(0);" data-index="'+ key +'" class="editEntries"><i class="bx bx-pencil"></i></a>'+
                        '<a href="javascript:void(0);" data-index="'+ key +'" class="remove"><i class="bx bx-trash"></i></a>'+
                        '</td>'+
                    '</tr>';
                });
            <?php } ?>
            if(x == undefined){
                x = '';
            } 
            $('#billBody').html(x);
        }


        $(document).on('click','#submit',function(){
            $.ajax({
                type: 'POST',
                url : $('#baseUrl').val() + '<?php if(isset($schemeGiftDetail)){ echo "Scheme/edit/" .$schemeDetail[0]['scheme_id']; } else { echo "Scheme/create"; } ?>',
                data : {
                    'state' : $('#state').val(),
					'crop' : $('#crop').val(),
                    'heading' : $('#heading').val(),
                    'subheading' : $('#subheading').val(),
					'instruction' : CKEDITOR.instances.instruction.getData(),
					'from_date' : $('#from_date').val(),
					'to_date' : $('#to_date').val(),
                    'entries' : entries,
                },
                dataType : 'json',
                
                success: function(response){
                    if(response.status == 200){
                        alert(response.msg);
                        window.location.replace($('#baseUrl').val()+'scheme');
                    }
                    else {
                        alert(response.msg);
                    }
                },
                cache: false,
            });
        });
		
		$(document).on('change','#crop',function(){
			var selectedCropId = $(this).val();
			$.ajax({
                type: 'GET',
                url : $('#baseUrl').val() + 'Scheme/cropVariety/' + selectedCropId,
                dataType : 'json',
                
                success: function(response){
                    console.log(response);
					if(response.status == 200){
						var x;
						$.each(response.data,function(key,value){
							x = x + '<option value="'+ value.ProductId +'">'+ value.ProductName +'</option>';
						});
						
						$('#variety').html(x);
					}
                },
                cache: false,
            });
		});
    });
</script>