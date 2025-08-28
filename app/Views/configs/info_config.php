<?php
/**
 * @var bool $logo_exists
 * @var string $controller_name
 * @var array $config
 */
?>

<?= form_open('config/saveInfo/', ['id' => 'info_config_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) ?>
    <div id="config_wrapper">
        <fieldset id="config_info">

            <div id="required_fields_message"><?= lang('Common.fields_required_message') ?></div>
            <ul id="info_error_message_box" class="error_message_box"></ul>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Config.company'), 'company', ['class' => 'control-label col-xs-2 required']) ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm">
                            <span class="glyphicon glyphicon-home"></span>
                        </span>
                        <?= form_input([
                            'name'  => 'company',
                            'id'    => 'company',
                            'class' => 'form-control input-sm required',
                            'value' => $config['company']
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Config.company_logo'), 'company_logo', ['class' => 'control-label col-xs-2']) ?>
                <div class="col-xs-6">
                    <div class="company-logo-responsive" style="margin-bottom:8px;">
                        <div class="company-logo-box" style="border:1px solid #ccc; border-radius:4px; width:100%; max-width:220px; height:0; padding-bottom:56%; position:relative; background:#fafafa; display:flex; align-items:center; justify-content:center;">
                            <?php if ($logo_exists): ?>
                                <img src="<?= base_url('uploads/' . $config['company_logo']) ?>" alt="<?= lang('Config.company_logo') ?>" style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:contain;">
                            <?php else: ?>
                                <span style="color:#bbb; font-size:14px; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%);">No Image</span>
                            <?php endif; ?>
                        </div>
                        <div style="margin-top:8px;">
                            <input type="file" name="company_logo" accept="image/*" style="display:inline-block;">
                        </div>
                    </div>
                    <style>
                        @media (max-width: 600px) {
                            .company-logo-responsive {
                                max-width: 100%;
                            }
                            .company-logo-box {
                                max-width: 100%;
                                padding-bottom: 56%;
                            }
                        }
                    </style>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Config.address'), 'address', ['class' => 'control-label col-xs-2 required']) ?>
                <div class="col-xs-6">
                    <?= form_textarea([
                        'name'  => 'address',
                        'id'    => 'address',
                        'class' => 'form-control input-sm required',
                        'value' => $config['address']
                    ]) ?>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Config.website'), 'website', ['class' => 'control-label col-xs-2']) ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm">
                            <span class="glyphicon glyphicon-globe"></span>
                        </span>
                        <?= form_input([
                            'name'  => 'website',
                            'id'    => 'website',
                            'class' => 'form-control input-sm',
                            'value' => $config['website']
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Common.email'), 'email', ['class' => 'control-label col-xs-2']) ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </span>
                        <?= form_input([
                            'name'  => 'email',
                            'id'    => 'email',
                            'type'  => 'email',
                            'class' => 'form-control input-sm',
                            'value' => $config['email']
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Config.phone'), 'phone', ['class' => 'control-label col-xs-2 required']) ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm">
                            <span class="glyphicon glyphicon-phone-alt"></span>
                        </span>
                        <?= form_input([
                            'name'  => 'phone',
                            'id'    => 'phone',
                            'class' => 'form-control input-sm required',
                            'value' => $config['phone']
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Config.fax'), 'fax', ['class' => 'control-label col-xs-2']) ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm">
                            <span class="glyphicon glyphicon-phone-alt"></span>
                        </span>
                        <?= form_input([
                            'name'  => 'fax',
                            'id'    => 'fax',
                            'class' => 'form-control input-sm',
                            'value' => $config['fax']
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <?= form_label(lang('Common.return_policy'), 'return_policy', ['class' => 'control-label col-xs-2 required']) ?>
                <div class="col-xs-6">
                    <?= form_textarea([
                        'name'  => 'return_policy',
                        'id'    => 'return_policy',
                        'class' => 'form-control input-sm required',
                        'value' => $config['return_policy']
                    ]) ?>
                </div>
            </div>

            <?= form_submit([
                'name'  => 'submit_info',
                'id'    => 'submit_info',
                'value' => lang('Common.submit'),
                'class' => 'btn btn-primary btn-sm pull-right'
            ]) ?>

        </fieldset>
    </div>
<?= form_close() ?>

<script type="text/javascript">
    // Validation and submit handling
    $(document).ready(function() {
        $("a.fileinput-exists").click(function() {
            $.ajax({
                type: 'POST',
                url: '<?= "$controller_name/removeLogo"; ?>',
                dataType: 'json'
            })
        });

        $('#info_config_form').validate($.extend(form_support.handler, {

            errorLabelContainer: "#info_error_message_box",

            rules: {
                company: "required",
                address: "required",
                phone: "required",
                email: "email",
                return_policy: "required"
            },

            messages: {
                company: "<?= lang('Config.company_required') ?>",
                address: "<?= lang('Config.address_required') ?>",
                phone: "<?= lang('Config.phone_required') ?>",
                email: "<?= lang('Common.email_invalid_format') ?>",
                return_policy: "<?= lang('Config.return_policy_required') ?>"
            }
        }));
    });
</script>
