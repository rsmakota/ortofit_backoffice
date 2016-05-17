/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormStaffScheduler = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getDateEL: function() {
        return $('#date');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getIdEL: function() {
        return $('#id');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getStartTimeEl: function() {
        return $('#startTime');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getEndTimeEl: function() {
        return $('#endTime');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getDoctorIdEl: function() {
        return $('#doctorId');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getOfficeIdEl: function() {
        return $('#officeId');
    },

    getDataMasked: function () {
        return $("[data-mask]");
    },

    getSaveButton: function() {
        return $('#saveButton');
    }

};
