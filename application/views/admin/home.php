<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
 <?php $this->load->view('admin/sidebar'); ?>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10">
                    <h1 class="text-center text-uppercase">Welcome to my gym portal.</h1>
                    <div class="text-center" >
                    <img src="<?php echo base_url() ?>asset/images/gym.png" alt="GYM"/>
                    </div>
                </div>
    
            </div>
        </div>
<script>
    console.log(window.login);
</script>

<?php $this->load->view('admin/footer'); 
