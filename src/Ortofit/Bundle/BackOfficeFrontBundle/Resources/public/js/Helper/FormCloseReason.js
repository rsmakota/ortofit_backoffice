/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormCloseReason = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getSaveBtnEl: function() {
        return $('#saveButton');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getFormEl: function () {
        return $('#reasonForm');
    },
    
    /**
     * @returns {integer}
     */
    getReasonId: function () {
        var me = BackOffice.FormCloseReason;
        return $('input[name=reasonId]:checked', me.getFormEl()).val()
    },
   
    /**
     * @returns {Object}
     */
    getFormData: function()
    {
        var me = BackOffice.FormCloseReason;
        var formData = me.getFormEl().serializeArray();
        var data = {};
        for (var i = 0; i<formData.length; i++) {
            var record = formData[i];
            data[record.name] = record.value;
        }

        return data;
    }

};
