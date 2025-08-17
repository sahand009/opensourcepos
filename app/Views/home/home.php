<?php
/**
 * @var array $allowed_modules
 */
?>

<?= view('partial/header') ?>

<script type="text/javascript">
    dialog_support.init("a.modal-dlg");
</script>

<div class="container-fluid px-3">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-4"><?= lang('Common.welcome_message') ?></h3>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-12">
            <div id="home_module_list" class="d-flex flex-wrap justify-content-center gap-3">
                <?php foreach($allowed_modules as $module) { ?>
                    <div class="module_item card shadow-sm border-0 text-center" title="<?= lang("Module.$module->module_id" . '_desc') ?>">
                        <div class="card-body p-3">
                            <a href="<?= base_url($module->module_id) ?>" class="text-decoration-none d-block">
                                <div class="module-icon mb-2">
                                    <img src="<?= base_url("images/menubar/$module->module_id.svg") ?>" 
                                         class="img-fluid" 
                                         style="max-width: 48px; max-height: 48px;" 
                                         alt="<?= lang("Module.$module->module_id") ?> Icon">
                                </div>
                                <div class="module-title">
                                    <small class="fw-medium text-dark"><?= lang("Module.$module->module_id") ?></small>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= view('partial/footer') ?>
