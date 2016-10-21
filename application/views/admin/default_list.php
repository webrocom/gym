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
            <h1 class="text-center text-uppercase">Welcome to my gym portal.</h1>
            <?php
            $delete  = $this->session->flashdata('delete');
            if(isset($delete)){
                echo $delete;
            }
            ?>
            
            <div class="" ng-app="App1">

                <div class="tab-pane active" id="tab_default_1" ng-controller="gridController">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div class="row">
                                <div class="col-md-3">Filter:
                                    <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <h5>Filtered {{ filtered.length}} of {{ totalItems}} total customers</h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="thumbnail">
                                        <div ng-show="filteredItems > 0">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <th>Member ID&nbsp;</th>
                                                <th>First name&nbsp;</th>
                                                <th>Middle name&nbsp;</th>
                                                <th>Last name&nbsp;</th>
                                                <th>Area&nbsp;</th>
                                                <th>Telephone&nbsp;</th>
                                                <th>Telephone&nbsp;</th>
                                                <th>Created&nbsp;</th>
                                                <th>Action&nbsp;</th>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="data in filtered = (list| filter:search | orderBy : predicate :reverse) | startFrom:(currentPage - 1) * entryLimit | limitTo:entryLimit">
                                                        <td>{{data.member_id}}</td>
                                                        <td>{{data.fname}}</td>
                                                        <td>{{data.mname}}</td>
                                                        <td>{{data.lname}}</td>
                                                        <td>{{data.area}}</td>
                                                        <td>{{data.telephone}}</td>
                                                        <td>{{data.telephone2}}</td>
                                                        <td>{{data.created}}</td>
                                                        <td><a href="<?php echo base_url()?>view/{{data.m_id}}">View</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>memberedit/{{data.m_id}}">Edit</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>memberdelcf/{{data.m_id}}" class="deletemember">Delete</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div  ng-show="filteredItems == 0">
                                            <div class="col-md-12">
                                                <h4>No customers found</h4>
                                            </div>
                                        </div>
                                        <div ng-show="filteredItems > 0">
                                            <ul pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></ul>
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
</div>

<?php
$this->load->view('admin/footer');
