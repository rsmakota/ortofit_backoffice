/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormElement = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getMsisdn: function() {
        return $('#msisdn');
    },
    getClientName: function() {
        return $('#clientName');
    },
    getDirectionId: function() {
        return $('#directionId');
    },
    getGender: function() {
        return $('#gender');
    },
    getOfficeId: function() {
        return $('#officeId');
    },
    getDate: function() {
        return $('#date');
    },
    getTime: function() {
        return $('#time');
    },
    getDuration: function() {
        return $('#duration');
    },
    getDescription: function() {
        return $('#description');
    },
    getAppId: function() {
        return $('#appId');
    },
    getServiceId: function() {
        return $('#serviceId');
    },
    getDoctorId: function() {
        return $('#doctorId');
    },
    getClientId: function() {
        return $('#clientId');
    },
    getForwarder: function() {
        return $('#forwarder');
    },

    getById: function(id) {
        return $('#'+id);
    },
    /**
     * @param {Array} idArr
     * @returns {Array}
     */
    getByIds: function(idArr) {
        var els = [];
        for(var i=0; i<idArr.length; i++) {
            els.push(this.getById(idArr[i]));
        }
        return els;
    },

    getDataMasked: function () {
        return $("[data-mask]");
    },

    getSaveButton: function() {
        return $('#saveButton');
    }

};
