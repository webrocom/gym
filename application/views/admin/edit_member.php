<?php $this->load->view('admin/header'); ?>

<div class="container" id='main-layout' style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="ajaxResponse"><input type="hidden" name="ajaxResponse"></div>
            <div class="row" style="padding: 0px 5px;">
                <?php $id = $this->uri->segment(2); if(!empty($id)): ?>
                <div class="col-md-6">
                    <div class="thumbnail  familycol">
                        <form id="frm_update_member" action="<?php echo base_url()?>admin/memberUpdate" method="post" class="form">   <legend>Personal Information</legend>
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <label class="required">First name</label>
                                    <input type="text" name="firstname" value="<?php echo $row->fname?>" class="form-control input-sm" placeholder="First Name"  />
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <label class="required">Middle name</label>
                                    <input type="text" name="middlename" value="<?php echo $row->mname?>" class="form-control input-sm" placeholder="Middle Name"  />
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <label class="required">Last name</label>
                                    <input type="text" name="lastname" value="<?php echo $row->lname?>" class="form-control input-sm" placeholder="Last Name"  />
                                </div>
                                
                            </div>
                            <label>Gender : </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" checked="checked" value="<?php echo $row->gender ;?>" id=male />                        
                                <?php echo $cg =  ($row->gender == 'M')? 'Male' :'Female' ;?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="<?php  echo  ($cg == 'Male') ? 'F':'M';?>" id=female />                        
                                <?php echo $g =  ($row->gender == 'M')? 'Female' :'Male' ;?>
                            </label>
                            <br>
                            <label>Address</label>
                            <textarea class="form-control input-sm" name="address" rows="3" placeholder="Address"><?php echo $row->address ;?></textarea>
                            <label class="required">Area/Town/City</label>
                            <input type="text" name="area" value="<?php echo $row->area ;?>" class="form-control input-sm"/>
                            <label class="required">Telephone</label>
                            <input type="text" name="telephone" value="<?php echo $row->telephone ;?>" class="form-control input-sm"/>
                            <label>Telephone 2</label>
                            <input type="text" name="telephone2" value="<?php echo $row->telephone2 ?>" class="form-control input-sm"/>
                            <br/>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="thumbnail  familycol">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <label class="required">Select package type</label>
                                    <select name="plan" id="plan" class = "form-control input-sm">
                                    </select> 
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <label class="required">Select Period</label>
                                    <select name="tariff" id="tariff" class = "form-control input-sm">
                                    </select> 
                                </div>
                            </div>
                        <div class="row" style="padding-top: 4px;"><div class="col-md-12" id="ajaxnotes"></div></div>
                            <input type="hidden" name="desc" id="desc" />
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label class="required">Start date:</label>
                                    <input type="text" value="<?php echo $row->start_date ;?>" name="start_date" class="form-control input-sm datepicker"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="required">Expire date</label>
                                    <input type="text" value="<?php echo $row->expire_date ;?>" name="end_date" class="form-control input-sm datepicker"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label style="display: block; border-bottom: 1px solid #ddd;">Fees:</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="required">Paid amount</label>
                                    <input type="text" value="<?php echo $row->paid ;?>" name="paid" class="form-control input-sm"/>
                                </div>
                                <div class="col-md-6">
                                    <label>Unpaid amount</label>
                                    <input type="text" value="<?php echo $row->unpaid ;?>" name="unpaid" class="form-control input-sm"/>
                                </div>
                                <div class="col-md-12">
                                    <label>Next installment alert</label>
                                    <input type="text" name="instalmentdate" value="<?php echo $row->next_installment ;?>" class="form-control input-sm datepicker"/>
                                </div>
                                <div class="col-md-12">
                                    <label>Membership status</label><br>
                                    <input type="text" name="expired" class="form-control expired" value="<?php echo $row->expired ?>" style="display: none">
                                    <a href="#" id="setstatus" data-status="<?php echo $row->expired ?>" class="btn btn-sm <?php echo $status = ($row->expired == 0) ? 'btn-success' : 'btn-danger'?>"><?php echo $status = ($row->expired == 0) ? 'ON' : 'OFF'?></a>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id?>"/>
                            <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" style="margin-top: 5px;">
                                Update my plan</button>
                         </form> 
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    $('#frm_update_member').submit(function (e) {
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
            $('.ajaxResponse').html(html);
        });
    });
    

    $(document).ready(function (){
        $("#main-layout").on('change', '#tariff', function(e){
                $.ajax({
                        url:'<?php echo base_url()?>'+'ajax_admin/loadnotes',
                        type:'GET',
                        data:'id='+$(this).val()
                }).done(function (html){
                        $('#ajaxnotes').html(html);
                        $('#desc').val($("#ajaxnotes").text());
                });
            });
        
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $.ajax({
            url:'<?php echo base_url()?>'+'admin/selectPlan',
            type:'GET'
        }).done(function (html){
            $('#plan').html(html);
            $('#plan').val(<?php echo $row->package_type ?>);
        });
        
        $.ajax({
            url:'<?php echo base_url()?>'+'ajax_admin/loadPeriod',
            type:'GET',
            data:'id='+<?php echo $row->package_type ;?>
        }).done(function (html){
            $('#tariff').html(html);
            $('#tariff').val(<?php echo $row->package_period; ?>);
        });
        
        $('#ajaxnotes').html('<p class="alert alert-info">'+'<?php echo $row->desc ?>'+'</p>');
        $('#desc').val($("#ajaxnotes").text());
        
        $("#plan").on('change', function (e){
            e.preventDefault();
            $.ajax({
            url:'<?php echo base_url()?>'+'ajax_admin/autoloadPeriod',
            type:'GET',
            data:'id='+$(this).val()
        }).done(function (html){
            $('#tariff').html(html);
        });
    });
    
    $('#setstatus').on('click', function (e){
    e.preventDefault();
    if($(this).hasClass('btn-danger')){
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).text('ON');
        $(this).attr('data-status',0);
        
    }
    else{
        $(this).addClass('btn-danger');
        $(this).text('OFF');
        $(this).attr('data-status',1);
    }
    var val = $(this).attr('data-status');
    console.log($(".expired"));
    $(".expired").val(val);
    });
    });
    
</script>
<?php
$this->load->view('admin/footer');
