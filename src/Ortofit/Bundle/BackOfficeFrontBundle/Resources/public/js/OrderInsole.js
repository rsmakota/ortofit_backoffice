BackOffice.OrderInsole = {
    postUrl: null,
    appId:   null,
    insoleCount: 1,

    init: function() {
        var hlp = BackOffice.FormOrderInsole;
        hlp.getBtnNext().click(this.nextBtnHandler);
        hlp.getBtnAddEl().click(this.addInsole);
        hlp.getInputEls().click(hlp.rmErrToFirstEl);
    },
    /**
     * @param {object} data
     * @returns {boolean}
     */
    isValidData: function (data) {
        var hlp  = BackOffice.FormOrderInsole;
        var length = Object.keys(data.insoles).length;
        console.log('length:'+length)
        if (0 == length) {
            hlp.addErrToFirstEl();
            return false;
        }

        return true;
    },

    addInsole: function () {
        var hlp  = BackOffice.FormOrderInsole;
        $('#insoleTr').clone(true).insertAfter('tr.endTr');
    },

    nextBtnHandler: function() {
        var hlp  = BackOffice.FormOrderInsole;
        var me   = BackOffice.OrderInsole;
        var data = hlp.getFormData();
        console.log(data);
        if (!me.isValidData(data)) {
            return;
        }
        BackOffice.Modal.load(BackOffice.OrderInsole.postUrl, data);
    }
};