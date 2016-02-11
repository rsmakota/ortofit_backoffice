
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
                //TODO: Need realisation
            })
        });
        helper.getOfficeEl().change(function() {

        });
    },

    validate: function ()
    {

    },

    getData: function() {
        return BackOffice.FormAppMoveHelper.getFormData();
    }

};