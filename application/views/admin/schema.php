<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="ajaxResponse"><input type="hidden" name="ajaxResponse"></div>
            <div class="row" style="padding: 0px 5px;">
                <div class="col-md-10 ">
                    <h1 class="text-center">Welcome to admin section !</h1>
                    <h3 class="text-center">Here you can manage your gym plans and sub admin also</h3>
                    <hr>
                </div>
                
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 text-center hoversch">
                            <a href="<?php echo base_url()?>plan">
                                <i class="glyphicon glyphicon-leaf"></i>
                                <h2>Plans</h2>
                            </a>
                        </div>
                        <div class="col-md-3 text-center hoversch">
                            <a href="<?php echo base_url()?>tariff">
                                <i class="glyphicon glyphicon-fire"></i>
                                <h2>Plans Tariff</h2>
                            </a>
                        </div>
                        <div class="col-md-3 text-center hoversch">
                            <a href="<?php echo base_url()?>subadmin">
                                <i class="glyphicon glyphicon-user"></i>
                                <h2>Sub Admin</h2>
                            </a>
                        </div>
                        <div class="col-md-3 text-center hoversch">
                            <a href="<?php echo base_url()?>backup">
                                <i class="glyphicon glyphicon-compressed"></i>
                                <h2>Backup</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php
$this->load->view('admin/footer');
