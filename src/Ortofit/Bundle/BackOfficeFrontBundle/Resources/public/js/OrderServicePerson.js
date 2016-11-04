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
        hlp.getRemindEl().click(hlp.removeErrStToRemind);
    },

    isValidRemind: function () {
        var hlp  = BackOffice.FormOrderServicePerson;
        var remindStr = hlp.getRemindEl().val();
        if (remindStr == '') {
            return true;
        }

        var date = hlp.getRemindDate();
        var now  = new Date();
        var max  = new Date(
            (now.getFullYear()+2).toString(),
            now.getMonth(),
            now.getDay()
        );

        if (isNaN(date.getTime()) || (date.getTime() < now.getTime()) || (date.getTime() > max.getTime())) {
            hlp.addErrStToRemind();
            return false;
        }

        return true;
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

        if (!me.isValidData() || !me.isValidRemind()) {
            return;
        }

        BackOffice.Modal.load(BackOffice.OrderServicePerson.postUrl, data);
    }
};