BackOffice.CloseReason = {
    postUrl: null,
    /**
     * @returns {void}
     */
    init: function() {
        var hlp = BackOffice.FormCloseReason;
        hlp.getSaveBtnEl().click(this._saveBtnHandler);

    },
    _keyDownHandler: function () {
        var dec = BackOffice.FormDecorator;
        dec.clean($(this));
    },
    /**
     * @private
     */
    _saveBtnHandler: function() {
        var me   = BackOffice.CloseReason;
        var hlp  = BackOffice.FormCloseReason;
        var data = hlp.getFormData();
        if (me._validate()) {
            BackOffice.Transport.send(me.postUrl, data, function(){
                BackOffice.Modal.getWindow().modal('hide');
                BackOffice.Calendar.update();
            });
        }
        return false;
    },

    _validate: function () {
        var hlp = BackOffice.FormCloseReason;
        var dec = BackOffice.FormDecorator;
        var isValid = true;

        if (hlp.getReasonId() == undefined) {
            isValid = false;

            dec.error(hlp.getFormEl());
        } else {
            dec.success(hlp.getFormEl());
        }

        return isValid;
    }


};
