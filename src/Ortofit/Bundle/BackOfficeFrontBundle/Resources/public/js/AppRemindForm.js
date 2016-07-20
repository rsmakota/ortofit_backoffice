BackOffice.AppRemindForm = {
    updateUrl: null,
    removeUrl: null,

    init: function () {
        var hlp = BackOffice.FormAppRemindHelper;
        var me  = BackOffice.AppRemindForm;
        hlp.getButUpdateEl().click(me._updateButHandler);
        hlp.getButRemoveEl().click(me._removeButHandler);
        hlp.getDateEl().inputmask("dd/mm/yyyy", {"placeholder": "ДД/ММ/ГГГГ"});
    },

    _removeButHandler: function () {
        var me   = BackOffice.AppRemindForm;
        var hlp  = BackOffice.FormAppRemindHelper;
        var data = {id: hlp.getIdEl().val()};
        BackOffice.Transport.send(me.removeUrl, data, function() {
            BackOffice.Modal.getWindow().modal('hide');
            location.reload();
        });
    },
    _updateButHandler: function () {
        var me   = BackOffice.AppRemindForm;
        var hlp  = BackOffice.FormAppRemindHelper;
        var data = hlp.getFormData();
        BackOffice.Transport.send(me.updateUrl, data, function() {
            BackOffice.Modal.getWindow().modal('hide');
            location.reload();
        });
    }

};