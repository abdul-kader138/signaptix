<style>
    .players_link {
        cursor: pointer;
    }

</style>
<script>
    function player_status(x) {
        var y = x.split('__');
        if (y[0] == 'Approved') return '<span class="label label-success"> Approved</span>';
        if (y[0] == 'Rejected') return '<span class="label label-danger"> Rejected</span>';
        if (y[0] == 'Pending') return '<span class="label label-warning"> Pending</span>';
    }
    function bcp_status(x) {
        if (x == null) {
            return '';
        } else {
            return '<div class="text-center"><span class="payment_status label label-default">' + x + '</span></div>';
        }
    }

    function name_status(x) {
        if (x == null) {
            return '';
        } else {
            return '<div class="text-center"><span class="payment_status label label-info">' + x + '</span></div>';
        }
    }

    function ref_status(x) {
        if (x == null) {
            return '';
        } else {
            // return '';
            return '<div class="text-center"><span class="payment_status label label-success">' + x + '</span></div>';
        }
    }

    function player_img_hl(x) {
        var image_link = x == null || x == '' ? 'no_image.png' : x;
        return (
            '<div class="text-center"><img src="' +
            site.url +
            'assets/uploads/avatars/thumbs/' +
            image_link +
            '" alt="" style="width:30px; height:30px;" /></div>'
        );
    }

    $(document).ready(function () {
        'use strict';
        oTable = $('#UsrTable').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= admin_url('players/getPlayers') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable.fnSettings();
                nRow.id = aData[0];
                nRow.className = "players_link";
                //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                return nRow;
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            }, {
                "bSortable": false,
                "mRender": player_img_hl
            }, {"mRender": ref_status}, {"mRender": name_status}, null, {"mRender": fsd}, null, {"mRender": bcp_status}, null, null, null, {"mRender": player_status}, {"bSortable": false}]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 2, filter_default_label: "[<?=lang('SSFL');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('Name');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('Gender');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('Date_Of_birth');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('Age');?>]", filter_type: "text", data: []},
            {
                column_number: 7,
                filter_default_label: "[<?=lang('Birth_Certificate_Pin');?>]",
                filter_type: "text",
                data: []
            },
            {column_number: 8, filter_default_label: "[<?=lang('School');?>]", filter_type: "text", data: []},
            {column_number: 9, filter_default_label: "[<?=lang('SEA_Year');?>]", filter_type: "text", data: []},
            {column_number: 10, filter_default_label: "[<?=lang('Division');?>]", filter_type: "text", data: []},
            {
                column_number: 11, select_type: 'select2',
                select_type_options: {
                    placeholder: '<?=lang('Status');?>',
                    width: '100%',
                    style: 'width:100%;',
                    minimumResultsForSearch: -1,
                    allowClear: true
                },
                data: [{value: 'Pending', label: '<?=lang('Pending');?>'}, {
                    value: 'Approved',
                    label: '<?=lang('Approved');?>'
                }, {value: 'Rejected', label: '<?=lang('Rejected');?>'}]
            }
        ], "footer");
    });
</script>
<style>.table td:nth-child(9) {
        text-align: right;
        width: 10%;
    }

    .table td:nth-child(8) {
        text-align: center;
    }</style>
<?php if ($Owner) {
    echo admin_form_open('auth/user_actions', 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('Players'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= admin_url('players/add'); ?>"><i
                                        class="fa fa-plus-circle"></i> <?= lang("Add_Player"); ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <!--                <p class="introtext">--><? //= lang('list_results'); ?><!--</p>-->

                <div class="table-responsive">
                    <table id="UsrTable" cellpadding="0" cellspacing="0" border="0"
                           class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                            <th class="col-xs-1"><?php echo lang('Photo'); ?></th>
                            <th class="col-xs-1"><?php echo lang('SSFL_No'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Name'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Gender'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Date_Of_birth'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Age'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Birth_Certificate_Pin'); ?></th>
                            <th class="col-xs-1"><?php echo lang('School'); ?></th>
                            <th class="col-xs-1"><?php echo lang('SEA_Year'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Division'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Status'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="13" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                        </tr>
                        </tbody>
                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkft" type="checkbox" name="check"/>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="width:85px;"><?= lang("actions"); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<?php if ($Owner) { ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>

    <script language="javascript">
        $(document).ready(function () {
            $('#set_admin').click(function () {
                $('#usr-form-btn').trigger('click');
            });

        });
    </script>

<?php } ?>