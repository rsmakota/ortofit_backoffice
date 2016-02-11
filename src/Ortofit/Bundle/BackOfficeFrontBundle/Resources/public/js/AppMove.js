
BackOffice.AppMove = {
    saveUrl: null,
    dateUrl: null,
    timeUrl: null,
    officeId: null,

    init: function() {
        var me        = this;
        var helper    = BackOffice.FormAppMoveHelper;
        var transport = BackOffice.Transport;
        me.officeId   = helper.getOfficeId();

        helper.getSaveButtonEl().click(function(){
            if (!me.validate()) {
                return false;
            }
            transport.send(me.saveUrl, me.getData(), function() {

            })
        });
        helper.getOfficeEl().change(function(data) {
            transport.send(me.dateUrl, me.getData(), function(data) {
                BackOffice.FormAppMoveHelper.setDateEl(data.data);
            });

        });
    },

    validate: function ()
    {

    },

    getData: function() {
        return BackOffice.FormAppMoveHelper.getFormData();
    }

};