/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormOrderClient = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getBtnClient: function() {
        return $('#clientButton');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getDirectionIdEl: function () {
        return $('#clientDirectionId');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getMsisdnEl: function () {
        return $('#msisdn');
    },
/**
     * @returns {jQuery|HTMLElement}
     */
    getNameEl: function () {
        return $('#name');
    },

    /**
     * @returns {Number}
     */
    getDirectionId: function () {
        return parseInt(BackOffice.FormOrderClient.getDirectionIdEl().val());
    },

    /**
     * @returns {Object}
     */
    getFormData: function()
    {
        var formData = $('#clientForm').serializeArray();
        var data = {};
        for (var i = 0; i<formData.length; i++) {
            var record = formData[i];
            data[record.name] = record.value;
        }

        return data;
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getDataMaskedEl: function () {
        return $("[data-mask]");
    }

};
