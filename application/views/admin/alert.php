<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10 col-xs-10">
            <h1 class="text-center text-uppercase">Alert dashbord</h1>
            <hr/>
            <div class="row">
                <div class="col-xs-3"> <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left"><!-- 'tabs-right' for right tabs -->
                        <li class="active ed"><a href="#ED" data-toggle="tab">Expire Date</a></li>
                        <li class="di"><a href="#DI" data-toggle="tab">Due Installment</a></li>
                        <li class="em"><a href="#EM" data-toggle="tab">Expired Membership</a></li>
                    </ul>
                </div>
                <div class="col-xs-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="ED">
                            
                            <table class="table table-hover">
                                <thead><tr><th>Name</th><th>Remaining Days</th><th>Expire date</th><th>Action</th></tr></thead>
                                <tbody id="exp_res"></tbody>
                                <tfoot></tfoot>
                            </table>
                            
                        </div>
                        <div class="tab-pane" id="DI">
                            <table class="table table-hover">
                                <thead><tr><th>Name</th><th>Remaining Days</th><th>Installment date</th><th>Action</th></tr></thead>
                                <tbody id="ins_res"></tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                        
                        <div class="tab-pane" id="EM">
                            <table class="table table-hover">
                                <thead><tr><th>Member Id</th><th>Name</th><th>Expire date</th></tr></thead>
                                <tbody id="memexp_res"></tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    
    var ED = function (){
    $.ajax({
        type:'GET',
        url:'<?php echo base_url()?>admin/alertExpire'
    }).done(function (data){
        $("#exp_res").html(data);
        $.each($("#exp_res tr"), function (i , val){
           var val = parseInt($("#exp_res tr td").eq(1).text());
           if(isNaN(val)){
               $("#exp_res tr").addClass('bg-danger');
           }
           else if(val >=0){
               $("#exp_res tr").addClass('bg-danger');
           }
           
        });
    });
    };
    
    var EM = function (){
    
    $.ajax({
        type:'GET',
        url:'<?php echo base_url()?>admin/alertCompleteExpire'
    }).done(function (data){
        $("#memexp_res").html(data);
//        $.each($("#exp_res tr"), function (i , val){
//           var val = parseInt($("#exp_res tr td").eq(1).text());
//           if(isNaN(val)){
//               $("#exp_res tr").addClass('bg-danger');
//           }
//           else if(val >=0){
//               $("#exp_res tr").addClass('bg-danger');
//           }
//           
//        });
    });
        
    };
    
    var DI = function (){
        $.ajax({
        type:'GET',
        url:'<?php echo base_url()?>admin/alertInstallment'
    }).done(function (data){
        $("#ins_res").html(data);
        $.each($("#ins_res tr"), function (i , val){
           var val = parseInt($("#ins_res tr td").eq(1).text());
           if(isNaN(val)){
               $("#ins_res tr").addClass('bg-danger');
           }
           else if(val >=0 || val == -1){
               $("#ins_res tr").addClass('bg-danger');
           }
        });
    });
    };
    
    
    
    $(document).ready(function (){
        ED();
        
        $(".ed").on('click', function (){
           ED();
        });
        
        $(".di").on('click', function (){
           DI();
        });
        
        $(".em").on('click', function (){
           EM();
        });
    });
</script>
<?php
$this->load->view('admin/footer');
