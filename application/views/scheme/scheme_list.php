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
            <div class="text-right">
            	<?php if($this->session->userdata('user_type') == 'admin'){ ?>
                	<a href="<?= base_url('scheme/create'); ?>" class="btn btn-info" id="create-scheme">Create new Scheme </a>
                <?php } ?>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive text-center">
                <thead>
                <tr class="bg-dark text-light">
                    <th>Sno.</th>
                    <th>State</th>
					<th>Crop</th>
					<th>From Date</th>
					<th>To Date</th>
                    <th>Scheme Title</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
                    <?php $c =1; foreach($schemeList as $scheme){ ?>
                        <tr>
                            <td><?= $c++; ?></td>
                            <td><?= $scheme['state_name']; ?></td>
							<td><?= $scheme['CropName']; ?></td>
							<td><?= date('d/m/Y',strtotime($scheme['from_date']));?></td>
							<td><?= date('d/m/Y',strtotime($scheme['to_date'])); ?></td>
                            <td><?= $scheme['heading']; ?></td>
                            <td>
                                <a href="<?php echo base_url('scheme/edit/').$scheme['scheme_id'];?>"<i class="bx bx-pencil"></i>
                                <?php if($this->session->userdata('user_type') == 'admin'){ ?>
                                	<a href="javascript:void(0);" class="delete-scheme" data-schemeId="<?= $scheme['scheme_id']; ?>"><i class="bx bx-trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>

            </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<script>
  $(document).ready(function(){
    $(document).on('click','.delete-scheme',function(){
      const schemeId = $(this).data('schemeid');
      var ans = confirm('Are you sure?');
      if(ans){
        $.ajax({
            type: 'POST',
            url : $('#baseUrl').val() + 'Scheme/delete',
            data : {
                'schemeId' : schemeId
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
      }
    });
  });
</script>