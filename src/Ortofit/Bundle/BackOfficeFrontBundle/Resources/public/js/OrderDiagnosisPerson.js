BackOffice.OrderDiagnosisPerson = {
    postUrl: null,
    appId:   null,

    init: function(appId) {
        this.appId = appId;
        var hlp = BackOffice.FormOrderDiagnosisPerson;
        hlp.getBtnNext().click(this._nextBtnHandler);
    },

    _nextBtnHandler: function() {
        var hlp = BackOffice.FormOrderDiagnosisPerson;
        console.log(hlp.getFormData());
    }
};