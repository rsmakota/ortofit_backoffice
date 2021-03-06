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
        BackOffice.OfficeHelper.getTabEl().click(BackOffice.Report._eraseUsrContent);
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
            content += '<tr class=""><td colspan="2"><h4>'+data[i].userName+'</h4></td></tr>';
            content += '<tr class="active" ><td><strong>Услуга</strong></td><td><strong>Количество</strong></td></tr>';
            content += me._createServiceContent(data[i].service);
            content += me._createForwarderContent(data[i].forwarders, data[i].flyers);
        }
        content += '</tbody></table>';
        report_div.html(content);
    },

    _createServiceContent: function (services) {
        var content = '';
        for(var i=0; i<services.length; i++) {
            if ('insole' in services[i]) {
                content += '<tr class="sucsess"><td>'+services[i].serviceName+'</td><td><table><tbody>';
                var total = 0;
                for (var j=0; j<services[i].insole.length; j++) {
                    content += '<tr><td>'
                        + services[i].insole[j].type + ': </td><td>&nbsp;&nbsp;'
                        + services[i].insole[j].count + ' ( ' + services[i].insole[j].sizes +' )'+
                        '</td> </tr>';
                    total += services[i].insole[j].count;
                }
                content += '<tr><td><strong>Всего:</strong> </td><td>&nbsp;&nbsp;'+ total + '</td> </tr>';
                content += '</tbody></table></td></tr>'
            } else {
                content += '<tr><td>'+services[i].serviceName+'</td><td>'+ services[i].count + '</td></tr>';
            }
        }

        return content;
    },

    _createForwarderContent: function (forwardData, flyerData) {
        if (forwardData.length == 0) {
            return '';
        }
        console.log(forwardData);
        var content = '';
        content += '<tr class="warning" ><td><strong>Направление</strong></td><td><table><tbody>';
        var total = 0;
        var totalF = 0;
        var flyer = 0;
        for(var k in forwardData) {
            if (flyerData[k]) {
                flyer = flyerData[k]
            } else {
                flyer = 0;
            }
            content += '<tr><td>'+k+':</td><td>&nbsp;&nbsp;'+ forwardData[k] + '/'+ flyer +'</td> </tr></tr>';
            total += forwardData[k];
            totalF += flyer;
        }
        content += '<tr><td><strong>Всего:</strong></td><td>&nbsp;&nbsp;'+ total +'/'+totalF+ '</td> </tr></tr>';
        content += '</tbody></table></td></tr>';
        return content;
    },

    _eraseUsrContent: function () {
        var hlp = BackOffice.ReportHelper;
        hlp.getReportPlace().empty()
    }

};
