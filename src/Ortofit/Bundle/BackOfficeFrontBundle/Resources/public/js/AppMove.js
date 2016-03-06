
BackOffice.AppMove = {
    saveUrl:  null,
    dateUrl:  null,
    timeUrl:  null,
    officeId: null,

    init: function() {
        var me        = this;
        var helper    = BackOffice.FormAppMoveHelper;
        var transport = BackOffice.Transport;
        me.officeId   = helper.getOfficeId();

        helper.getSaveButtonEl().click(function() {
            if (!me.validate()) {
                return false;
            }
            transport.send(me.saveUrl, me.getData(), function() {
                BackOffice.Calendar.update();
                BackOffice.Modal.getWindow().modal('hide');
            })
        });
        helper.getOfficeEl().change(function() {
            transport.send(me.dateUrl, me.getData(), function(data) {
                BackOffice.FormAppMoveHelper.setDateEl(data.data);
                BackOffice.FormAppMoveHelper.getDateEl().trigger('change');
            });

        });

        helper.getDateEl().change(function() {
            transport.send(me.timeUrl, me.getData(), function(data) {
                BackOffice.FormAppMoveHelper.setTimeEl(data.data);
            });
        });

        helper.getDateEl().trigger('change');
    },

    validate: function () {
        return true;
    },

    getData: function() {
        return BackOffice.FormAppMoveHelper.getFormData();
    },

    error: function()
    {

    }

};
