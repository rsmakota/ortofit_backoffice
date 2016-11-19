/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Calendar = {
    workHours:       null,
    eventsUrl:       null,
    eventDataUrl:    null,
    formUrl:         null,
    _officeId:       null,
    eventDataParam: 'appId',

    getCalendar: function()
    {
        return $('#calendar');
    },

    getEventsUrl: function()
    {
        return BackOffice.Calendar.eventsUrl+'?office_id='+BackOffice.Calendar._officeId;
    },

    init: function (doctorId) {
        var me       = BackOffice.Calendar;
        var modal    = BackOffice.Modal;

        me._officeId = BackOffice.OfficeHelper.getOfficeId();
        me.getCalendar().fullCalendar({
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
            slotDuration:   '00:15:01',
            defaultView:    'agendaWeek',
            firstDay:       1,
            minTime:        "09:00:00",
            maxTime:        "19:30:00",
            events:         me.getEventsUrl(),
            editable:       false,
            droppable:      false,
            selectable:     true,
            textEscape:     false,
            eventClick:     function (calEvent) {
                modal.load(me.eventDataUrl+'?'+me.eventDataParam+'='+calEvent.id, {});
            },

            dayClick: function (date) {
                // if (null == doctorId) {
                //     return false;
                // }

                var data = {
                    officeId: BackOffice.OfficeHelper.getOfficeId(),
                    doctorId: doctorId,
                    date:     date.format("DD/MM/YYYY"),
                    time:     date.format("HH:mm"),
                    location: "calendar"
                };
                modal.load(me.formUrl, data);
            }

        });
    },

    reInit: function(officeId) {
        var me = BackOffice.Calendar;
        var calendar = me.getCalendar();
        if (me._officeId == officeId) {
            return;
        }
        calendar.fullCalendar('removeEventSource', me.getEventsUrl());
        me._officeId = officeId;
        // BackOffice.OfficeHelper.setOfficeId(officeId);
        calendar.fullCalendar('addEventSource', me.getEventsUrl());
    },

    update: function(){
        var me = BackOffice.Calendar;
        me.getCalendar().fullCalendar('refetchEvents');
    }

};
