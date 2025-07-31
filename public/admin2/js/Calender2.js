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

    // Use dynamic events from server or fallback to empty array
    const events = window.calendarEvents || [];

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
                    dayNumber = dayCounter;
                    fullDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), dayNumber);
                    isCurrentMonthDay = true;
                    dayClass = 'current-month-day';
                    dayCounter++;
                } else {
                    html += `<div class="col day-cell month-view ${dayClass}"></div>`;
                    continue;
                }

                const dateString = fullDate.getFullYear() + '-' + 
                    String(fullDate.getMonth() + 1).padStart(2, '0') + '-' + 
                    String(fullDate.getDate()).padStart(2, '0');
                const dayEvents = events.filter(event => {
                    // Debug logging
                    console.log('Checking event:', event);
                    console.log('Current dateString:', dateString);
                    
                    // Prioritize start_date and end_date for date range events
                    if (event.start_date && event.end_date) {
                        // For holiday events, check if the date falls within the holiday range
                        const adjustedStartDate = new Date(event.start_date);
                        const adjustedEndDate = new Date(event.end_date);
                        
                        // Add one day to start date to ensure proper range
                        adjustedStartDate.setDate(adjustedStartDate.getDate() + 1);
                        
                        // Format dates consistently
                        const adjustedStartString = adjustedStartDate.getFullYear() + '-' + 
                            String(adjustedStartDate.getMonth() + 1).padStart(2, '0') + '-' + 
                            String(adjustedStartDate.getDate()).padStart(2, '0');
                        
                        const adjustedEndString = adjustedEndDate.getFullYear() + '-' + 
                            String(adjustedEndDate.getMonth() + 1).padStart(2, '0') + '-' + 
                            String(adjustedEndDate.getDate()).padStart(2, '0');
                        
                        const isInRange = dateString >= adjustedStartString && dateString <= adjustedEndString;
                        
                        console.log('Date range check:', {
                            start: adjustedStartString,
                            end: adjustedEndString,
                            current: dateString,
                            isInRange: isInRange
                        });
                        
                        return isInRange;
                    } else if (event.date) {
                        // Fallback for events with only date field
                        return event.date === dateString;
                    } else if (event.start_date) {
                        // Fallback for events with only start_date
                        const eventStartDate = new Date(event.start_date);
                        const eventStartString = eventStartDate.getFullYear() + '-' + 
                            String(eventStartDate.getMonth() + 1).padStart(2, '0') + '-' + 
                            String(eventStartDate.getDate()).padStart(2, '0');
                        return eventStartString === dateString;
                    }
                    return false;
                });
                
                const isToday = isCurrentMonthDay && fullDate.toDateString() === today.toDateString() ? 'today-highlight' : '';

                html += `<div class="col day-cell month-view ${dayClass} ${isToday}">`;
                html += `<div class="day-number">${dayNumber}</div>`;
                dayEvents.forEach(event => {
                    const eventClass = getEventClass(event.title);
                    // For holidays, only show "CUTI KHAS", for other events use title
                    const displayName = event.type === 'holiday' ? event.title : (event.full_title ? event.full_title : event.title);
                    const truncatedTitle = truncateText(displayName, 15);
                    const tooltipText = event.type === 'holiday' ? 'CUTI KHAS' : (event.full_title ? `${event.full_title}` : displayName);
                    
                    html += `<div class="event ${eventClass}" title="${tooltipText}">${truncatedTitle}</div>`;
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
            const dateString = day.getFullYear() + '-' + 
                String(day.getMonth() + 1).padStart(2, '0') + '-' + 
                String(day.getDate()).padStart(2, '0');
            const dayEvents = events.filter(event => {
                // Prioritize start_date and end_date for date range events
                if (event.start_date && event.end_date) {
                    // For holiday events, check if the date falls within the holiday range
                    const adjustedStartDate = new Date(event.start_date);
                    const adjustedEndDate = new Date(event.end_date);
                    
                    // Add one day to start date to ensure proper range
                    adjustedStartDate.setDate(adjustedStartDate.getDate() + 1);
                    
                    // Format dates consistently
                    const adjustedStartString = adjustedStartDate.getFullYear() + '-' + 
                        String(adjustedStartDate.getMonth() + 1).padStart(2, '0') + '-' + 
                        String(adjustedStartDate.getDate()).padStart(2, '0');
                    
                    const adjustedEndString = adjustedEndDate.getFullYear() + '-' + 
                        String(adjustedEndDate.getMonth() + 1).padStart(2, '0') + '-' + 
                        String(adjustedEndDate.getDate()).padStart(2, '0');
                    
                    return dateString >= adjustedStartString && dateString <= adjustedEndString;
                } else if (event.date) {
                    // Fallback for events with only date field
                    return event.date === dateString;
                } else if (event.start_date) {
                    // Fallback for events with only start_date
                    const eventStartDate = new Date(event.start_date);
                    const eventStartString = eventStartDate.getFullYear() + '-' + 
                        String(eventStartDate.getMonth() + 1).padStart(2, '0') + '-' + 
                        String(eventStartDate.getDate()).padStart(2, '0');
                    return eventStartString === dateString;
                }
                return false;
            });
            const isToday = day.toDateString() === today.toDateString() ? 'today-highlight' : '';
            const isTodayText = day.toDateString() === today.toDateString() ? 'today-header-highlight' : '';

            html += `<div class="col day-cell week-view current-month-day ${isToday}">`;
            html += `<div class="day-number ${isTodayText}">${day.getDate()}</div>`;
            html += `<div class="text-center w-100 mb-2 ${isTodayText}">${day.toLocaleDateString('en-US', { weekday: 'short' })}</div>`;
            dayEvents.forEach(event => {
                const eventClass = getEventClass(event.title);
                // For holidays, only show "CUTI KHAS", for other events use title
                const eventTitle = event.type === 'holiday' ? event.title : (event.holiday_name || event.title);
                const displayName = event.type === 'holiday' ? event.title : (event.full_title || eventTitle);
                const truncatedTitle = truncateText(displayName, 15);
                const tooltipText = event.type === 'holiday' ? 'CUTI KHAS' : (event.full_title ? `${event.full_title} - ${event.room} - ${event.user}` : `${eventTitle} - ${event.room} - ${event.user}`);
                const eventTime = event.time || 'All Day';
                
                html += `<div class="event ${eventClass}" title="${tooltipText}">${eventTime} ${truncatedTitle}</div>`;
            });
            html += `</div>`;
        }
        html += '</div>';
        calendarGrid.innerHTML = html;
    }

    function renderDayView() {
        let html = '';
        const dateString = currentDate.getFullYear() + '-' + 
            String(currentDate.getMonth() + 1).padStart(2, '0') + '-' + 
            String(currentDate.getDate()).padStart(2, '0');
        const dayEvents = events.filter(event => {
            // Prioritize start_date and end_date for date range events
            if (event.start_date && event.end_date) {
                // For holiday events, check if the date falls within the holiday range
                const adjustedStartDate = new Date(event.start_date);
                const adjustedEndDate = new Date(event.end_date);
                
                // Add one day to start date to ensure proper range
                adjustedStartDate.setDate(adjustedStartDate.getDate() + 1);
                
                // Format dates consistently
                const adjustedStartString = adjustedStartDate.getFullYear() + '-' + 
                    String(adjustedStartDate.getMonth() + 1).padStart(2, '0') + '-' + 
                    String(adjustedStartDate.getDate()).padStart(2, '0');
                
                const adjustedEndString = adjustedEndDate.getFullYear() + '-' + 
                    String(adjustedEndDate.getMonth() + 1).padStart(2, '0') + '-' + 
                    String(adjustedEndDate.getDate()).padStart(2, '0');
                
                return dateString >= adjustedStartString && dateString <= adjustedEndString;
            } else if (event.date) {
                // Fallback for events with only date field
                return event.date === dateString;
            } else if (event.start_date) {
                // Fallback for events with only start_date
                const eventStartDate = new Date(event.start_date);
                const eventStartString = eventStartDate.getFullYear() + '-' + 
                    String(eventStartDate.getMonth() + 1).padStart(2, '0') + '-' + 
                    String(eventStartDate.getDate()).padStart(2, '0');
                return eventStartString === dateString;
            }
            return false;
        });
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
                const eventClass = getEventClass(event.title);
                // For holidays, only show "CUTI KHAS", for other events use title
                const eventTitle = event.type === 'holiday' ? event.title : (event.holiday_name || event.title);
                const displayName = event.type === 'holiday' ? event.title : (event.full_title || eventTitle);
                const truncatedTitle = truncateText(displayName, 30);
                const eventTime = event.time || 'All Day';
                const eventDetails = event.type === 'holiday' ? 
                    `Holiday: ${event.description || 'No description'}` : 
                    `Room: ${event.room} | User: ${event.user} | Participants: ${event.participants}`;
                
                html += `<div class="event ${eventClass} mb-2 p-2">
                    <strong>${eventTime} - ${truncatedTitle}</strong><br>
                    <small>${eventDetails}</small>
                </div>`;
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
            let eventDate;
            if (event.date) {
                eventDate = new Date(event.date);
            } else if (event.start_date) {
                eventDate = new Date(event.start_date);
            } else {
                return false;
            }
            eventDate.setHours(0, 0, 0, 0);
            return eventDate >= todayNormalized;
        }).sort((a, b) => {
            const dateA = a.date ? new Date(`${a.date} ${a.time}`) : new Date(a.start_date);
            const dateB = b.date ? new Date(`${b.date} ${b.time}`) : new Date(b.start_date);
            return dateA - dateB;
        });

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

                const statusClass = getStatusClass(event.status);
                const eventStyle = `background-color: ${event.color}; color: white;`;
                // For holidays, only show "CUTI KHAS", for other events use title
                const eventTitle = event.type === 'holiday' ? event.title : (event.holiday_name || event.title);
                const eventTime = event.time || 'All Day';
                const eventDetails = event.type === 'holiday' ? 
                    `Holiday: ${event.description || 'No description'}` : 
                    `Room: ${event.room} | User: ${event.user} | Status: ${getStatusText(event.status)}`;
                
                html += `<div class="event ${statusClass} mb-2 p-2" style="${eventStyle}">
                    <strong>${eventTime} - ${eventTitle}</strong><br>
                    <small>${eventDetails}</small>
                </div>`;
            });
        } else {
            html += `<p class="text-muted text-center mt-3">No upcoming events.</p>`;
        }

        html += '</div></div>';
        calendarGrid.innerHTML = html;
    }

    function getEventClass(title) {
        const lowerTitle = title.toLowerCase();
        if (lowerTitle.includes('temuduga') || lowerTitle.includes('interview')) {
            return 'event-temuduga';
        } else if (lowerTitle.includes('mesyuarat') || lowerTitle.includes('meeting')) {
            return 'event-mesyuarat';
        } else {
            return getStatusClass(1); // Default to new status
        }
    }

    function truncateText(text, maxLength) {
        if (text.length <= maxLength) {
            return text;
        }
        return text.substring(0, maxLength) + '...';
    }

    function getStatusClass(status) {
        switch (status) {
            case 1: return 'status-new';
            case 2: return 'status-pending';
            case 3: return 'status-approved';
            case 4: return 'status-rejected';
            default: return 'status-default';
        }
    }

    function getStatusText(status) {
        switch (status) {
            case 1: return 'New';
            case 2: return 'Pending';
            case 3: return 'Approved';
            case 4: return 'Rejected';
            default: return 'Unknown';
        }
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
