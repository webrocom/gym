<form id="frm_plan_update" class="form" action="<?php echo base_url() ?>admin/tariffUpdate" method="POST">
    <?php foreach ($data->result() as $row): ?>
    <input type="hidden" id="defaultplan" value="<?php echo $row->plan_id?>"/>
        <div class="row">
            <div class="col-md-6">
                <label class="required">Select plan</label>
                <select name="plan" id="selectedplan" class="form-control">
                    <option value=""></option>
                </select>
                <label class="required">Duration</label>
                <input type="text" name="duration" class="form-control" value="<?php echo $row->duration?>">
            </div>
            <div class="col-md-6">
                <label class="required">Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $row->price?>">
                <label>Offer</label>
                <input type="text" name="offer" class="form-control" value="<?php echo $row->offer?>">
            </div>
        </div>
        <label class="required">Notes</label>
        <textarea name="note" class="form-control" rows="2"><?php echo $row->notes?></textarea>
        <input type="hidden" name="id" value="<?php echo $id ?>">
    <?php endforeach; ?>
</form>

<script>
$.ajax({
    url:'<?php echo base_url()?>'+'admin/selectPlan',
    type:'GET'
}).done(function (html){
        $('#selectedplan').html(html);
        
        $('#selectedplan').val($("#defaultplan").val());
});
</script>

<?php
exit;
