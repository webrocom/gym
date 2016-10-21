<form id="frm_user_update" class="form" action="<?php echo base_url() ?>admin/userUpdate" method="POST">
    <?php foreach ($data->result() as $row): ?>
    <div class="row clearfix">

                            <div class="col-md-4">

                                <label class="required">User Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row->uname?>">
                                <label class="required">Email ID</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $row->email?>">
                            </div>
                            <div class="col-md-4">
                                <label class="required">Password</label>
                                <input type="text" name="password" class="form-control" value="<?php echo base64_decode($row->password) ?>">
                                
                                <label class="required">Status</label>
                                <div class="genderblock">
                                    <span style="width:80px;"><input type="radio" name="status" checked="checked" value="<?php echo $row->status ;?>" id=male><lable><?php echo $cg =  ($row->status == 0)? 'Deactive' :'Active' ;?></lable></span>
                                    <span style="width:80px;"><input type="radio" name="status" value="<?php  echo  ($cg == 0) ? 'Active':'Deactive';?>" id=female /><lable><?php echo $g =  ($row->status == 0)? 'Active' :'Deactive' ;?></lable></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="required">Role</label>
                                <select id="role" name="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="regular">Regular</option>
                                </select>
                            </div>
                        </div>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <?php endforeach; ?>
</form>
<script>
$("#role").val('<?php echo $row->role ?>');
</script>
<?php exit;

