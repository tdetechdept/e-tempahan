window.addEventListener("DOMContentLoaded", () => {
    const currentDateElem1 = document.querySelector(".calendar1-current-date");
    const datesContainer1 = document.querySelector(".calendar1-dates");
    const prevBtn1 = document.getElementById("calendar1-prev");
    const nextBtn1 = document.getElementById("calendar1-next");

    let currentDate1 = new Date();
    let selectedDate1 = null;

    function renderCalendar1() {
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

                const inputField = document.getElementById("datepicker1");
                if (inputField) {
                    inputField.value = selectedDate1.toISOString().split("T")[0];
                }
            });

            datesContainer1.appendChild(li);
        }
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