/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.ExtOrderElement = {
    getContentSection: function () {
        return $('.content')
    },

    getTipEl: function (id) {
        return $('#tip'+id);
    },

    getProcessBtn: function () {
        return $('.btn-order');
    }
};