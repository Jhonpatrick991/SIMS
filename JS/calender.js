        const now = new Date();
        const today = {
            day: now.getDate(),
            month: now.getMonth(),
            year: now.getFullYear()
        };

        function renderWeeklyCalendar(today) {
            const weekContainer = document.getElementById('weeklyCalendar');
            const dayNames = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            const base = new Date(today.year, today.month, today.day);
            const dayOffset = base.getDay() === 0 ? -6 : 1 - base.getDay();
            base.setDate(base.getDate() + dayOffset);
            weekContainer.innerHTML = '';

            for (let i = 0; i < 7; i++) {
                const dayDate = new Date(base);
                dayDate.setDate(base.getDate() + i);
                const isToday = dayDate.toDateString() === now.toDateString();

                const dayEl = document.createElement('div');
                dayEl.className = 'day' + (isToday ? ' today' : '');
                dayEl.innerHTML = `
                    <div class="day-name">${dayNames[i]}</div>
                    <div class="day-number">${dayDate.getDate()}</div>
                    ${isToday ? '<div class="event">Today</div>' : ''}
                `;
                weekContainer.appendChild(dayEl);
            }
        }

        function generateCalendar(month, year, tbodyId, titleId) {
            const tbody = document.getElementById(tbodyId);
            const title = document.getElementById(titleId);
            const date = new Date(year, month);
            const firstDay = (new Date(year, month, 1).getDay() + 6) % 7;
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const daysInPrevMonth = new Date(year, month, 0).getDate();

            title.textContent = date.toLocaleString('default', { month: 'long', year: 'numeric' });
            tbody.innerHTML = '';

            let day = 1;
            let nextMonthDay = 1;

            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');
                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('td');
                    const cellIndex = i * 7 + j;
                    if (cellIndex < firstDay) {
                        cell.textContent = daysInPrevMonth - firstDay + j + 1;
                        cell.className = 'other-month';
                    } else if (day > daysInMonth) {
                        cell.textContent = nextMonthDay++;
                        cell.className = 'other-month';
                    } else {
                        cell.textContent = day;
                        if (day === today.day && month === today.month && year === today.year) {
                            cell.classList.add('active');
                        }
                        day++;
                    }
                    row.appendChild(cell);
                }
                tbody.appendChild(row);
                if (day > daysInMonth) break;
            }
        }

        renderWeeklyCalendar(today);

        const prevMonth = today.month === 0 ? 11 : today.month - 1;
        const prevYear = today.month === 0 ? today.year - 1 : today.year;
        const nextMonth = today.month === 11 ? 0 : today.month + 1;
        const nextYear = today.month === 11 ? today.year + 1 : today.year;

        generateCalendar(prevMonth, prevYear, 'month1Body', 'month1Title');
        generateCalendar(today.month, today.year, 'month2Body', 'month2Title');
        generateCalendar(nextMonth, nextYear, 'month3Body', 'month3Title');