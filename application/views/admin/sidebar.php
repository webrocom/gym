<!-- PRICE ITEM -->
<a href="<?php echo base_url()?>memberList" class="btn btn-default hover">
    <div class="panel-body text-center">
        <p class="lead" style="font-size:40px"><strong><i class="glyphicon glyphicon-list-alt"></i></strong></p>
    </div>
    <span class=""><i class="icon-ok text-danger"></i> List All Member</span>
</a>
<!-- /PRICE ITEM -->

<!-- PRICE ITEM -->
<?php $role =  $this->session->userdata('role');  if($role == 'admin'): ?>
<a href="<?php echo base_url() ?>register" class="btn btn-default hover">
    <div class="panel-body text-center">
        <p class="lead" style="font-size:40px"><strong><i class="glyphicon glyphicon-upload"></i></strong></p>
    </div>
    <span class=""><i class="icon-ok text-danger"></i>Register new member</span>
</a>
<?php endif; ?>
<!-- /PRICE ITEM -->

<!-- PRICE ITEM -->
<a class="btn btn-default hover" href="<?php echo base_url()?>alert">
    <div class="panel-body text-center">
        <p class="lead" style="font-size:40px"><strong><i class="glyphicon glyphicon-warning-sign"></i></strong></p>
    </div>
    <span class=""><i class="icon-ok text-danger"></i> Member Alert</span>
</a>
<!-- /PRICE ITEM -->

<!-- PRICE ITEM -->
<?php $role =  $this->session->userdata('role');  if($role == 'admin'): ?>
<a href="<?php echo base_url()?>schema" class="btn btn-default hover">
    <div class="panel-body text-center">
        <p class="lead" style="font-size:40px"><strong><i class="glyphicon glyphicon-wrench"></i></strong></p>
    </div>
    <span class=""><i class="icon-ok text-danger"></i>Admin Setting</span>
</a>
<?php endif; ?>
<!-- /PRICE ITEM -->