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
    defaultOfficeId: 1,
    eventDataParam: 'appId',
    _setCookie: function (key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    },

    _getCookie: function (key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    },

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
        var officeId = me.getOfficeId();

        me._officeId = officeId;
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
            slotDuration:   '00:30:01',
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
                    officeId: me.getOfficeId(),
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
        calendar.fullCalendar('removeEventSource', me.getEventsUrl());
        me.setOfficeId(officeId);
        calendar.fullCalendar('addEventSource', me.getEventsUrl());
    },
    /**
     * @returns {integer}
     */
    getOfficeId: function()
    {
        var me = BackOffice.Calendar;
        if (me._officeId != null) {
            console.log("Start officeId",me._officeId);
            return me._officeId;
        }
        var officeId = me._getCookie('officeId');
        if (officeId != null) {
            me._officeId = officeId;
            console.log("Center officeId",me._officeId);
            return me._officeId;
        }
        me.setOfficeId(me.defaultOfficeId);
    console.log("End officeId",me._officeId);
        return me._officeId;
    },

    setOfficeId: function(officeId) {
        var me = BackOffice.Calendar;
        me._officeId = officeId;
        me._setCookie('officeId', officeId);
    },

    update: function(){
        var me = BackOffice.Calendar;
        me.getCalendar().fullCalendar('refetchEvents');
    }

};
