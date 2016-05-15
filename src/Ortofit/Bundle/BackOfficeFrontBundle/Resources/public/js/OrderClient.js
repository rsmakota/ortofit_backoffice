BackOffice.OrderClient = {
    postUrl: null,
    appId:   null,
    undDirectId: null,
    prefix: null,
    pattern: null,
    nameLength: 3,
    /**
     * @returns {void}
     */
    init: function() {
        var hlp = BackOffice.FormOrderClient;
        hlp.getBtnClient().click(this._clientBtnHandler);
        hlp.getDataMaskedEl().inputmask();
    },

    /**
     * @private
     */
    _clientBtnHandler: function() {
        var me   = BackOffice.OrderClient;
        var hlp  = BackOffice.FormOrderClient;
        var data = hlp.getFormData();
        if (me._validate()) {
            BackOffice.Modal.load(me.postUrl, data);
        }
    },

    _validate: function () {
        var me  = BackOffice.OrderClient;
        var hlp = BackOffice.FormOrderClient;
        var dec = BackOffice.FormDecorator;
        var isValid = true;
        var direcEl  = hlp.getDirectionIdEl();
        var msisdnEl = hlp.getMsisdnEl();
        var nameEl   = hlp.getNameEl();
        var btnEl    = hlp.getBtnClient();

        if (direcEl.val() == me.undDirectId) {
            isValid = false;
            dec.error(direcEl);
        }
        if (!me.isValidMsisdn()) {
            isValid = false;
            dec.error(msisdnEl);
        }
        if (nameEl.val().length() < me.nameLength) {
            isValid = false;
            dec.error(nameEl);
        }

        return true;
    },

    getMsisdn: function() {
        var hlp  = BackOffice.FormOrderClient;
        return this.prefix + hlp.getMsisdn().val().replace(/[^0-9]/gim,'');
    },

    isValidMsisdn: function() {
        if (null != this.getMsisdn().match(this.pattern)) {
            return true;
        } else {

        }
        return false;
    }

};
