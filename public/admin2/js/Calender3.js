document.addEventListener('DOMContentLoaded', () => {

    // Function to initialize a calendar
    function initializeCalendar(containerId) {
        const container = document.getElementById(containerId);
        if (!container) return; // Exit if container not found

        const dateInput = document.querySelector(`.datepicker[data-calendar-id="${containerId.replace('calendarContainer', 'calendar')}"]`);
        const calendarTable = container.querySelector('.calendar-table');
        const monthDisplay = container.querySelector('.month-display');
        const prevMonthBtn = container.querySelector('.prev-month-btn');
        const nextMonthBtn = container.querySelector('.next-month-btn');

        let currentMonth = new Date(); // Represents the month currently displayed in this calendar

        // Function to render the calendar for a given month
        function renderCalendar(date) {
            monthDisplay.textContent = date.toLocaleString('en-US', { month: 'long', year: 'numeric' });

            const year = date.getFullYear();
            const month = date.getMonth(); // 0-indexed month

            // Get the first day of the month (0 = Sunday, 1 = Monday, etc.)
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate(); // Last day of current month
            const daysInPrevMonth = new Date(year, month, 0).getDate(); // Last day of previous month

            let calendarHTML = '';
            let dayCounter = 1;

            // Clear existing dates in the table body
            const tbody = calendarTable.querySelector('tbody');
            tbody.innerHTML = '';

            for (let i = 0; i < 6; i++) { // Max 6 rows for a month
                let rowHTML = '<tr>';
                for (let j = 0; j < 7; j++) { // 7 days a week
                    let displayDay;
                    let classList = [];
                    let fullDate = null; // To store the actual date for comparison

                    if (i === 0 && j < firstDayOfMonth) {
                        // Days from previous month
                        displayDay = daysInPrevMonth - firstDayOfMonth + j + 1;
                        classList.push('text-muted');
                        fullDate = new Date(year, month - 1, displayDay);
                    } else if (dayCounter > daysInMonth) {
                        // Days from next month
                        displayDay = dayCounter - daysInMonth;
                        classList.push('text-muted');
                        fullDate = new Date(year, month + 1, displayDay);
                        dayCounter++; // Increment even for next month's dates
                    } else {
                        // Current month's days
                        displayDay = dayCounter;
                        fullDate = new Date(year, month, dayCounter);

                        // Highlight today's date if it's in the current month
                        if (new Date().toDateString() === fullDate.toDateString()) {
                            classList.push('text-info'); 
                        }

                        // Highlight selected date for THIS calendar's input
                        if (dateInput.value && new Date(dateInput.value).toDateString() === fullDate.toDateString()) {
                            classList.push('highlighted-date'); 
                        }
                        dayCounter++;
                    }
                    // Create date string directly to avoid timezone issues
                    const dateString = fullDate ? `${fullDate.getFullYear()}-${String(fullDate.getMonth() + 1).padStart(2, '0')}-${String(fullDate.getDate()).padStart(2, '0')}` : '';
                    rowHTML += `<td class="${classList.join(' ')}" data-date="${dateString}"><p>${displayDay}</p></td>`;
                }
                rowHTML += '</tr>';
                
                // Only add a row if it contains actual dates or is the first row (for alignment)
                // This prevents empty rows at the end if the month fits into fewer than 6 weeks
                if (dayCounter <= daysInMonth + (7 - (firstDayOfMonth + daysInMonth) % 7) || i === 0) { 
                    calendarHTML += rowHTML;
                } else if (i > 0 && dayCounter > daysInMonth) {
                    // If the next row would only contain muted dates from the next month and we're not in the first row,
                    // we can stop rendering if all current month's dates are displayed.
                    break;
                }
            }
            tbody.innerHTML = calendarHTML;
        }

        // Event listener for clicking on a date
        calendarTable.addEventListener('click', (event) => {
            const clickedCell = event.target.closest('td');
            if (clickedCell && clickedCell.dataset.date) { // Ensure it's a date cell and has a data-date
                // Use the data-date directly to avoid timezone issues
                dateInput.value = clickedCell.dataset.date; // Format as YYYY-MM-DD                // Remove previous highlight within THIS calendar's table
                const previouslyHighlighted = calendarTable.querySelector('.highlighted-date');
                if (previouslyHighlighted) {
                    previouslyHighlighted.classList.remove('highlighted-date');
                }
                // Add highlight to the new selected date
                clickedCell.classList.add('highlighted-date');
            }
        });

        // Event listeners for month navigation
        prevMonthBtn.addEventListener('click', () => {
            currentMonth.setMonth(currentMonth.getMonth() - 1);
            renderCalendar(currentMonth);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentMonth.setMonth(currentMonth.getMonth() + 1);
            renderCalendar(currentMonth);
        });

        // Initial render
        renderCalendar(currentMonth);

        // Update calendar display if the date input is manually changed
        dateInput.addEventListener('change', () => {
            if (dateInput.value) {
                const inputDate = new Date(dateInput.value);
                if (!isNaN(inputDate)) { // Check if the date is valid
                    currentMonth = new Date(inputDate.getFullYear(), inputDate.getMonth(), 1);
                    renderCalendar(currentMonth);
                }
            }
        });
    }

    // Initialize both calendars
    initializeCalendar('calendarContainer1');
    initializeCalendar('calendarContainer2');
});