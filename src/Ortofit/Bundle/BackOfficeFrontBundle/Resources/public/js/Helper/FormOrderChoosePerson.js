/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormOrderChoosePerson = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getSelectPerson: function() {
        return $('#personId');
    },
    /**
     * @returns {integer}
     */
    getPersonId: function() {
        return this.getSelectPerson().val();
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getBtnClient: function() {
        return $('#clientButton');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getBtnPerson: function() {
        return $('#personButton');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getBtnNewPerson: function() {
        return $('#newPersonButton');
    },
    isActBtnPerson: function() {
        return this.getBtnPerson().hasClass('btn-success');
    },
    actBtnPerson: function() {
        var btn = this.getBtnPerson();
        btn.removeClass('btn-block');
        btn.addClass('btn-success');
    },

    disBtnPerson: function() {
        var btn = this.getBtnPerson();
        btn.removeClass('btn-success');
        btn.addClass('btn-block');
    }
};
