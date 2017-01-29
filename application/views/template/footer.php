</div>
<!-- Core Scripts - Include with every page -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo JS."bootstrap.min.js"; ?>"></script>

<script src="<?php echo JS."plugins/metisMenu/jquery.metisMenu.js";?>"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="<?php echo JS . "sb-admin.js"; ?>" ></script>

<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
<!--<script src="<?php echo JS . "demo/dashboard-demo.js"; ?>"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/selectize.min.js"></script>

<script>
$(document).ready(function(){
    $('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});
});
$('.select-plugin').selectize({
    create: false,
});
</script>

    </body>
</html>
