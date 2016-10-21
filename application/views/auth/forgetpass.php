<?php $this->load->view('header') ?>
<div class="container" style="margin-top: 10%">
    <div class="row clear_fix">
        <div class="col-md-6 col-md-offset-3"  style="position: relative">
            <p class="alert alert-danger  login-form text-center" id="response"><b>This Email address is not registered with us.</b></p>
        </div>
    </div>
            <div class="row clear_fix">
                <div class="col-md-6 col-md-offset-3 login-form"  style="position: relative">
                    <style>
                        #response{display: none}
                    </style>
                    
                    <form id="frm_forget" role="form" action="<?php echo base_url() ?>auth/forgetpass" method="POST">
                        <div class="form-group">
                          <label for="">Enter your registered email address!</label>
                          <input type="text" id="useremail" class="form-control" name="email"  placeholder="Email">
                        </div>
                        <button class="btn btn-info btn-block">Reset</button>
                      </form>
                    <a href="<?php echo base_url()?>auth" class="btn btn-block">login</a>                    
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function (){
            $("#frm_forget").submit(function (e){
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   data:data
                }).done(function(data){
                    console.log(data);
                   if(data =='false')
                    {
                        $("#response").slideDown('fast');
                        $('#frm_forget')[0].reset();
                        setTimeout(function (){
                            $("#response").slideUp('fast');
                        },3000);
                    }
                    else if(data == 'true')
                    {
                    window.location.href='<?php echo base_url() ?>resettrue/'+$('#useremail').val();
                    throw new Error('go');
                    } 
                });
            });
        });
        </script>

<?php $this->load->view('footer');
