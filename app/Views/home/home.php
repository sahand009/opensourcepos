<?php
/**
 * @var array $allowed_modules
 */
?>

<?= view('partial/header') ?>

<script type="text/javascript">
    dialog_support.init("a.modal-dlg");
</script>

<style>
/* Grid Layout for Home Modules */
.home-grid-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: calc(100vh - 200px);
    padding: 40px 20px;
}

.welcome-title {
    color: white;
    font-size: 2.5rem;
    font-weight: 300;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    margin-bottom: 3rem;
}

.modules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.module-card {
    background: white;
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
    border: none;
    position: relative;
    overflow: hidden;
}

.module-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.module-card:hover::before {
    transform: scaleX(1);
}

.module-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.module-icon-container {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border: 3px solid #e9ecef;
}

.module-card:hover .module-icon-container {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    background: #ffffff;
    border-color: #667eea;
}

.module-icon-img {
    width: 45px;
    height: 45px;
    object-fit: contain;
    transition: all 0.3s ease;
}

.module-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
    line-height: 1.4;
}

.module-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .welcome-title {
        font-size: 2rem;
        margin-bottom: 2rem;
    }
    
    .modules-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 0 10px;
    }
    
    .module-card {
        padding: 30px 20px;
    }
    
    .home-grid-container {
        padding: 20px 10px;
        min-height: calc(100vh - 160px);
    }
}

@media (max-width: 480px) {
    .modules-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .welcome-title {
        font-size: 1.8rem;
    }
    
    .module-card {
        padding: 25px 15px;
    }
}
</style>

<div class="home-grid-container">
    <div class="text-center">
        <h1 class="welcome-title"><?= lang('Common.welcome_message') ?></h1>
    </div>
    
    <div class="modules-grid">
        <?php foreach($allowed_modules as $module) { ?>
            <div class="module-card">
                <a href="<?= base_url($module->module_id) ?>" class="module-link" title="<?= lang("Module.$module->module_id" . '_desc') ?>">
                    <div class="module-icon-container">
                        <img src="<?= base_url("images/menubar/$module->module_id.svg") ?>" 
                             class="module-icon-img" 
                             alt="<?= lang("Module.$module->module_id") ?> Icon"
                             onerror="this.style.display='none';">
                    </div>
                    <h3 class="module-name"><?= lang("Module.$module->module_id") ?></h3>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<?= view('partial/footer') ?>
