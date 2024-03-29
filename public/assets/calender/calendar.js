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

            $('td', $calendar).css('border', 'none');

            $(this).css({ 'border': '1px solid rgb(67 108 255)', 'border-radius': '0.5rem' });

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
                    displayTasks(res.dateWiseTasks);
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






    displayTasks([]);

    displayCurrentDateEvents();
    getTaskByCalendarDate();


    function displayCurrentDateEvents() {
        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().split('T')[0];

        // Call the function to fetch events for the current date
        getEventsForDate(formattedDate, function (events) {
            displayTasks(events);
        });
    }

    function getEventsForDate(date, callback) {

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/to-do-list/taskbydate",
            method: 'POST',
            data: { date: date },
            success: function (res) {
                callback(res.dateWiseTasks);
            },
            error: function (error) {
                console.error("Error fetching events:", error);
            }
        });
    }



    function displayTasks(tasks) {
        var taskListContainer = $('.task-list-box-inner');
        // Clear existing content
        taskListContainer.empty();

        // Define time slots
        var timeSlots = ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM', '8:00 PM'];

        // Loop through time slots and dynamically create HTML
        timeSlots.forEach(function (timeSlot) {

            var matchingTask = tasks.find(function (task) {
                return isTaskInTimeSlot(task, timeSlot);
            });

            var timeBoxHTML = '<div class="single-task-box">' +
                '<div class="time-box">' +
                '<span class="time">' + timeSlot + '</span>' +
                '</div>' +
                '<div class="task-info-box">';

            // Append task information if available
            if (matchingTask) {

                // Parse the time strings
                let startTimeString = matchingTask.start_time;
                let endTimeString = matchingTask.end_time;

                let startDate = new Date("2000-01-01 " + startTimeString);
                let endDate = new Date("2000-01-01 " + endTimeString);

                // Calculate the time difference in milliseconds
                let timeDifference = endDate - startDate;

                // Convert milliseconds to hours
                let hoursDifference = Math.ceil(timeDifference / (1000 * 60 * 60));

                var adjustHeight = '';

                for (var i = 2; i <= 6; i++) {
                    if (hoursDifference === i) {
                        adjustHeight = 'h-' + (170 + (i - 2) * 85);
                        break;
                    }
                }

                // var adjustHeight = calculatePosition(startTimeString, endTimeString);

                timeBoxHTML += `<div class="task-info ${adjustHeight}">
                <h4> ${matchingTask.title} </h4>
                <div class="timespan"> ${matchingTask.start_time} - ${matchingTask.end_time} </div>
                </div>
                <div class="box-divider"></div>`;
            }

            timeBoxHTML += '</div>' +
                '</div>';

            // Append the HTML to the container
            taskListContainer.append(timeBoxHTML);
        });

        // Task time slots
        function isTaskInTimeSlot(task, timeSlot) {
            var taskStartTime = parseTimeString(task.start_time);
            var taskEndTime = parseTimeString(task.end_time);
            var slotStartTime = parseTimeString(timeSlot);
            var slotEndTime = addMinutes(slotStartTime, 59);
            return (taskStartTime >= slotStartTime && taskStartTime <= slotEndTime);
        }

        // Function to parse time string and convert it to minutes
        function parseTimeString(timeString) {
            var parts = timeString.split(':');
            var hours = parseInt(parts[0], 10);
            var minutes = parseInt(parts[1], 10);

            if (timeString.includes('PM') && hours !== 12) {
                hours += 12;
            } else if (timeString.includes('AM') && hours === 12) {
                hours = 0;
            }
            return hours * 60 + minutes;
        }

        // Function to add minutes to a time represented in minutes
        function addMinutes(timeInMinutes, minutesToAdd) {
            return timeInMinutes + minutesToAdd;
        }

        function calculatePosition(startTime, endTime) {
            var baseHeight = 75;
            var startTime = startTime.split(':');
            var endTime = endTime.split(':');
            var hourDifference = Math.abs(startTime[0] - endTime[0]) + 1;
            var result = baseHeight * hourDifference;
            return result;
        }
    }















});
