BackOffice.Report = {
    postUrl:     null,
    defaultDate: null,

    init: function()
    {
        var hlp = BackOffice.ReportHelper;
        this.datePickerInit()
    },

    datePickerInit: function () {
        var dp = BackOffice.ReportHelper.getDateInputEl();
        dp.datepicker({
            todayHighlight: true,
            language: 'ru',
            format: 'yyyy-mm-dd'
        });
        dp.val(BackOffice.Report.defaultDate);
    },

    _btnHandler: function() {
        // var hlp = BackOffice.FormOrderNewPerson;
        //
        // var data = hlp.getFormData();
        //
        // if ((data.name.length < 3) || (data.born.length < 10)) {
        //     return false;
        // }
        // BackOffice.Modal.load(BackOffice.OrderNewPerson.postUrl, data);
    }


};
