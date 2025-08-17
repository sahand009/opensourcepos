// Bootstrap 5 compatibility and responsive fixes for OSPOS
document.addEventListener('DOMContentLoaded', function() {
    
    // Ensure navbar toggler works properly
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function(e) {
            e.preventDefault();
            navbarCollapse.classList.toggle('show');
            
            // Update aria-expanded attribute
            const isExpanded = navbarCollapse.classList.contains('show');
            navbarToggler.setAttribute('aria-expanded', isExpanded);
        });
        
        // Close navbar when clicking outside
        document.addEventListener('click', function(event) {
            if (!navbarToggler.contains(event.target) && !navbarCollapse.contains(event.target)) {
                navbarCollapse.classList.remove('show');
                navbarToggler.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Close navbar when clicking on nav links (mobile)
        const navLinks = navbarCollapse.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    navbarCollapse.classList.remove('show');
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }
    
    // Fix button layout on responsive resize
    function fixButtonLayouts() {
        const toolbars = document.querySelectorAll('#toolbar .d-flex');
        toolbars.forEach(function(toolbar) {
            if (window.innerWidth <= 575) {
                // Very small screens - stack some buttons
                toolbar.classList.add('flex-column');
                toolbar.classList.remove('flex-row');
            } else if (window.innerWidth <= 767) {
                // Small screens - flexible wrapping
                toolbar.classList.add('flex-wrap');
                toolbar.classList.remove('flex-column');
            } else {
                // Larger screens - horizontal layout
                toolbar.classList.add('flex-row');
                toolbar.classList.remove('flex-column');
            }
        });
        
        // Fix title bar button layouts
        const titleBars = document.querySelectorAll('#title_bar .d-flex');
        titleBars.forEach(function(titleBar) {
            if (window.innerWidth <= 767) {
                titleBar.classList.add('flex-column');
                titleBar.classList.remove('flex-md-row');
            } else {
                titleBar.classList.add('flex-md-row');
                titleBar.classList.remove('flex-column');
            }
        });
    }
    
    // Initial call and on resize
    fixButtonLayouts();
    window.addEventListener('resize', fixButtonLayouts);
    
    // Fix Bootstrap Table responsiveness
    if (typeof $ !== 'undefined') {
        $(document).ready(function() {
            // Add responsive wrapper to all tables
            $('table').each(function() {
                if (!$(this).parent().hasClass('table-responsive')) {
                    $(this).wrap('<div class="table-responsive"></div>');
                }
            });
            
            // Handle window resize for navbar
            $(window).on('resize', function() {
                if (window.innerWidth >= 992) {
                    // Desktop - always show navbar items
                    $('.navbar-collapse').addClass('show');
                } else {
                    // Mobile/tablet - only show when toggled
                    if (!$('.navbar-toggler').hasClass('collapsed')) {
                        $('.navbar-collapse').removeClass('show');
                    }
                }
            });
        });
    }
    
    console.log('OSPOS Bootstrap 5 responsive fixes loaded');
});
    
    // Fix modal positioning on mobile
    const modals = document.querySelectorAll('.modal');
    modals.forEach(function(modal) {
        modal.addEventListener('shown.bs.modal', function() {
            if (window.innerWidth <= 768) {
                modal.style.paddingRight = '0';
                document.body.style.paddingRight = '0';
            }
        });
    });
    
    // Fix dropdown menus on mobile
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const menu = this.nextElementSibling;
                if (menu && menu.classList.contains('dropdown-menu')) {
                    menu.classList.toggle('show');
                }
            }
        });
    });
    
    // Responsive table actions
    function makeTablesResponsive() {
        const tables = document.querySelectorAll('table');
        tables.forEach(function(table) {
            if (window.innerWidth <= 575) {
                // Add data-label attributes for mobile view
                const headers = table.querySelectorAll('thead th');
                const rows = table.querySelectorAll('tbody tr');
                
                rows.forEach(function(row) {
                    const cells = row.querySelectorAll('td');
                    cells.forEach(function(cell, index) {
                        if (headers[index]) {
                            cell.setAttribute('data-label', headers[index].textContent);
                        }
                    });
                });
                
                table.classList.add('table-responsive-stack');
            } else {
                table.classList.remove('table-responsive-stack');
            }
        });
    }
    
    // Initial call and on resize
    makeTablesResponsive();
    window.addEventListener('resize', makeTablesResponsive);
    
    // Fix form validation tooltips on mobile
    const invalidInputs = document.querySelectorAll('.is-invalid');
    invalidInputs.forEach(function(input) {
        input.addEventListener('focus', function() {
            if (window.innerWidth <= 768) {
                const feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.style.display = 'block';
                }
            }
        });
    });
    
    console.log('OSPOS Bootstrap 5 responsive fixes loaded');
});

// Additional jQuery-dependent fixes
if (typeof $ !== 'undefined') {
    $(document).ready(function() {
        
        // Fix selectpicker width on mobile
        if (window.innerWidth <= 768) {
            $('.selectpicker').selectpicker('setStyle', 'btn-outline-secondary', 'add');
            $('.selectpicker').selectpicker('setStyle', 'btn-sm', 'add');
        }
        
        // Enhance button groups for mobile
        $('.btn-group').addClass('d-flex flex-wrap gap-1');
        
        // Fix modal dialog for mobile
        $('.modal-dialog').addClass('modal-dialog-scrollable');
        
        // Add loading states for buttons
        $('button[type="submit"]').on('click', function() {
            const btn = $(this);
            const originalText = btn.html();
            btn.html('<i class="bi bi-arrow-clockwise"></i> ' + originalText);
            btn.prop('disabled', true);
            
            setTimeout(function() {
                btn.html(originalText);
                btn.prop('disabled', false);
            }, 3000);
        });
        
        console.log('OSPOS jQuery responsive fixes loaded');
    });
    
    // Initialize Bootstrap 5 tabs manually
    $(document).on('click', '.nav-tabs .nav-link', function(e) {
        e.preventDefault();
        
        const $clickedTab = $(this);
        const targetId = $clickedTab.data('bs-target') || $clickedTab.attr('href');
        
        // Remove active classes from all tabs in same container
        const $tabContainer = $clickedTab.closest('.nav-tabs');
        $tabContainer.find('.nav-link').removeClass('active').attr('aria-selected', 'false');
        
        // Find tab content container
        const $contentContainer = $tabContainer.siblings('.tab-content');
        $contentContainer.find('.tab-pane').removeClass('show active');
        
        // Add active to clicked tab
        $clickedTab.addClass('active').attr('aria-selected', 'true');
        
        // Show target content
        if (targetId) {
            $(targetId).addClass('show active');
        }
    });
    
    // Enhanced modal form handling
    $(document).on('shown.bs.modal', '.modal', function() {
        // Ensure first tab is active when modal opens
        const $modal = $(this);
        const $firstTab = $modal.find('.nav-tabs .nav-link:first');
        const $firstPane = $modal.find('.tab-pane:first');
        
        if ($firstTab.length && $firstPane.length) {
            $modal.find('.nav-tabs .nav-link').removeClass('active').attr('aria-selected', 'false');
            $modal.find('.tab-pane').removeClass('show active');
            
            $firstTab.addClass('active').attr('aria-selected', 'true');
            $firstPane.addClass('show active');
        }
        
        // Focus first input in modal
        setTimeout(function() {
            $modal.find('input:visible:first').focus();
        }, 150);
    });
}
