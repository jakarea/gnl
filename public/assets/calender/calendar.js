$(document).ready(function () {
    var currentDate = new Date();
    var currentMonth = currentDate.getMonth();
    var currentYear = currentDate.getFullYear();
    var $calendar = $('#calendar');
    var $currentMonthYear = $('#currentMonthYear');

    function generateCalendar(month, year) {
        var firstDay = new Date(year, month, 1);
        var lastDay = new Date(year, month + 1, 0);
        var daysInMonth = lastDay.getDate();

        var html = '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';

        var day = 1;
        for (var i = 0; i < 6; i++) {
            html += '<tr>';
            for (var j = 0; j < 7; j++) {
                if ((i === 0 && j < firstDay.getDay()) || day > daysInMonth) {
                    html += '<td></td>';
                } else {
                    var cellClass = (day === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate.getFullYear()) ? 'selected' : '';
                    html += '<td class="' + cellClass + '">' + day + '</td>';
                    day++;
                }
            }
            html += '</tr>';
            if (day > daysInMonth) {
                break; // Exit the loop when all days are added
            }
        }

        return html;
    }

    function updateCalendar() {
        $calendar.html(generateCalendar(currentMonth, currentYear));
        $currentMonthYear.text(getMonthName(currentMonth) + ' ' + currentYear);
        getTaskByCalendarDate();
    }


    // get schedule data by click
    function getTaskByCalendarDate() {
        $('td', $calendar).click(function () {
            var day = $(this).text();

            var selectedZone = new Date(currentYear, currentMonth, day);

            var selectedDate = selectedZone.getFullYear() + '-' +
                            ('0' + (selectedZone.getMonth() + 1)).slice(-2) + '-' +
                            ('0' + selectedZone.getDate()).slice(-2);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "/to-do-list/taskbydate",
                method: 'POST',
                data: { date: selectedDate },
                success: function (res) {
                    $(".showTaskByDate").html(res);
                },
                error: function (error) {
                    console.error('AJAX error:', error);
                }
            });
        });
    }


    updateCalendar();

    $('#prevMonth').click(function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        updateCalendar();
    });

    $('#nextMonth').click(function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        updateCalendar();
    });

    function getMonthName(month) {
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return monthNames[month];
    }
});
