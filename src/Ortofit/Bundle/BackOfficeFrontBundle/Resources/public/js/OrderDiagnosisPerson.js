BackOffice.OrderDiagnosisPerson = {
    postUrl: null,
    appId:   null,
    /**
     *
     * @param {integer} appId
     */
    init: function(appId) {
        this.appId = appId;
        var hlp = BackOffice.FormOrderDiagnosisPerson;
        hlp.getBtnNext().click(this._nextBtnHandler);
    },

    _nextBtnHandler: function() {
        var hlp  = BackOffice.FormOrderDiagnosisPerson;
        var data = hlp.getFormData();
        BackOffice.Modal.load(BackOffice.OrderDiagnosisPerson.postUrl, data);
    }
};