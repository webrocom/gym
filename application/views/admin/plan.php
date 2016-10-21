<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="ajaxResponse"><input type="hidden" name="ajaxResponse"></div>
            <div class="row" style="padding: 0px 5px;">
                <div class="col-md-8 col-md-offset-1">
                    <h3>Manage your gym plans here!</h3>
                    <div id="ajaxresponse"></div>
                    <form id="frm_plan_create" class="form" action="<?php echo base_url()?>admin/planCreate" method="POST">
                        <legend class="text-info">Add new plan</legend>
                        <label class="required">Plan name</label>
                        <input type="text" name="name" class="form-control">
                        <label class="required">Plan code</label>
                        <input type="text" name="code" class="form-control">
                        <input type="submit" class="btn btn-success " value="Add"/>
                    </form>
                </div>
                
                <div class="col-md-8 col-md-offset-1" style="max-height: 250px; overflow: auto">
                    <h3 class="text-info">Plans List </h3>
                    <div class="table-responsive">
                        <table class=" table table-hover" style="width: 100%">
                        <thead>
                            <tr><th>S.No.</th><th>Plan Code</th><th>Plan Name</th><th colspan="2">Action</th></tr>
                        </thead>
                        <tbody id="ajaxlistplan">
                            
                        </tbody>
                    </table>
                        </div>
            </div>
        </div>
    </div>

</div>
    <!--edit modal-->
    <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Edit Plan</h3>
        <div id="updateajaxresponse"></div>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitEditModal">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>
       
    $(document).ready(function (){
//        call plan list method for populate table
        planList();
        
//        plan craete form submit code
    $('#frm_plan_create').submit(function (e) {
        e.preventDefault();
        var self = $(this);
        var type = self.attr('method');
        var url = self.attr('action');
        var data = self.serialize();
        $.ajax({
            url: url,
            type: type,
            data: data
        }).done(function (html) {
            $('#ajaxresponse').html(html);
            $('#frm_plan_create')[0].reset();
            planList();
        });
    });
    
    
//        submit update modal
    
    $('#submitEditModal').on('click',function (e){
        e.preventDefault();
        $.ajax({
            url:$("#frm_plan_update").attr('action'),
            type:$("#frm_plan_update").attr('method'),
            data:$("#frm_plan_update").serialize()
        }).done(function (html){
            $('#updateajaxresponse').html(html);
            planList();
        });
    });
    
    
    });
     var planList = function (){
         $.ajax({
               url:'<?php echo base_url()?>admin/planList',
               type:'GET'
            }).done(function (html){
                $('#ajaxlistplan').html(html);
                var btnedit= $('.btnedit');
                var btndelete= $('.btndelete');
                
                //    open edit  modal as external edit page code
                btnedit.on('click', function (e){
                    e.preventDefault();
                    $.ajax({
                        url:$(this).attr('data-url'),
                        type:'GET',
                        data:'id='+$(this).attr('data-id')
                    }).done(function (html){
                        $('.modal-body').html(html);
                    });
                });
                
//                delete plan entry
                btndelete.on('click', function (e){
                    e.preventDefault();
                    $.ajax({
                        url:$(this).attr('data-url'),
                        type:'GET',
                        data:'id='+$(this).attr('data-id')
                    }).done(function (html){
                        $('#ajaxresponse').html(html);
                        planList();
                    });
                });
                
            });
    };
    
    
</script>


<?php
$this->load->view('admin/footer');
