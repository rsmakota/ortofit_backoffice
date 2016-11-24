BackOffice.Report = {
    postUrl:       null,
    defaultDate:   null,
    format:        'yyyy-mm-dd',
    regDate:       /^\d{4}-\d{2}-\d{2}$/,
    locale:        'ru',
    formatErrText: 'Поле дата не в формате (2016-10-23) или пустое',
    rangeErrText:  'Не верный диапазон дат',

    init: function()
    {
        var hlp = BackOffice.ReportHelper;
        var me = this;
        hlp.getReportBtn().click(me._btnHandler);
        me.datePickerInit();
    },

    datePickerInit: function () {
        var hlp = BackOffice.ReportHelper;
        var dp  = hlp.getDateInputEl();
        var me  = this;
        dp.datepicker({
            todayHighlight: true,
            language:       me.locale,
            format:         me.format
        });
        dp.val(me.defaultDate);
        dp.click(hlp.cleanErrors);
    },

    /**
     * @param {string} dateStr
     * @returns {boolean}
     */
    isDate: function (dateStr) {
        var me = BackOffice.Report;
        return me.regDate.test(dateStr);
    },

    /**
     * @param {string} dateFrom
     * @param {string} dateTo
     *
     * @returns {boolean}
     */
    isRange: function (dateFrom, dateTo) {
        var range = Date.parse(dateTo) - Date.parse(dateFrom);

        return range >= 0;
    },

    validate: function () {
        var hlp          = BackOffice.ReportHelper;
        var me           = BackOffice.Report;
        var dateInputEls = hlp.getDateInputEl();
        var errTextEl    = hlp.getErrTextEl();
        var dateFromEl   = hlp.getDateFromEl();
        var dateToEl     = hlp.getDateToEl();
        var isErr      = false;
        dateInputEls.each(function () {
            if(!me.isDate($(this).val())) {
                hlp.setErrToEl($(this));
                isErr = true;
            }
            if (isErr) {
                errTextEl.text(me.formatErrText);
                errTextEl.show();
            }

        });

        if (!me.isRange(dateFromEl.val(), dateToEl.val())) {
            hlp.setErrToEl(dateInputEls);
            hlp.getErrTextEl().text(me.rangeErrText);
            hlp.getErrTextEl().show();
            isErr = true;
        }

        return !isErr;
    },

    _btnHandler: function() {
        var me = BackOffice.Report;
        var hlp = BackOffice.ReportHelper;
        hlp.getErrorReportDivEl().hide();
        if (!me.validate()) {
            return false;
        }
        BackOffice.Transport.send(me.postUrl, hlp.getData(), me._renderResponse);

    },

    _renderResponse: function (msg) {
        var me = BackOffice.Report;
        var hlp      = BackOffice.ReportHelper;
        var response = msg;
        var report_div = hlp.getReportPlace();
        if (response.success != 'ok') {
            hlp.getErrorReportDivEl().show();
        }
        var data     = response.data;
        var content = '<table class="table"><tbody>';
        for (var i=0; i < data.length; i++) {
            console.log(data[i].userName);
            content += '<tr class=""><td colspan="2"><h4>'+data[i].userName+'</h4></td></tr>';
            content += '<tr class="active" ><td><strong>Услуга</strong></td><td><strong>Количество</strong></td></tr>';
            content += me._createUsrContent(data[i].service);
        }
        content += '</tbody></table>';
        report_div.html(content);
    },

    _createUsrContent: function (services) {
        var content = '';
        for(var i=0; i<services.length; i++) {
            if ('insole' in services[i]) {
                console.log(services[i].insole);
                content += '<tr class="warning"><td>'+services[i].serviceName+'</td><td><table><tbody>';
                var total = 0;
                for (var j=0; j<services[i].insole.length; j++) {
                    content += '<tr><td>'+services[i].insole[j].type + ': </td><td>&nbsp;&nbsp;'+ services[i].insole[j].count + '</td> </tr>';
                    total += services[i].insole[j].count;
                }
                content += '<tr><td><strong>Всего:</strong> </td><td>&nbsp;&nbsp;'+ total + '</td> </tr>';
                content += '</tbody></table></td></tr>'
            } else {
                content += '<tr><td>'+services[i].serviceName+'</td><td>'+ services[i].count + '</td></tr>';
            }
        }

        return content;
    }
};
