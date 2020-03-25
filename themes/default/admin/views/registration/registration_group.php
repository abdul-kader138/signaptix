<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

$v = "";
if ($this->input->post('sel_school_id')) {
    $v .= "&school_id=" . $this->input->post('sel_school_id');
}
?>
    <script>
        $(document).ready(function () {

            $("#sel_school_id").change(function () {
                $('#school_id').val($('#sel_school_id').val());
            });

            $('#school_id').val($('#sel_school_id').val());

            oTable = $('#SlRData').dataTable({
                "aaSorting": [[0, "desc"]],
                "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                "iDisplayLength": <?= $Settings->rows_per_page ?>,
                'bProcessing': true, 'bServerSide': true,
                'sAjaxSource': '<?= admin_url('registration/getRegistrationGroups/?v=1' . $v) ?>',
                'fnServerData': function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "<?= $this->security->get_csrf_token_name() ?>",
                        "value": "<?= $this->security->get_csrf_hash() ?>"
                    });
                    $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
                },
                'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                },
                "aoColumns": [{
                    "bSortable": false,
                    "mRender": checkbox
                }, null, null,  null,null,null,null],
                "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                }
            }).fnSetFilteringDelay().dtFilter([], "footer");



        });
    </script>
    <div class="box">
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <?php echo admin_form_open("registration/registration_group"); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?= lang("School_Name", "School_Name"); ?>
                                    <?php
                                    $gp[''] = 'Please Select School';
                                    foreach ($schools as $school) {
                                        $gp[$school->id] = $school->name;
                                    }
                                    echo form_dropdown('sel_school_id', $gp, (isset($_POST['sel_school_id']) ? $_POST['sel_school_id'] : ''), 'id="sel_school_id" required="required" class="form-control select" style="width:100%;"');
                                    ?>
                                </div>

                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div style="margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                    <?php echo form_submit('submit', $this->lang->line("Load_Student_Info"), 'class="form-control btn btn-primary"'); ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="clearfix"></div>
                    <?php echo admin_form_open('registration/add', 'id="action-form"'); ?>
                    <div class="table-responsive">
                        <table id="SlRData"
                               class="table table-bordered table-hover table-striped table-condensed reports-table">
                            <thead>
                            <tr>
                                <th style="min-width:3px; width: 5px; text-align: center;">
                                    <input class="checkbox checkft" type="checkbox" name="check"/>
                                </th>
                                <th style="min-width:20px; width: 200px;"><?= lang("SSFL"); ?></th>
                                <th style="min-width:20px; width: 500px;"><?= lang("Name"); ?></th>
                                <th style="min-width:20px; width: 100px;"><?= lang("Zone"); ?></th>
                                <th style="min-width:20px; width: 100px;"><?= lang("Division"); ?></th>
                                <th style="min-width:20px; width: 100px;"><?= lang("Status"); ?></th>
                                <th style="min-width:20px; width: 100px;"><?= lang("Created_By"); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="7" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                            </tr>
                            </tbody>
                            <tfoot class="dtFilter">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <input type="hidden" name="form_action" value="add" id="form_action"/>
                <input type="hidden" value="<?php echo $id; ?>" name="school_id" id="school_id"/>
                <?= form_submit('submit', 'Apply For Registration', ' class="btn btn-primary" id="action-form-submit"') ?>
            </div>
        </div>
    </div>
<?= form_close() ?>