function toggleDropdown(el) {
    const menu = el.nextElementSibling;
    menu.classList.toggle('show');
    s
    el.classList.toggle('active');
}

function toggleUserDropdown(el) {
    const menu = el.querySelector('.user_dropdown');
    menu.classList.toggle('show');
    el.classList.toggle('active');
}

// Close dropdowns if click outside
document.addEventListener('click', function(event) {
    // Check if the click was inside the User dropdown or any dropdown-toggle
    const isClickInsideUser = event.target.closest('.User');
    const isClickInsideDropdownToggle = event.target.closest('.dropdown-toggle');

    // If clicked outside both, close all dropdowns
    if (!isClickInsideUser && !isClickInsideDropdownToggle) {
        // Close user dropdown
        document.querySelectorAll('.user_dropdown.show').forEach(menu => {
            menu.classList.remove('show');
            menu.parentElement.classList.remove('active');
        });

        // Close sidebar dropdowns
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
            if (menu.previousElementSibling) {
                menu.previousElementSibling.classList.remove('active');
            }
        });
    }
});