/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.RemindElement = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getContentSection: function () {
        return $('.content')
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getTipEl: function (id) {
        return $('#tip-'+id);
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getProcessBtn: function () {
        return $('.btn-remind');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getClientDelailEl: function () {
        return $('.client-details');
    },

    getAppLinkEl: function() {
        return $('.app-link');
    },
    getEditLinkEl: function () {
        return $('.edit')
    }
};