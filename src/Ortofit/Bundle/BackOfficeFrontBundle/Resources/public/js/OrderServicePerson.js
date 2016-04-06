BackOffice.OrderServicePerson = {
    postUrl: null,
    appId:   null,

    init: function() {
        var hlp = BackOffice.FormOrderServicePerson;
        hlp.getBtnNext().click(this.nextBtnHandler);
        hlp.getRemindEl().inputmask("dd/mm/yyyy", {"placeholder": "ДД/ММ/ГГГГ"});
        hlp.getServicedEls().change(function() {
            if (this.checked) {
                hlp.removeErrStFromServices();
            }
        });
    },

    isValidData: function () {
        var hlp  = BackOffice.FormOrderServicePerson;
        if (!hlp.isCheckedServiceEl()) {
            hlp.addErrStToServices();
            return false;
        }

        return true;
    },

    nextBtnHandler: function() {
        var hlp  = BackOffice.FormOrderServicePerson;
        var me   = BackOffice.OrderServicePerson;
        var data = hlp.getFormData();
        if (!me.isValidData()) {
            return;
        }
        BackOffice.Modal.load(BackOffice.OrderServicePerson.postUrl, data);
    }
};