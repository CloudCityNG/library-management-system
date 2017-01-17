<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 2/12/16
 * Time: 4:55 PM
 */
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">View Settings</h3>
            </div>
        </div>
        <div id="tabulated">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed table-striped">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Value</th>
                            </thead>
                            <?php foreach ($settings->result() as $row){
                                ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->value; ?></td>
                                </tr>
                                <?php
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary btn-block" id="edit_settings" onclick="editSettings()">
                            Edit Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="edit_tabulated" style="display: none;">
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo URL.'index.php/setting/edit'; ?>" method="post" role="form">
                    <?php
                    $temp = '';
                    foreach ($settings->result() as $row){
                        $temp = $row->id.'_'.$temp;
                    }
                    foreach ($settings->result() as $row){
                        ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="<?php echo $row->id ?>"><?php echo $row->name; ?></label>
                                <input type="text" class="form-control" name="<?php echo $row->id?>" id="<?php echo $row->id?>" value="<?php echo $row->value; ?>">
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <input type="hidden" value="<?php echo $temp; ?>" name="edit_ids">
                    <div class="row">
                        <div class="col-md-offset-4 col-sm-offset-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block btn-outline" type="submit" name="update_setting">
                                    Update settings
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    function editSettings() {
        jQuery('#tabulated').css('display','none');
        jQuery('#edit_tabulated').css('display','block');
    }
</script>