<?php $this->load->view('admin/header'); ?>

<div class="container" style="border-top: 1px solid #D14B54; background: #f5f5f5">
    <div class="tabbable-panel">
        <div class="tabbable-line">
            <ul class="nav nav-tabs ">
                <li class="active">
                    <a href="#">
                        Families </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>family-create">
                        Create new</a>
                </li>
            </ul>
            
            
            <div class="tab-content">
                <div class="tab-pane active" id="tab_default_1">
                    <p>
                        I'm in Tab 1.
                    </p>
                    <p>
                        Duis autem eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                    </p>
                    <p>
                        <a class="btn btn-success" href="http://j.mp/metronictheme" target="_blank">
                            Learn more...
                        </a>
                    </p>
                </div>
                <div class="tab-pane" id="tab_default_2">
                    <p>
                        Howdy, I'm in Tab 2.
                    </p>
                    <p>
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                    </p>
                    <p>
                        <a class="btn btn-warning" href="http://j.mp/metronictheme" target="_blank">
                            Click for more features...
                        </a>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('admin/footer');
