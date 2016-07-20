BackOffice.AppRemindList = {
    appUrl: null,
    appAttr: '',
    clientUrl: null,
    clientAttr: null,
    editUrl: null,
    editAttr: null,

    init: function () {
        var hlp = BackOffice.AppRemindListHelper;
        hlp.getAppLinkEl().click(this._appLinkHandler);
        hlp.getClientLinkEl().click(this._clientLinkHandler);
        hlp.getEditLinkEl().click(this._editLinkHandler);
    },

    _appLinkHandler: function () {
        var me   = BackOffice.AppRemindList;
        var data = {};
        data[me.appAttr] = $(this).attr(me.appAttr);
        BackOffice.Modal.load(me.appUrl, data);
    },
    _clientLinkHandler: function () {
        var me   = BackOffice.AppRemindList;
        var data = {};
        data['id'] = $(this).attr(me.clientAttr);
        BackOffice.Modal.load(me.clientUrl, data);
    },

    _editLinkHandler: function () {
        var me   = BackOffice.AppRemindList;
        var data = {};
        data['id'] = $(this).attr(me.editAttr);
        BackOffice.Modal.load(me.editUrl, data);
    }

};