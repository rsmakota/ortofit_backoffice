/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.ClientList = {
    url: null,
    clientIdAtr: null,

    init: function() {
        var me = this;
        var hlp = BackOffice.ClientListHelper;
        hlp.getCreateButEl().click(me._createButHandler);
        hlp.getEditButEl().click(me._editButHandler);
    },

    _createButHandler: function () {
        var me = BackOffice.ClientList;
        BackOffice.Modal.load(me.url, {});
    },

    _editButHandler: function () {
        var me = BackOffice.ClientList;
        var clientId = $(this).attr('client-id');
        BackOffice.Modal.load(me.url, {id: clientId});
    }
};