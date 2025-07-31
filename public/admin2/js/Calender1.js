window.addEventListener("DOMContentLoaded", () => {
    const currentDateElem1 = document.querySelector(".calendar1-current-date");
    const datesContainer1 = document.querySelector(".calendar1-dates");
    const prevBtn1 = document.getElementById("calendar1-prev");
    const nextBtn1 = document.getElementById("calendar1-next");

    let currentDate1 = new Date();
    let selectedDate1 = null;

    async function renderCalendar1() {
        const year = currentDate1.getFullYear();
        const month = currentDate1.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Update month/year display
        if (currentDateElem1) {
            currentDateElem1.textContent = currentDate1.toLocaleString("default", {
                month: "long",
                year: "numeric",
            });
        }

        // Clear and prepare date grid
        if (!datesContainer1) return;
        datesContainer1.innerHTML = "";

        // Fill empty slots before 1st of month
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement("li");
            datesContainer1.appendChild(emptyCell);
        }

        // Fill actual days
        for (let i = 1; i <= daysInMonth; i++) {
            const date = new Date(year, month, i);
            const li = document.createElement("li");
            const p = document.createElement("p");
            p.textContent = i;

            const today = new Date();
            if (
                date.getDate() === today.getDate() &&
                date.getMonth() === today.getMonth() &&
                date.getFullYear() === today.getFullYear()
            ) {
                p.classList.add("today");
            }

            // Check if this date has a holiday
            const dateString = date.toISOString().split('T')[0];
            const holiday = window.holidaysData.find(h => {
                const startDate = new Date(h.start_date);
                const endDate = new Date(h.end_date);
                // Add one day before start date to ensure both are included
                startDate.setDate(startDate.getDate() - 1);
                // Check if the current date falls within the holiday range (inclusive)
                return date >= startDate && date <= endDate;
            });

            if (holiday) {
                li.classList.add("holiday");
                li.title = holiday.holiday_name || holiday.full_title || 'Holiday';
                // Removed holiday name display from calendar cell
            }

            if (
                selectedDate1 &&
                date.getDate() === selectedDate1.getDate() &&
                date.getMonth() === selectedDate1.getMonth() &&
                date.getFullYear() === selectedDate1.getFullYear()
            ) {
                li.classList.add("selected");
            }

            li.appendChild(p);

            li.addEventListener("click", () => {
                selectedDate1 = date;
                renderCalendar1();
                renderEventListForDate(date); // Show only for this date

                const inputField = document.getElementById("datepicker1");
                if (inputField) {
                    inputField.value = selectedDate1.toISOString().split("T")[0];
                }
            });

            datesContainer1.appendChild(li);
        }
        // After rendering all days in renderCalendar1
        if (typeof renderEventListForMonth === "function") {
            renderEventListForMonth(month, year);
        }
    }

    // Note: renderEventListForMonth is defined in the dashboard view
    // This function is called from renderCalendar1 to update the event list

    function renderEventListForDate(date) {
        const eventListContainer = document.getElementById('calendar1-events-list');
        if (!eventListContainer) return;
        const dateString = date.toISOString().split('T')[0];
        const dateEvents = window.holidaysData.filter(event => {
            // Add one day before start date to ensure both are included
            const adjustedStartDate = new Date(event.start_date);
            adjustedStartDate.setDate(adjustedStartDate.getDate() - 1);
            const adjustedStartString = adjustedStartDate.toISOString().split('T')[0];
            
            const adjustedEndDate = new Date(event.end_date);
            const adjustedEndString = adjustedEndDate.toISOString().split('T')[0];
            
            return dateString >= adjustedStartString && dateString <= adjustedEndString;
        });
        let html = '';
        if (dateEvents.length === 0) {
            html = '<p><strong><span class="dot"></span> Tiada cuti khas untuk tarikh ini</strong></p>';
        } else {
            dateEvents.forEach(event => {
                const dateStr = new Date(event.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short' });
                html += `<p><strong><span class="dot"></span> ${dateStr} : ${event.holiday_name}</strong></p>`;
            });
        }
        eventListContainer.innerHTML = html;
    }

    // Navigation buttons
    if (prevBtn1) {
        prevBtn1.addEventListener("click", () => {
            currentDate1.setMonth(currentDate1.getMonth() - 1);
            renderCalendar1();
        });
    }

    if (nextBtn1) {
        nextBtn1.addEventListener("click", () => {
            currentDate1.setMonth(currentDate1.getMonth() + 1);
            renderCalendar1();
        });
    }

    // Initial render
    
    renderCalendar1();
});