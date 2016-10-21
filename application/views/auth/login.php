<?php $this->load->view('header') ?>
<div class="container" style="margin-top: 10%">
    <div class="row clear_fix">
        <div class="col-md-4 col-md-offset-4"style="position: relative">
            <p class="alert alert-danger text-center  login-form" id="response"><b>INVALID USER NAME OR PASSWORD</b></p>
        </div>
    </div>
    <br>
    
            <div class="row clear_fix">
                <div class="col-md-4 col-md-offset-4 login-form"  style="position: relative">
                    <style>
                        #response{display: none}
                    </style>
                    <form id="frm_login" role="form" action="<?php echo base_url() ?>auth/login" method="POST">
                        <div class="form-group">
                          <label for="">User name</label>
                          <input type="text" class="form-control" name="username"  placeholder="User name">
                        </div>
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" class="form-control" name="password"  placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-info btn-block" value="Login">
                      </form>
                    <a href="<?php echo base_url()?>forgetPass" class="btn btn-block">Forget password</a>                    
                </div>
            </div>
        </div>

<div class="container-fluid navbar-fixed-bottom text-center text-info">Software designed by &nbsp;&nbsp;<a style="font-size: 12px;" href="http://webrocom.net" target="_blank">WEBRO-COM IT Solution</div>
        <script>
        $(document).ready(function (){
            document.cookie = "login = false";
            $("#frm_login").submit(function (e){
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                $.ajax({
                   url:url,
                   type:method,
                   data:data
                }).done(function(data){
                   if(data =='false')
                    {
                        $("#response").slideDown('fast');
                        $('#frm_login')[0].reset();
                        setTimeout(function (){
                            $("#response").slideUp('fast');
                        },3000);
                    }
                    else if(data =='true')
                    {
                    document.cookie = "login = true";
                    window.location.href='<?php echo base_url() ?>admin/';
                    throw new Error('go');
                    } 
                });
            });
        });
        </script>

<?php $this->load->view('footer');
