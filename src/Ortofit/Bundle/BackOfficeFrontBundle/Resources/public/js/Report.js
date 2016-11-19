BackOffice.Report = {
    postUrl:       null,
    defaultDate:   null,
    format:        'yyyy-mm-dd',
    regDate:       /^\d{4}-\d{2}-\d{2}$/,
    locale:        'ru',
    formatErrText: 'Дата не в формате (2016-10-23) или пуст',
    rangeErrText:  'Не верный диапазон дат',

    init: function()
    {
        var hlp = BackOffice.ReportHelper;
        var me = this;
        hlp.getReportBtn().click(me._btnHandler);
        me.datePickerInit();
        // hlp.getErrTextEl().hide();
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

        return range >=0;
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
        console.log('Click Btn');
        if (!me.validate()) {
            return false;
        }
        BackOffice.Transport.send(me.postUrl, hlp.getData(), me._renderResponse);

    },

    _renderResponse: function (response) {

        console.log(response);
    }
};
