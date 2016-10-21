
<script src="<?php echo base_url() ?>asset/ng/angular.min.js"></script>
<script src="<?php echo base_url() ?>asset/ng/ui-bootstrap-tpls.min.js"></script>
<script src="<?php echo base_url() ?>asset/ng/angular-route.min.js"></script>
<script src="<?php echo base_url() ?>asset/ng/app.js"></script>
<script src="<?php echo base_url() ?>asset/lib/select2/select2.js"></script>
<script src="<?php echo base_url() ?>asset/lib/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/lib/alertify/alertify.min.js"/>
<script>
    
        if(getCookie("login") == 'false'){
            window.location.href = window.location.protocol + "//" + window.location.host + "/gym/auth";
        }
    
</script>
    </body>
</html>
