<?php
/**
 * Bootstrap 5 Migration Helper Script
 * 
 * This script helps migrate OSPOS from Bootstrap 3 to Bootstrap 5
 * Run this script after building with the new gulpfile configuration
 */

// Check if we're in the correct directory
if (!file_exists('app/Config/App.php')) {
    die("Please run this script from the OSPOS root directory\n");
}

echo "Bootstrap 5 Migration Helper for OSPOS\n";
echo "=====================================\n\n";

// Step 1: Check if Bootstrap 5 resources exist
echo "1. Checking Bootstrap 5 resources...\n";
$bootstrap5_dir = 'public/resources/bootswatch5';
if (is_dir($bootstrap5_dir)) {
    $themes = array_filter(scandir($bootstrap5_dir), function($item) use ($bootstrap5_dir) {
        return is_dir($bootstrap5_dir . '/' . $item) && !in_array($item, ['.', '..', 'fonts']);
    });
    echo "   ✓ Bootstrap 5 themes found: " . implode(', ', $themes) . "\n";
} else {
    echo "   ✗ Bootstrap 5 themes not found. Run 'npm run build' first.\n";
    exit(1);
}

// Step 2: Check if compatibility CSS exists
echo "2. Checking compatibility CSS...\n";
if (file_exists('public/css/bootstrap5-compatibility.css')) {
    echo "   ✓ Bootstrap 5 compatibility CSS found\n";
} else {
    echo "   ✗ Bootstrap 5 compatibility CSS not found\n";
    exit(1);
}

// Step 3: Backup current theme setting
echo "3. Backing up current configuration...\n";
$config_file = 'app/Database/migrations/2014-07-21-133051_initial_migration.php';
if (file_exists($config_file)) {
    echo "   ✓ Configuration backup location identified\n";
} else {
    echo "   ⚠ Could not locate main configuration file\n";
}

// Step 4: List files that may need manual migration
echo "4. Files that may need manual class updates:\n";
$files_to_check = [
    'app/Views/partial/header.php',
    'app/Views/partial/footer.php',
    'app/Views/home/home.php',
    'app/Views/item_kits/manage.php',
    'app/Views/items/manage.php',
    'app/Views/sales/manage.php',
    'app/Views/customers/manage.php',
    'app/Views/employees/manage.php',
    'app/Views/attributes/form.php',
    'app/Views/configs/general_config.php',
    'public/js/manage_tables.js'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        echo "   📝 $file\n";
    }
}

echo "\n5. Bootstrap 3 to 5 Migration Checklist:\n";
echo "   □ Update .panel classes to .card\n";
echo "   □ Update .panel-heading to .card-header\n";
echo "   □ Update .panel-body to .card-body\n";
echo "   □ Update .panel-footer to .card-footer\n";
echo "   □ Replace .label classes with .badge\n";
echo "   □ Replace .well classes with .alert or custom styling\n";
echo "   □ Update .btn-xs to .btn-sm\n";
echo "   □ Replace .hidden-* with .d-none .d-{breakpoint}-block\n";
echo "   □ Replace .visible-* with .d-block .d-{breakpoint}-none\n";
echo "   □ Update .form-group structure\n";
echo "   □ Replace .input-group-addon with .input-group-text\n";
echo "   □ Update navbar structure\n";
echo "   □ Replace glyphicons with Bootstrap Icons\n";
echo "   □ Test all forms and modals\n";
echo "   □ Test responsive layouts\n";
echo "   □ Test all JavaScript interactions\n";

echo "\n6. Next Steps:\n";
echo "   1. Run 'npm run build' to compile Bootstrap 5 resources\n";
echo "   2. Switch theme to a Bootstrap 5 theme in admin settings\n";
echo "   3. Test the application thoroughly\n";
echo "   4. Gradually update view files to use Bootstrap 5 classes\n";
echo "   5. Install Bootstrap Icons: npm install bootstrap-icons\n";

echo "\n7. Useful Bootstrap 5 Migration Resources:\n";
echo "   - Bootstrap 5 Migration Guide: https://getbootstrap.com/docs/5.3/migration/\n";
echo "   - Bootstrap Icons: https://icons.getbootstrap.com/\n";
echo "   - Bootswatch 5: https://bootswatch.com/5/\n";

echo "\nMigration helper complete!\n";
?>
