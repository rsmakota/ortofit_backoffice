/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Calendar = {
    workHours:    null,
    eventsUrl:    null,
    eventDataUrl: null,
    formUrl:      null,

    isWorkTime: function (day, hour) {
        var current = this.workHours[day];
        if((current.start > hour) || (current.end <= hour)) {
            return false;
        }

        return true;
    },

    initWorkHours: function(url) {
        var me = this;
        BackOffice.Transport.send(url, null, function(workHours){
            me.workHours = workHours;
        });
    },

    init: function (officeId, doctorId) {
        var me = this;
        var modal = BackOffice.Modal;
        $('#calendar'+officeId).fullCalendar({
            header: {
                left:   'prev,next today',
                center: 'title',
                right:  'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'сегодня',
                month: 'месяц',
                week:  'неделя',
                day:   'день'
            },

            monthNames:     ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort:['Янв.','Фев.','Мрт.','Апр.','Май','Июн','Июл','Авг.','Сен.','Окт.','Нбр.','Дек.'],
            dayNames:       ['Воскресенье','Понедельник','Вторник','Среда','Чеверг','Пятница','Суббота'],
            dayNamesShort:  ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            timeFormat:     'H:mm',
            axisFormat:     'H:mm',
            firstHour:      9,
            allDaySlot:     false,
            slotDuration:   '00:30:01',
            defaultView:    'agendaWeek',
            firstDay:       1,
            minTime:        "09:00:00",
            maxTime:        "19:30:00",
            events:         me.eventsUrl+'?office_id='+officeId,
            editable:       false,
            droppable:      false,
            selectable:     true,
            eventClick:     function (calEvent, jsEvent, view) {
                modal.load(me.eventDataUrl+'?appId='+calEvent.id, {});
            },
            dayClick: function (date, jsEvent, view) {
                if (null == doctorId) {
                    return false;
                }

                var data = {
                    officeId: officeId,
                    doctorId:   doctorId,
                    date:     date.format("DD/MM/YYYY"),
                    time:     date.format("HH:mm")
                };
                modal.load(me.formUrl, data);
            }

        });
    }
};
