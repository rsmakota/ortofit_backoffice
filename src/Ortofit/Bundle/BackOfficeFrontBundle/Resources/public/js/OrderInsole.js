BackOffice.OrderInsole = {
    postUrl: null,
    appId:   null,
    insoleCount: 1,

    init: function() {
        var hlp = BackOffice.FormOrderInsole;
        hlp.getBtnNext().click(this.nextBtnHandler);
        hlp.getBtnAddEl().click(this.addInsole);
        hlp.getInputEls().click(hlp.rmErrToAllEls);
        hlp.getBtnRm().click(this.rmInsole);
    },
    /**
     * @returns {boolean}
     */
    isValidData: function () {
        var hlp     = BackOffice.FormOrderInsole;
        var length  = hlp.getNumInsoleSizeEls();
        var response = true;
        for (var i = 1; i <= length; i++) {
            if (hlp.getInsoleSizeValByNum(i) == '') {
                hlp.addErrToEl(i);
                response = false;
            }
        }

        return response;
    },

    addInsole: function () {
        var hlp  = BackOffice.FormOrderInsole;
        var trEl = hlp.getInsoleTrEl().clone();
        trEl.addClass('tmpTr');
        trEl.find('input').val('');
        trEl.insertBefore(hlp.getTrEndEl());
    },

    rmInsole: function () {
        var hlp = BackOffice.FormOrderInsole;
        $('.tmpTr').last().remove();
    },

    nextBtnHandler: function() {
        var hlp  = BackOffice.FormOrderInsole;
        var me   = BackOffice.OrderInsole;
        if (!me.isValidData()) {
            return;
        }

        BackOffice.Modal.load(BackOffice.OrderInsole.postUrl, hlp.getFormData());
    }
};