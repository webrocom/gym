<?php $this->load->view('header') ?>
<div class="container" style="margin-top: 10%">
    <div class="row clear_fix">
        <div class="col-md-6 col-md-offset-3"  style="position: relative">
            <p class="alert alert-danger  login-form text-center" id="response"><b>Your new password has been set.</b></p>
        </div>
    </div>
            <div class="row clear_fix">
                <div class="col-md-6 col-md-offset-3 login-form"  style="position: relative">
                    <style>
                        #response{display: none}
                    </style>
                    
                    <form id="frm_reset" role="form" action="<?php echo base_url() ?>auth/resetProcess" method="POST">
                        <div class="form-group">
                          <label for="">You are going to set new password for email id:</label>
                          <label class="text-success"><b><?php echo $email?></b></label>
                          <hr/>
                          <label>New Password</label>
                          <input type="password" id="pass" class="form-control" name="pass"  placeholder="">
                          <label>Confirm Password</label>
                          <input type="password" id="cpass" class="form-control" name="cpass"  placeholder="">
                        </div>
                        <input type="hidden" value="<?php echo $email?>" name="hiddenid"/>
                        <button class="btn btn-info btn-block">Update</button>
                      </form>
                    <a href="<?php echo base_url()?>auth" class="btn btn-block">login</a>                    
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function (){
            $("#frm_reset").submit(function (e){
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   data:data
                }).done(function(data){
                        $("#response").text(data);
                        $("#response").slideDown('fast');
                        $('#frm_reset')[0].reset();
                        setTimeout(function (){
                            $("#response").slideUp('fast');
                        },3000);
                    });
                     
                });
            });
        
        </script>

<?php $this->load->view('footer');
