<style>
    .client_job_link {
        cursor: pointer;
    }

</style>
<script>
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

    function client_img_hl(x) {
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
            'sAjaxSource': '<?= admin_url('clients/getJobList') ?>',
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
                nRow.className = "client_job_link";
                return nRow;
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            }, {"mRender": name_status}, {"mRender": ref_status}, null, null, null, null,null, null,  {"bSortable": false}]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('Client_Code');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('Company_Name');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('Document_Type');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('Order_No');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('Type_Of_Singing');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('Date');?>]", filter_type: "text", data: []},
            {column_number: 7, filter_default_label: "[<?=lang('Property_Address');?>]", filter_type: "text", data: []},
            {
                column_number: 8,
                filter_default_label: "[<?=lang('Status');?>]",
                filter_type: "text",
                data: []
            }], "footer");
    });
</script>
<style>.table td:nth-child(9) {
        text-align: right;
        width: 10%;
    }

    .table td:nth-child(8) {
        text-align: center;
    }</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-th"></i><?= lang('Client_Job_List'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= admin_url('clients/addJobList'); ?>"><i
                                    class="fa fa-plus-circle"></i> <?= lang("Add_Job"); ?></a></li>
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
                            <th class="col-xs-1"><?php echo lang('Client_Code'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Company_Name'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Document_Type'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Order_No'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Type_Of_Singing'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Date'); ?></th>
                            <th class="col-xs-3"><?php echo lang('Property_Address'); ?></th>
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
                            <th style="width:85px;"><?= lang("actions"); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
