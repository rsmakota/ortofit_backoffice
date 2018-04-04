/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.MenuElement = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getAppointmentsLi: function() {
        return $('#appointments');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getDoctorListUl: function() {
        return $('#doctorList');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getDoctorsScheduleListUl: function () {
        return $('#doctorsScheduleList');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getScheduleLi: function() {
        return $('#schedule');
    }


};