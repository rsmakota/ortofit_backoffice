BackOffice.ReportHelper = {

    getDateInputEl: function() {
        return $('.iDate');
    },

    getReportBtn: function () {
        return $('#reportBtn');
    },

    getDateFromEl: function () {
        return $('#dateFrom');
    },

    getDateToEl: function () {
        return $('#dateTo');
    },
    getFormEl: function () {
        return $('#reportForm');
    },
    getErrTextEl: function () {
        return $('#formErrorText')
    },
    /**
     * @returns {*|jQuery|HTMLElement}
     */
    getReportPlace: function () {
        return $('#reportList');
    },

    getErrorReportDivEl: function () {
        return $('#errorDiv');
    },

    setErrToEl: function (el) {
        el.parent().addClass('has-error');
    },

    cleanErrors: function() {
        var me  = BackOffice.ReportHelper;
        var els = $('div > .form-group.has-error');
        els.removeClass('has-error');
        me.getErrTextEl().hide();
    },

    getData: function() {
        var me = BackOffice.ReportHelper;
        return {
            dateFrom: me.getDateFromEl().val() + '00:00:00',
            dateTo:   me.getDateToEl().val() + '23:59:59',
            officeId: BackOffice.OfficeHelper.getOfficeId()
        };
    }
};