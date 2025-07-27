window.addEventListener("DOMContentLoaded", () => {
    const calendarGrid = document.getElementById('calendarGrid');
    const currentMonthYear = document.getElementById('currentMonthYear');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const todayBtn = document.getElementById('todayBtn');
    const monthViewBtn = document.getElementById('monthViewBtn');
    const weekViewBtn = document.getElementById('weekViewBtn');
    const dayViewBtn = document.getElementById('dayViewBtn');
    const agendaViewBtn = document.getElementById('agendaViewBtn');

    let currentDate = new Date();
    let currentView = 'month';
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const events = [];

    function renderCalendar() {
        if (!calendarGrid || !currentMonthYear) return;
        calendarGrid.innerHTML = '';
        updateHeader();

        switch (currentView) {
            case 'month': renderMonthView(); break;
            case 'week': renderWeekView(); break;
            case 'day': renderDayView(); break;
            case 'agenda': renderAgendaView(); break;
        }
    }

    function updateHeader() {
        const options = { year: 'numeric', month: 'long' };
        currentMonthYear.textContent = currentDate.toLocaleDateString('en-US', options);

        monthViewBtn?.classList.remove('active');
        weekViewBtn?.classList.remove('active');
        dayViewBtn?.classList.remove('active');
        agendaViewBtn?.classList.remove('active');

        switch (currentView) {
            case 'month':
                monthViewBtn?.classList.add('active');
                currentMonthYear.textContent = currentDate.toLocaleDateString('en-US', options);
                break;
            case 'week':
                weekViewBtn?.classList.add('active');
                const startOfWeek = new Date(currentDate);
                startOfWeek.setDate(currentDate.getDate() - (currentDate.getDay() === 0 ? 6 : currentDate.getDay() - 1));
                const endOfWeek = new Date(startOfWeek);
                endOfWeek.setDate(startOfWeek.getDate() + 6);
                currentMonthYear.textContent = `${startOfWeek.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })} - ${endOfWeek.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}`;
                break;
            case 'day':
                dayViewBtn?.classList.add('active');
                currentMonthYear.textContent = currentDate.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                break;
            case 'agenda':
                agendaViewBtn?.classList.add('active');
                currentMonthYear.textContent = 'Upcoming Events';
                break;
        }
    }

    function renderMonthView() {
        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
        const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
        const startDayOfWeek = (firstDay === 0) ? 6 : firstDay - 1;
        const prevMonthLastDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();

        let dayCounter = 1;
        let html = '';

        for (let i = 0; i < 6; i++) {
            html += '<div class="row no-gutters">';
            for (let j = 0; j < 7; j++) {
                let dayNumber;
                let fullDate;
                let isCurrentMonthDay = false;
                let dayClass = 'other-month-day';

                if (i === 0 && j < startDayOfWeek) {
                    html += `<div class="col day-cell month-view ${dayClass}"></div>`;
                    continue;
                } else if (dayCounter <= daysInMonth) {
                    dayNumber = dayCounter++;
                    fullDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), dayNumber);
                    isCurrentMonthDay = true;
                    dayClass = 'current-month-day';
                } else {
                    html += `<div class="col day-cell month-view ${dayClass}"></div>`;
                    continue;
                }

                const dateString = fullDate.toISOString().split('T')[0];
                const dayEvents = events.filter(event => event.date === dateString);
                const isToday = isCurrentMonthDay && fullDate.toDateString() === today.toDateString() ? 'today-highlight' : '';

                html += `<div class="col day-cell month-view ${dayClass} ${isToday}">`;
                html += `<div class="day-number">${dayNumber}</div>`;
                dayEvents.forEach(event => {
                    html += `<div class="event ${event.type === 'meeting' ? 'meeting' : ''}">${event.time} ${event.title}</div>`;
                });
                html += `</div>`;
            }
            html += '</div>';
            if (dayCounter > daysInMonth && startDayOfWeek > 0 && i > 3) break;
        }

        calendarGrid.innerHTML = html;
    }

    function renderWeekView() {
        let html = '';
        const dayOfWeek = currentDate.getDay() === 0 ? 6 : currentDate.getDay() - 1;
        const startOfWeek = new Date(currentDate);
        startOfWeek.setDate(currentDate.getDate() - dayOfWeek);

        html += '<div class="row no-gutters">';
        for (let i = 0; i < 7; i++) {
            const day = new Date(startOfWeek);
            day.setDate(startOfWeek.getDate() + i);
            const dateString = day.toISOString().split('T')[0];
            const dayEvents = events.filter(event => event.date === dateString);
            const isToday = day.toDateString() === today.toDateString() ? 'today-highlight' : '';
            const isTodayText = day.toDateString() === today.toDateString() ? 'today-header-highlight' : '';

            html += `<div class="col day-cell week-view current-month-day ${isToday}">`;
            html += `<div class="day-number ${isTodayText}">${day.getDate()}</div>`;
            html += `<div class="text-center w-100 mb-2 ${isTodayText}">${day.toLocaleDateString('en-US', { weekday: 'short' })}</div>`;
            dayEvents.forEach(event => {
                html += `<div class="event ${event.type === 'meeting' ? 'meeting' : ''}">${event.time} ${event.title}</div>`;
            });
            html += `</div>`;
        }
        html += '</div>';
        calendarGrid.innerHTML = html;
    }

    function renderDayView() {
        let html = '';
        const dateString = currentDate.toISOString().split('T')[0];
        const dayEvents = events.filter(event => event.date === dateString);
        const isToday = currentDate.toDateString() === today.toDateString() ? 'today-highlight' : '';
        const isTodayText = currentDate.toDateString() === today.toDateString() ? 'today-header-highlight' : '';

        html += '<div class="row no-gutters justify-content-center">';
        html += `<div class="col-12 col-md-8 day-cell day-view current-month-day ${isToday}">`;
        html += `<div class="day-number ${isTodayText}">${currentDate.getDate()}</div>`;
        html += `<h5 class="text-center w-100 mb-3 ${isTodayText}">${currentDate.toLocaleDateString('en-US', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        })}</h5>`;
        if (dayEvents.length > 0) {
            dayEvents.forEach(event => {
                html += `<div class="event ${event.type === 'meeting' ? 'meeting' : ''}">${event.time} ${event.title}</div>`;
            });
        } else {
            html += `<p class="text-muted text-center mt-3">No events for this day.</p>`;
        }
        html += `</div></div>`;
        calendarGrid.innerHTML = html;
    }

    function renderAgendaView() {
        let html = '';
        const todayNormalized = new Date();
        todayNormalized.setHours(0, 0, 0, 0);
        const upcomingEvents = events.filter(event => {
            const eventDate = new Date(event.date);
            eventDate.setHours(0, 0, 0, 0);
            return eventDate >= todayNormalized;
        }).sort((a, b) => new Date(`${a.date} ${a.time}`) - new Date(`${b.date} ${b.time}`));

        html += '<div class="row no-gutters justify-content-center">';
        html += `<div class="col-12 col-md-10"><h5 class="mb-3">Upcoming Events</h5>`;

        if (upcomingEvents.length > 0) {
            let lastDate = '';
            upcomingEvents.forEach(event => {
                const eventDate = new Date(event.date);
                const formattedDate = eventDate.toLocaleDateString('en-US', {
                    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
                });

                if (formattedDate !== lastDate) {
                    html += `<h6 class="mt-4 mb-2 text-primary">${formattedDate}</h6>`;
                    lastDate = formattedDate;
                }

                html += `<div class="event ${event.type === 'meeting' ? 'meeting' : ''}">${event.time} - ${event.title}</div>`;
            });
        } else {
            html += `<p class="text-muted text-center mt-3">No upcoming events.</p>`;
        }

        html += '</div></div>';
        calendarGrid.innerHTML = html;
    }

    // Safe event listeners
    prevBtn?.addEventListener('click', () => {
        if (currentView === 'month') currentDate.setMonth(currentDate.getMonth() - 1);
        else if (currentView === 'week') currentDate.setDate(currentDate.getDate() - 7);
        else if (currentView === 'day') currentDate.setDate(currentDate.getDate() - 1);
        else currentDate = new Date();
        renderCalendar();
    });

    nextBtn?.addEventListener('click', () => {
        if (currentView === 'month') currentDate.setMonth(currentDate.getMonth() + 1);
        else if (currentView === 'week') currentDate.setDate(currentDate.getDate() + 7);
        else if (currentView === 'day') currentDate.setDate(currentDate.getDate() + 1);
        else currentDate = new Date();
        renderCalendar();
    });

    todayBtn?.addEventListener('click', () => {
        currentDate = new Date();
        currentView = 'month';
        renderCalendar();
    });

    monthViewBtn?.addEventListener('click', () => { currentView = 'month'; renderCalendar(); });
    weekViewBtn?.addEventListener('click', () => { currentView = 'week'; renderCalendar(); });
    dayViewBtn?.addEventListener('click', () => { currentView = 'day'; renderCalendar(); });
    agendaViewBtn?.addEventListener('click', () => { currentView = 'agenda'; renderCalendar(); });

    // Initial render
    renderCalendar();
});
