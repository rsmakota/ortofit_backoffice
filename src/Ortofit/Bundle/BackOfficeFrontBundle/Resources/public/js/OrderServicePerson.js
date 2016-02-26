BackOffice.OrderServicePerson = {
    postUrl: null,
    appId:   null,

    init: function() {
        var hlp = BackOffice.FormOrderServicePerson;
        hlp.getBtnNext().click(this._nextBtnHandler);
    },

    _nextBtnHandler: function() {
        var hlp  = BackOffice.FormOrderServicePerson;
        var data = hlp.getFormData();
        console.log(data);
        //BackOffice.Modal.load(BackOffice.OrderDiagnosisPerson.postUrl, data);
    }
};