BackOffice.OrderClient = {
    postUrl: null,
    appId:   null,
    undDirectId: null,
    /**
     * @returns {void}
     */
    init: function() {
        var helper = BackOffice.FormOrderClient;
        helper.getBtnClient().click(this._clientBtnHandler);
    },

    /**
     * @private
     */
    _clientBtnHandler: function() {
        var me   = BackOffice.OrderClient;
        var hlp  = BackOffice.FormOrderClient;
        var data = hlp.getFormData();
        if (me._validate(data)) {
            BackOffice.Modal.load(me.postUrl, data);
        }
    },

    _validate: function (data) {
        var me   = BackOffice.OrderClient;
        if (data.directionId == me.undDirectId) {
            return false;
        }

        return true;
    }

};
