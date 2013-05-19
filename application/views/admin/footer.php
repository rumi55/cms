
		</div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo asset_url(); ?>js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?php echo asset_url(); ?>tinymce/tinymce.min.js"></script>
        <script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
        <script src="<?php echo asset_url(); ?>js/plugins.js"></script>
        <script src="<?php echo asset_url(); ?>js/admin.js"></script>
        <script>
        	$(function(){
        		Admin.PerformBinding(new Admin.CommunicationLayer(), ".main");
        	})
        </script>
    </body>
</html>