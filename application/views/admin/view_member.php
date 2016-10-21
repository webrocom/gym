<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="ajaxResponse"><input type="hidden" name="ajaxResponse"></div>
            <div class="row" style="padding: 0px 5px;">
                <div class="col-md-10 col-md-offset-1 familycol bg-primary">
                    <h4 class="text-center">My Gym member information</h4>

                    <hr/>
                    <div class="row">
                        <div class="col-md-4"><label>Member ID</label></div>
                        <div class="col-md-8"><label><?php echo 'A'. strtoupper($row->member_id)?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Name:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->fname).' '.strtoupper($row->mname).' '.strtoupper($row->lname)?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Gender:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper ($row->gender =='M')?'MALE':'FEMALE'?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Address:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->address)?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Residential area:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->area)?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Mobile:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->telephone)?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Mobile 2:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->telephone2)?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Gym Plan:</label></div>
                        <div class="col-md-8"><label id="gp"></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Plan Package:</label></div>
                        <div class="col-md-8"><label id="pp"></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Date of joining:</label></div>
                        <div class="col-md-8"><label><?php echo  date('F jS Y', strtotime($row->start_date) ) ; ?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Expire date:</label></div>
                        <div class="col-md-8"><label><?php echo (date('F jS Y', strtotime($row->expire_date))=='January 1st 1970' )? 'None':date('F jS Y', strtotime($row->expire_date))?></label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Paid amount:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->paid)?>/-</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Unpaid amount:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->unpaid)?>/-</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Next installment date:</label></div>
                        <div class="col-md-8"><label><?php echo  (date('F jS Y', strtotime($row->next_installment))=='January 1st 1970' )? 'None':date('F jS Y', strtotime($row->next_installment))?></label></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4"><label>Plan Description:</label></div>
                        <div class="col-md-8"><label><?php echo strtoupper($row->desc)?></label></div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function (){
        $.ajax({
            url:'<?php echo base_url()?>'+'admin/viewPlan',
            type:'GET',
            data:'id='+<?php echo $row->package_type ;?>
        }).done(function (html){
            $('#gp').html(html);
            
        });
        
        $.ajax({
            url:'<?php echo base_url()?>'+'admin/viewPeriod',
            type:'GET',
            data:'id='+<?php echo $row->package_period ;?>
        }).done(function (html){
            $('#pp').html(html);
            
        });
        
    });
</script>


<?php
$this->load->view('admin/footer');
