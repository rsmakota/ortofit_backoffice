/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormOrderInsole = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getBtnNext: function() {
        return $('#nextButton');
    },
    /**
     * @returns {*|jQuery|HTMLElement}
     */
    getFormEl: function () {
        return $('#insoleForm');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getBtnAddEl: function() {
        return $('#btnAdd');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getAppEl: function() {
        return $('#appId');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getStateId: function() {
        return $('#stateId');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getPersonEl: function() {
        return $('#personId');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getInsoleTrEl: function() {
        return $('#insoleTr');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getTrEndEl: function() {
        return $('tr.endTr');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getBtnRm: function() {
        return $('#btnRm');
    },

    addErrToFirstEl: function () {
        var hlp  = BackOffice.FormOrderInsole;
        var form = hlp.getFormEl();
        form.find('tr.form-group').eq(0).addClass('has-error');
    },

    rmErrToFirstEl: function () {
        var hlp  = BackOffice.FormOrderInsole;
        var form = hlp.getFormEl();
        form.find('tr.form-group').eq(0).removeClass('has-error');
    },

     /**
     * @returns {Object}
     */
    getFormData: function()
    {
        var hlp  = BackOffice.FormOrderInsole;
        var data = {};
        var form = hlp.getFormEl();
        var val;
        var type;
        hlp.getInputEls().each(function (index) {
            val = $(this).val();
            if (val != '') {
                type = form.find('select').eq(index).val();
                data[index] = {size:val, type:type};
            }
        });

        return {
            appId: hlp.getAppEl().val(),
            stateId: hlp.getStateId().val(),
            insoles: data,
            personId: hlp.getPersonEl().val()
        };
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getInputEls: function() {
        var hlp  = BackOffice.FormOrderInsole;
        return hlp.getFormEl().find('input[type="text"]');
    }

};
