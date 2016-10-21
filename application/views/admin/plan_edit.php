<form id="frm_plan_update" class="form" action="<?php echo base_url() ?>admin/planUpdate" method="POST">
    <?php foreach ($data->result() as $row): ?>
    <label class="required">Plan name</label>
    <input type="text" id="nameupdate" name="name" class="form-control" value="<?php echo $row->name?>">
    <label class="required">Plan code</label>
    <input type="text" name="code" class="form-control">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <?php endforeach; ?>
</form>

<?php exit;