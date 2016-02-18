BackOffice.OrderNewPerson = {
    postUrl: null,
    appId:   null,

    init: function()
    {
        var helper = BackOffice.FormOrderNewPerson;
        helper.getBtnNext().click(this._nextBtnHandler);
    },

    _nextBtnHandler: function() {
        var hlp = BackOffice.FormOrderNewPerson;

        var data = hlp.getFormData();
        console.log(data);
        if ((data.name.length < 3) || (data.born.length < 10)) {
            return false;
        }
        BackOffice.Modal.load(BackOffice.OrderNewPerson.postUrl, data);
    }


};
