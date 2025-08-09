# Bootstrap 5 Migration Guide for OSPOS

## Overview

This guide outlines the steps to migrate OpenSource POS from Bootstrap 3 to Bootstrap 5. The migration has been prepared with compatibility layers and infrastructure changes.

## Infrastructure Changes Made

### 1. Package Dependencies
- ✅ Bootstrap 5 (`bootstrap5`) already included in package.json
- ✅ Bootswatch 5 (`bootswatch5`) already included
- ✅ Bootstrap Icons added for glyphicon replacement

### 2. Build System Updates
- ✅ `gulpfile.js` updated to support both Bootstrap versions
- ✅ Bootstrap 5 themes copied to `public/resources/bootswatch5/`
- ✅ Bootstrap Icons integration added
- ✅ Compatibility CSS layer created

### 3. Theme System Updates
- ✅ Config controller updated to detect Bootstrap 5 themes
- ✅ Theme preview links updated for both versions
- ✅ Fallback system for Bootstrap 3 themes

### 4. Compatibility Layer
- ✅ `bootstrap5-compatibility.css` created with:
  - Glyphicon to Bootstrap Icons mappings
  - Panel to Card migration styles
  - Form group compatibility
  - Navigation compatibility
  - Button size compatibility

## Migration Steps

### Phase 1: Preparation (Completed)
1. ✅ Updated package.json dependencies
2. ✅ Modified gulpfile.js for dual Bootstrap support
3. ✅ Created compatibility CSS layer
4. ✅ Updated theme configuration system

### Phase 2: Build and Test
1. Run the build process:
   ```bash
   npm install
   npm run build
   ```

2. Run the migration helper:
   ```bash
   php bootstrap5_migration_helper.php
   ```

3. Switch to a Bootstrap 5 theme in admin settings

### Phase 3: Manual Migration (Your Task)
You'll need to manually update the following class mappings in view files:

#### Core Component Changes
- `.panel` → `.card`
- `.panel-heading` → `.card-header`
- `.panel-body` → `.card-body`
- `.panel-footer` → `.card-footer`
- `.label` → `.badge`
- `.well` → `.alert` or custom styling

#### Button Changes
- `.btn-xs` → `.btn-sm` (or use compatibility CSS)

#### Form Changes
- `.form-group` structure updated (mostly compatible)
- `.input-group-addon` → `.input-group-text`
- `.control-label` → `.form-label`

#### Responsive Classes
- `.hidden-xs` → `.d-none .d-sm-block`
- `.hidden-sm` → `.d-none .d-md-block`
- `.visible-xs` → `.d-block .d-sm-none`
- `.visible-sm` → `.d-block .d-md-none`

#### Icons
- All `.glyphicon-*` → Bootstrap Icons `.bi-*`
- Include Bootstrap Icons CSS

### Phase 4: Testing
1. Test all major functionality
2. Verify responsive layouts
3. Check all forms and modals
4. Validate JavaScript interactions
5. Test printing functionality

## Files Requiring Manual Updates

### High Priority
- `app/Views/partial/header.php` - Main layout
- `app/Views/partial/footer.php` - Footer layout
- `app/Views/home/home.php` - Dashboard
- `app/Views/*/manage.php` - All management pages

### Medium Priority
- `app/Views/*/form.php` - All form pages
- `app/Views/configs/*.php` - Configuration pages
- `public/js/manage_tables.js` - Table interactions

### Low Priority
- Individual item/customer/sale views
- Report templates
- Print templates

## Rollback Plan

If issues arise, you can rollback by:
1. Reverting theme selection to Bootstrap 3 themes
2. Using the original gulpfile.js
3. Removing Bootstrap 5 compatibility CSS

## Benefits of Migration

1. **Modern Design**: Bootstrap 5 provides updated, modern UI components
2. **Better Performance**: Smaller bundle size, improved CSS
3. **Enhanced Accessibility**: Better ARIA support and semantic HTML
4. **Future-Proof**: Active development and long-term support
5. **Improved Mobile**: Better responsive design patterns

## Bootstrap 5 Features Available

- Updated color palette
- New utility classes
- Improved grid system
- Better form controls
- Enhanced components (toasts, offcanvas, etc.)
- CSS custom properties support

## Resources

- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)
- [Bootstrap 5 Migration Guide](https://getbootstrap.com/docs/5.3/migration/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [Bootswatch 5 Themes](https://bootswatch.com/5/)

## Support

After migration, monitor for:
- Layout inconsistencies
- JavaScript errors
- Form submission issues
- Print layout problems
- Mobile responsiveness issues

The compatibility CSS should handle most visual differences, but some manual adjustments may be needed for optimal appearance.
