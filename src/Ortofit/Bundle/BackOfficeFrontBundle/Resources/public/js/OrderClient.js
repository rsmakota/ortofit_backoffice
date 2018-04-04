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

        hlp.getMsisdnEl().keydown(this._keyDownHandler);
        hlp.getNameEl().keydown(this._keyDownHandler);
        hlp.getDirectionIdEl().click(this._keyDownHandler);
    },
    _keyDownHandler: function () {
        var dec = BackOffice.FormDecorator;
        dec.clean($(this));
    },
    /**
     * @private
     */
    _clientBtnHandler: function() {
        var me   = BackOffice.OrderClient;
        var hlp  = BackOffice.FormOrderClient;
        var data = hlp.getFormData();
        data.msisdn = me.getMsisdn();
        if (me._validate()) {
            BackOffice.Modal.load(me.postUrl, data);
        }
        return false;
    },

    _validate: function () {
        var me  = BackOffice.OrderClient;
        var hlp = BackOffice.FormOrderClient;
        var dec = BackOffice.FormDecorator;
        var isValid = true;
        var directEl = hlp.getDirectionIdEl();
        var msisdnEl = hlp.getMsisdnEl();
        var nameEl   = hlp.getNameEl();

        if (directEl.val() == me.undDirectId) {
            isValid = false;

            dec.error(directEl);
        } else {
            dec.success(directEl);
        }
        if (!me.isValidMsisdn()) {
            isValid = false;
            dec.error(msisdnEl);
        } else {
            dec.success(msisdnEl);
        }
        if (nameEl.val().length < me.nameLength) {
            isValid = false;
            dec.error(nameEl);
        } else {
            dec.success(msisdnEl);
        }
        return isValid;
    },

    getMsisdn: function() {
        var hlp  = BackOffice.FormOrderClient;
        return this.prefix + hlp.getMsisdnEl().val().replace(/[^0-9]/gim,'');
    },

    isValidMsisdn: function() {
        if (null != this.getMsisdn().match(this.pattern)) {
            return true;
        } else {

        }
        return false;
    }

};
