<?php
/**
 * @var string $controller_name
 * @var string $table_headers
 * @var array $config
 */
?>

<?= view('partial/header') ?>

<style>
.nav-tabs .nav-link {
    color: #6c757d;
    border: none;
    border-bottom: 2px solid transparent;
    padding: 0.5rem 1rem;
}

.nav-tabs .nav-link.active {
    color: #0d6efd;
    background: none;
    border: none;
    border-bottom: 2px solid #0d6efd;
}

.nav-tabs {
    border-bottom: 1px solid #dee2e6;
    margin-bottom: 1rem;
}

.content-wrapper {
    padding: 1rem;
    background: #fff;
    border-radius: 0.25rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .action-buttons {
        flex-direction: column;
        width: 100%;
    }
    .action-buttons .btn {
        width: 100%;
    }
}
</style>

<script type="text/javascript">
    $(document).ready(function() {
        <?= view('partial/bootstrap_tables_locale') ?>

        table_support.init({
            resource: '<?= esc($controller_name) ?>',
            headers: <?= $table_headers ?>,
            pageSize: <?= $config['lines_per_page'] ?>,
            uniqueId: 'people.person_id',
            enableActions: function() {
                var email_disabled = $("td input:checkbox:checked").parents("tr").find("td a[href^='mailto:']").length == 0;
                $("#email").prop('disabled', email_disabled);
            }
        });

        $("#email").click(function(event) {
            var recipients = $.map($("tr.selected a[href^='mailto:']"), function(element) {
                return $(element).attr('href').replace(/^mailto:/, '');
            });
            location.href = "mailto:" + recipients.join(",");
        });
    });
</script>

<div class="container-fluid p-3">
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#information" role="tab">
                <?= lang('Common.information') ?>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#general" role="tab">
                <?= lang('Common.general') ?>
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="information" role="tabpanel">
            <div class="content-wrapper">
                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mb-3">
                    <div class="action-buttons">
                        <button id="delete" class="btn btn-outline-danger btn-sm">
                            <span class="glyphicon glyphicon-trash">&nbsp;</span><?= lang('Common.delete') ?>
                        </button>
                        <button id="email" class="btn btn-outline-primary btn-sm">
                            <span class="glyphicon glyphicon-envelope">&nbsp;</span><?= lang('Common.email') ?>
                        </button>
                    </div>
                    <div class="action-buttons">
                        <?php if ($controller_name === 'customers') { ?>
                            <button class="btn btn-outline-secondary btn-sm modal-dlg" data-btn-submit="<?= lang('Common.submit') ?>" data-href="<?= "$controller_name/csvImport" ?>" title="<?= lang(ucfirst($controller_name) . '.import_items_csv') ?>">
                                <span class="glyphicon glyphicon-import">&nbsp;</span><?= lang('Common.import_csv') ?>
                            </button>
                        <?php } ?>
                        <button class="btn btn-primary btn-sm modal-dlg" data-btn-submit="<?= lang('Common.submit') ?>" data-href="<?= "$controller_name/view" ?>" title="<?= lang(ucfirst($controller_name) . '.new') ?>">
                            <span class="glyphicon glyphicon-user">&nbsp;</span><?= lang(ucfirst($controller_name) . '.new') ?>
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="table" class="table table-hover table-striped"></table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="general" role="tabpanel">
            <div class="content-wrapper">
                <form class="form-horizontal">
                    <!-- Theme Settings -->
                    <div class="mb-4">
                        <h5 class="mb-3">Theme</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Theme Style</label>
                            <div class="col-sm-9">
                                <select class="form-select">
                                    <option selected>Default Theme (Pretty)</option>
                                    <option>Classic</option>
                                    <option>Modern</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Login Form Settings -->
                    <div class="mb-4">
                        <h5 class="mb-3">Login Form</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Style</label>
                            <div class="col-sm-9">
                                <select class="form-select">
                                    <option selected>Default</option>
                                    <option>Modern</option>
                                    <option>Classic</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Default Discount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="0">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Default Receiving Discount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="0">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Settings -->
                    <div class="mb-4">
                        <h5 class="mb-3">Additional Settings</h5>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="enforce_privacy">
                                <label class="form-check-label" for="enforce_privacy">
                                    Enforce Privacy
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="receiving_calculate_average">
                                <label class="form-check-label" for="receiving_calculate_average">
                                    Calculate Average Price (Receiving)
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="mb-4">
                        <h5 class="mb-3">Notification Settings</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Popup Position</label>
                            <div class="col-sm-9">
                                <select class="form-select">
                                    <option>Top</option>
                                    <option selected>Bottom</option>
                                    <option>Center</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Settings -->
                    <div class="mb-4">
                        <h5 class="mb-3">Image Upload Settings</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Image Size</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="460">
                                            <span class="input-group-text">width</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="125">
                                            <span class="input-group-text">height</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('partial/footer') ?>
