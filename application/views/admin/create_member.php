<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="ajaxResponse"><input type="hidden" name="ajaxResponse"></div>
            <div class="row" style="padding: 0px 5px;">
                <div class="col-md-6">
                    <div class="thumbnail  familycol">
                        <form id="frm_create_member" action="<?php echo base_url()?>admin/memberCreate" method="post" class="form">   <legend>Personal Information</legend>
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <label class="required">First name</label>
                                    <input type="text" name="firstname" value="" class="form-control input-sm" placeholder="First Name"  />
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <label class="required">Middle name</label>
                                    <input type="text" name="middlename" value="" class="form-control input-sm" placeholder="Middle Name"  />
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <label class="required">Last name</label>
                                    <input type="text" name="lastname" value="" class="form-control input-sm" placeholder="Last Name"  />
                                </div>
                            </div>
                            <label>Gender : </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="M" id=male />                        
                                Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="F" id=female />                        
                                Female
                            </label>
                            <br>
                            <label>Address</label>
                            <textarea class="form-control input-sm" name="address" rows="3" placeholder="Address"></textarea>
                            <label class="required">Area/Town/City</label>
                            <input type="text" name="area" value="" class="form-control input-sm"/>
                            <label class="required">Telephone</label>
                            <input type="text" name="telephone" value="" class="form-control input-sm"/>
                            <label>Telephone 2</label>
                            <input type="text" name="telephone2" value="" class="form-control input-sm"/>
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
                            <div class="row"><div class="col-md-12" id="ajaxnotes"></div></div>
                            <input type="hidden" name="desc" id="desc" />
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label class="required">Start date:</label>
                                    <input type="text" name="start_date" class="form-control input-sm datepicker"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="required">Expire date</label>
                                    <input type="text" name="end_date" class="form-control input-sm datepicker"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label style="display: block; border-bottom: 1px solid #ddd;">Fees:</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="required">Paid amount</label>
                                    <input type="text" name="paid" class="form-control input-sm"/>
                                </div>
                                <div class="col-md-6">
                                    <label>Unpaid amount</label>
                                    <input type="text" name="unpaid" class="form-control input-sm"/>
                                </div>
                                <div class="col-md-12">
                                    <label>Next installment alert</label>
                                    <input type="text" name="instalmentdate" class="form-control input-sm datepicker"/>
                                </div>
                            </div>
                             
                            <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy.</span>
                            <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                                Create my account</button>
                         </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    $('#frm_create_member').submit(function (e) {
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
            $('#frm_create_member')[0].reset();
            
        });
    });
    $(document).ready(function (){
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $.ajax({
            url:'<?php echo base_url()?>'+'admin/selectPlan',
            type:'GET'
        }).done(function (html){
            $('#plan').html(html);
        });
        
        $("#plan").on('change', function (e){
            e.preventDefault();
            $.ajax({
            url:'<?php echo base_url()?>'+'ajax_admin/autoloadPeriod',
            type:'GET',
            data:'id='+$(this).val()
        }).done(function (html){
            $('#tariff').html(html);
        });
        
        $("#tariff").on('change', function (e){
            e.preventDefault();
            $.ajax({
            url:'<?php echo base_url()?>'+'ajax_admin/loadnotes',
            type:'GET',
            data:'id='+$(this).val()
        }).done(function (html){
            $('#ajaxnotes').html(html);
            $('#desc').val($("#ajaxnotes").text());
        });
        });
         });
    });
    
</script>
<?php
$this->load->view('admin/footer');
