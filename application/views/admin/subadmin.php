<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5f5">
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <?php $this->load->view('admin/sidebar'); ?>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="ajaxResponse"><input type="hidden" name="ajaxResponse"></div>
            <div class="row" style="padding: 0px 5px;">
                <div class="col-md-12">
                    <h3>Manage your gym's sub Users here!</h3>
                    <div id="ajaxresponse"></div>
                    <form id="frm_admin_create" class="form" action="<?php echo base_url() ?>admin/adminCreate" method="POST">
                        <legend class="text-info">Add new user</legend>
                        <div class="row clearfix">

                            <div class="col-md-4">

                                <label class="required">User Name</label>
                                <input type="text" name="name" class="form-control">
                                <label class="required">Email ID</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="required">Password</label>
                                <input type="text" name="password" class="form-control">

                                <label class="required">Confirm Password</label>
                                <input type="text" name="cpassword" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="required">Role</label>
                                <select name="role" class="form-control">
                                    <option value="">Select</option>
                                    <option value="admin">Admin</option>
                                    <option value="regular">Regular</option>
                                </select>

                                <label class="required">Status</label>
                                <div class="genderblock">
                                    <span><input type="radio" class="form-control" value="1" name="status"><lable>Active:</lable></span>
                                    <span><input type="radio" class="form-control" value="0" checked="checked" name="status"><lable>Deactive:</lable></span>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success " value="Add"/>
                    </form>
                </div>

                <div class="col-md-12" style="max-height: 250px; overflow: auto">
                    <h3 class="text-info">Plans List </h3>
                    <div class="table-responsive">
                        <table class=" table table-hover" style="width: 100%">
                            <thead>
                                <tr><th>S.No.</th><th>User name</th><th>Email Address</th><th>Role</th><th>Status</th><th colspan="2">Action</th></tr>
                            </thead>
                            <tbody id="ajaxlistplan">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--edit modal-->
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Edit Plan</h3>
                    <div id="updateajaxresponse"></div>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitEditModal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        
        .genderblock span {
    display: inline-block;
    height: 30px;
    line-height: 30px;
    width: 100px;
}
.genderblock input {
    display: inline;
    margin: 0;
    width: 30px;
}
.genderblock span lable {
    position: absolute;
}
    </style>
    <script>

        $(document).ready(function () {
    //        call plan list method for populate table
            userList();

    //        plan craete form submit code
            $('#frm_admin_create').submit(function (e) {
                e.preventDefault();
                var self = $(this);
                var type = self.attr('method');
                var url = self.attr('action');
                var data = self.serialize();
                $.ajax({
                    url: url,
                    type: type,
                    data: data
                }).done(function (html) {
                    $('#ajaxresponse').html(html);
                    $('#frm_admin_create')[0].reset();
                    userList();
                });
            });


    //        submit update modal

            $('#submitEditModal').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    url: $("#frm_user_update").attr('action'),
                    type: $("#frm_user_update").attr('method'),
                    data: $("#frm_user_update").serialize()
                }).done(function (html) {
                    $('#updateajaxresponse').html(html);
                    userList();
                });
            });


        });
        var userList = function () {
            $.ajax({
                url: '<?php echo base_url() ?>admin/userList',
                type: 'GET'
            }).done(function (html) {
                $('#ajaxlistplan').html(html);
                var btnedit = $('.btnedit');
                var btndelete = $('.btndelete');

                //    open edit  modal as external edit page code
                btnedit.on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'GET',
                        data: 'id=' + $(this).attr('data-id')
                    }).done(function (html) {
                        $('.modal-body').html(html);
                    });
                });

    //                delete plan entry
                btndelete.on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'GET',
                        data: 'id=' + $(this).attr('data-id')
                    }).done(function (html) {
                        $('#ajaxresponse').html(html);
                        userList();
                    });
                });

            });
        };


    </script>


    <?php
    $this->load->view('admin/footer');
    