<?php $this->load->view('admin/header'); ?>
<style type="text/css">
        ul>li, a{cursor: pointer;}
</style>
<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10 col-xs-10">
            <h1 class="text-center text-uppercase text-danger">Alert</h1>
            
            <div class="">

                <div class="tab-pane active" id="tab_default_1">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div class="row">
                                
                                
                                <div class="col-md-12">
                                    <div class="thumbnail">
                                        <div class="alert alert-warning">Are you sure to delete this member?</div>
                                        
                                        <a class="btn btn-sm btn-success" href="<?php echo base_url()?>memberdelete/<?php echo $this->uri->segment(2)?>" style="width: 100px; margin-right: 15px">YES</a><a class="btn btn-sm btn-danger" href="<?php echo base_url()?>memberList" style="width: 100px; margin-right: 15px">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('admin/footer');
