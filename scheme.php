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
                                                        <label for="taskname" class="col-form-label col-lg-2">Select state</label>
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
                                                        <label for="taskname" class="col-form-label col-lg-2">Headling</label>
                                                        <div class="col-lg-10">
                                                            <input id="heading" name="heading" type="text" class="form-control" placeholder="Heading"
                                                            value = "<?php if(isset($schemeDetail)){
                                                                            echo $schemeDetail[0]['heading'];
                                                                        } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">Sub-Headling</label>
                                                        <div class="col-lg-10">
                                                            <input id="subheading" name="subheading" type="text" class="form-control" placeholder="Sub Heading"
                                                            value = "<?php if(isset($schemeDetail)){
                                                                            echo $schemeDetail[0]['subheading'];
                                                                    } ?>">
                                                        </div>
                                                    </div>
													<div class="form-group row mb-4">
                                                        <label for="taskname" class="col-form-label col-lg-2">Term & Condition </label>
                                                        <div class="col-lg-10">
                                                            <textarea name="instruction" id="instruction">
																	<?php if(isset($schemeDetail)){
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
                                                                        <input type="text" class="qtyText col form-control" placeholder="Enter Quntity" />
                                                                        <input type="text" class="giftText col form-control" placeholder="Enter Gift" />
                                                                        <input type="button" class="btn btn-primary addButton" value="Add More"/>
                                                                    <?php } ?>
                                                                    <input type="button" class="btn btn-warning updateButton" style="display:none;" value="Update"/>
                                                            </div>
                                                            
                                                            <table class="table table-bordered text-center">
                                                                <thead>
                                                                    <tr class="bg-dark text-light text-center">
                                                                        <th>SNO.</th>
                                                                        <th>Sold Qty. in Kg</th>
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
                'qty': $('.qtyText').val(),
                'gift' : $('.giftText').val()
            }
            entries.push(x);
            $('.qtyText').val('');
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
            $('.qtyText').val(entries[i].qty),
            $('.giftText').val(entries[i].gift),
            $('.addButton').hide();
            $('.updateButton').css('display','block');
            $('#entryId').val(i);
        });

    
        $(document).on('click','.updateButton',function(){
            const i = $('#entryId').val();
            entries[i]['qty'] = $('.qtyText').val();
            entries[i]['gift'] = $('.giftText').val();

            $('.qtyText').val('');
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
                    '<td>'+ value.qty +'</td>'+
                    '<td>'+ value.gift +'</td>'+
                    '</tr>';
                });
			<?php } else { ?>
                $.each(entries,function(key,value){
                        x = x + '<tr>'+
                        '<td>'+ (key + 1) +'</td>'+
                        '<td>'+ value.qty +'</td>'+
                        '<td>'+ value.gift +'</td>'+
                        '<td>'+
                        '<input data-index="'+ key +'" type="button" class="editEntries" value="Edit"/>'+
                            '<input data-index="'+ key +'" type="button" class="remove" value="Remove"/>'+
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
                    'heading' : $('#heading').val(),
                    'subheading' : $('#subheading').val(),
					'instruction' : CKEDITOR.instances.instruction.getData(),
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
    });
</script>