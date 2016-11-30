BackOffice.OrderInsole = {
    postUrl: null,
    appId:   null,
    insoleCount: 1,

    init: function() {
        var hlp = BackOffice.FormOrderInsole;
        hlp.getBtnNext().click(this.nextBtnHandler);
        hlp.getBtnAddEl().click(this.addInsole);
        hlp.getInputEls().click(hlp.rmErrToFirstEl);
        hlp.getBtnRm().click(this.rmInsole);
    },
    /**
     * @param {object} data
     * @returns {boolean}
     */
    isValidData: function (data) {
        var hlp    = BackOffice.FormOrderInsole;
        var length = Object.keys(data.insoles).length;
        if (0 == length) {
            hlp.addErrToFirstEl();
            return false;
        }

        return true;
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
        var data = hlp.getFormData();

        if (!me.isValidData(data)) {
            return;
        }
        BackOffice.Modal.load(BackOffice.OrderInsole.postUrl, data);
    }
};