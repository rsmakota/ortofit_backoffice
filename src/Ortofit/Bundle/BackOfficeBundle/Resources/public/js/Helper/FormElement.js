/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormElement = {
    getPrefix: function () {
        return $('#prefix');
    },

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
    getDuration: function() {
        return $('#duration:checked');
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
    }

};
