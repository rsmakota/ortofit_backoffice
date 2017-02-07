/**
 * @copyright 2017 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.AppView = {
    editUrl: null,
    orderUrl: null,
    reasonUrl: null,
    phoneUrl: null,
    appId: null,
    phoneConfirm: null,

    init: function() {
        var helper = BackOffice.AppViewHelper;
        helper.getEditButEl().click(this._editHandler);
        helper.getOrderButEl().click(this._orderHandler);
        helper.getReasonButEl().click(this._reasonHandler);
        helper.getPhoneConfirmButEl().click(this._phoneHandler);
    },

    _editHandler: function () {
        var me = BackOffice.AppView;
        BackOffice.Modal.load(me.editUrl, {appId: me.appId});
    },

    _orderHandler: function () {
        var me = BackOffice.AppView;
        BackOffice.Modal.load(me.orderUrl, {appId: me.appId, isNew: true});
    },

    _reasonHandler: function () {
        var me = BackOffice.AppView;
        BackOffice.Modal.load(me.reasonUrl, {appId: me.appId});
    },

    _phoneHandler: function () {
        var me   = BackOffice.AppView;
        var data = {appId: me.appId, phoneConfirm:!me.phoneConfirm};
        BackOffice.Transport.send(me.phoneUrl, data, function () {
            BackOffice.Modal.getWindow().modal('hide');
            BackOffice.Calendar.update();
        });
    }

};
