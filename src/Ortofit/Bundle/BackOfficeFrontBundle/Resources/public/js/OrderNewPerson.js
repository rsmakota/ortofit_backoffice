BackOffice.OrderNewPerson = {
    postUrl: null,
    appId:   null,

    init: function()
    {
        var hlp = BackOffice.FormOrderNewPerson;
        hlp.getBtnNext().click(this._nextBtnHandler);
        hlp.getBornEl().inputmask("dd/mm/yyyy", {"placeholder": "ДД/ММ/ГГГГ"});

    },

    _nextBtnHandler: function() {
        var hlp = BackOffice.FormOrderNewPerson;

        var data = hlp.getFormData();

        if ((data.name.length < 1) || (data.born.length < 10)) {
            return false;
        }
        BackOffice.Modal.load(BackOffice.OrderNewPerson.postUrl, data);
    }

};
