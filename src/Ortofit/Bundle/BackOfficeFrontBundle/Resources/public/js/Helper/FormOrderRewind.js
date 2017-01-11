/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormOrderRewind = {
    getBtnNextEl: function() {
        return $('#nextButton');
    },
    getBtnRewindEl: function() {
        return $('#rewindButton');
    },

    getFormEl: function() {
        return $('#rewindForm');
    },

    /**
     * @returns {void|jQuery|HTMLElement}
     */
    getStateEl: function () {
        return $('#stateId');
    },

    getFormData: function()
    {
        var hlp = BackOffice.FormOrderRewind;
        var formData = hlp.getFormEl().serializeArray();
        var data = {};
        for (var i = 0; i<formData.length; i++) {
            var record = formData[i];
            data[record.name] = record.value;
        }

        return data;
    }

};
