<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .table td:first-child {
        font-weight: bold;
    }

    label {
        margin-right: 10px;
    }
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('group_permissions'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?= lang("set_permissions"); ?></p>

                <?php if (!empty($p)) {
                    if ($p->group_id != 1) {

                        echo admin_form_open("system_settings/permissions/" . $id); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped reports-table">

                                <thead>
                                <tr>
                                    <th colspan="6"
                                        class="text-center"><?php echo $group->description . ' ( ' . $group->name . ' ) ' . $this->lang->line("group_permissions"); ?></th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="text-center"><?= lang("module_name"); ?>
                                    </th>
                                    <th colspan="5" class="text-center"><?= lang("permissions"); ?></th>
                                </tr>
                                <tr>
                                    <th class="text-center"><?= lang("view"); ?></th>
                                    <th class="text-center"><?= lang("add"); ?></th>
                                    <th class="text-center"><?= lang("edit"); ?></th>
                                    <th class="text-center"><?= lang("delete"); ?></th>
                                    <th class="text-center"><?= lang("misc"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= lang("Clients"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="clients-index" <?php echo $p->{'clients-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="clients-add" <?php echo $p->{'clients-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="clients-edit" <?php echo $p->{'clients-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="clients-delete" <?php echo $p->{'clients-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("Notaries"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="notaries-index" <?php echo $p->{'notaries-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="notaries-add" <?php echo $p->{'notaries-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="notaries-edit" <?php echo $p->{'notaries-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="notaries-delete" <?php echo $p->{'notaries-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("reports"); ?></td>
                                    <td colspan="5">

                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("misc"); ?></td>
                                    <td colspan="5">
                                        <span style="display:inline-block;">
                                            <input type="checkbox" value="1" class="checkbox" id="bulk_actions"
                                            name="bulk_actions" <?php echo $p->bulk_actions ? "checked" : ''; ?>>
                                            <label for="bulk_actions" class="padding05"><?= lang('bulk_actions') ?></label>
                                        </span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?=lang('update')?></button>
                        </div>
                        <?php echo form_close();
                    } else {
                        echo $this->lang->line("group_x_allowed");
                    }
                } else {
                    echo $this->lang->line("group_x_allowed");
                } ?>


            </div>
        </div>
    </div>
</div>
