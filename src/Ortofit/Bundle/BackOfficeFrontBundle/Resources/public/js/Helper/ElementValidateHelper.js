/**
 * @copyright 2017 Nebupay LLC
 * @author Rodion Smakota <rsmakota@nebupay.com>
 */

BackOffice.ElementValidateHelper = {

    /**
     * @param {jQuery|HTMLElement} el
     */
    formGroupElValValid: function (el) {
        var me = BackOffice.ElementValidateHelper;
        if (el.val().length !== 0) {
            return true;
        }
        me.formGroupElError(el);

        return false;
    },
    /**
     * @param {jQuery|HTMLElement} form
     */
    formGroupClear: function (form) {
        form.find('.form-group').removeClass('has-error');
    },
    /**
     * @param {jQuery|HTMLElement} el
     */
    formGroupElError: function (el) {
        el.parents('.form-group').addClass('has-error');
    },

    /**
     * @param {jQuery|HTMLElement} el
     */
    formGroupElClear: function (el) {
        el.parent('.form-group').removeClass('has-error');
    }

};