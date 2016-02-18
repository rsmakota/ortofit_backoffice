BackOffice.OrderChoosePerson = {
    postUrl: null,
    appId:   null,
    /**
     * @returns {void}
     */
    init: function() {
        var helper = BackOffice.FormOrderChoosePerson;
        helper.getBtnClient().click(this._clientBtnHandler);
        helper.getBtnPerson().click(this._personBtnHandler);
        helper.getBtnNewPerson().click(this._newPersonBtnHandler);
        helper.getSelectPerson().change(this._personSelectHandler);
    },
    /**
     * @private
     */
    _clientBtnHandler: function() {
        var data = {
            appId:  BackOffice.OrderChoosePerson.appId,
            action: "personClient"
        };

        BackOffice.Modal.load(BackOffice.OrderChoosePerson.postUrl, data);
    },
    /**
     * @private
     */
    _personBtnHandler: function() {
        var hlp = BackOffice.FormOrderChoosePerson;
        if(!hlp.isActBtnPerson()) {
            return false;
        }
        var data = {
            appId:  BackOffice.OrderChoosePerson.appId,
            action: "personChoose",
            personId: hlp.getPersonId()
        };
        BackOffice.Modal.load(BackOffice.OrderChoosePerson.postUrl, data);
    },
    /**
     * @private
     */
    _newPersonBtnHandler: function() {
        var data = {
            appId:  BackOffice.OrderChoosePerson.appId,
            action: "personNew"
        };
        BackOffice.Modal.load(BackOffice.OrderChoosePerson.postUrl, data);
    },
    /**
     * @private
     */
    _personSelectHandler: function() {
        var hlp = BackOffice.FormOrderChoosePerson;
        if (hlp.getPersonId() == null) {
            hlp.disBtnPerson();
        } else {
            hlp.actBtnPersone();
        }
    }

};
