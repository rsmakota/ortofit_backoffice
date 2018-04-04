
BackOffice.AppMove = {
    saveUrl:  null,
    dateUrl:  null,
    timeUrl:  null,
    officeId: null,
    format:        'yyyy-mm-dd',
    regDate:       /^\d{4}-\d{2}-\d{2}$/,
    locale:        'ru',

    init: function() {
        var me        = this;
        var hlp       = BackOffice.FormAppMoveHelper;
        var transport = BackOffice.Transport;
        me.officeId   = hlp.getOfficeEl().val();
        var hlpU      = BackOffice.ElementValidateHelper;
        hlp.getFormControlsEls().click(function () {
            hlpU.formGroupClear(hlp.getFormEl());
        });
        hlp.getSaveButtonEl().click(function() {
            if (!me._validate()) {
                return false;
            }
            transport.send(me.saveUrl, me._getData(), function() {
                BackOffice.Calendar.update();
                BackOffice.Modal.getWindow().modal('hide');
            })
        });
        me.datePickerInit();
        hlp.getTimeEl().inputmask("hh:mm", {"placeholder": "ЧЧ:ММ"});
        hlp.getDataMasked().inputmask();
    },

    datePickerInit: function () {
        var hlp = BackOffice.FormAppMoveHelper;
        var dp  = hlp.getDateEl();
        var me  = this;
        dp.datepicker({
            todayHighlight: true,
            language:       me.locale,
            format:         me.format
        });
        dp.val(me.defaultDate);
    },

    /**
     * @returns {boolean}
     * @private
     */
    _validate: function () {
        var hlp  = BackOffice.FormAppMoveHelper;
        var hlpU = BackOffice.ElementValidateHelper;
        var els  = hlp.getCheckedEls();
        var flag = true;
        els.forEach(function(item) {
            if (!hlpU.formGroupElValValid(item)) {
                flag = false;
            }
        });

        return flag;
    },

    /**
     * @returns {*|{appId: (*|integer), officeId: (*|integer), dateTime: (*|string)}}
     * @private
     */
    _getData: function() {
        return BackOffice.FormAppMoveHelper.getFormData();
    }
};
