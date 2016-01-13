/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormDecorator = {
    errorClass: 'has-error',
    successClass: 'has-success',

    clean: function (element) {
        element.removeClass(this.errorClass);
        element.removeClass(this.successClass);
    },

    error: function (element) {
        this.clean(element);
        element.addClass(this.errorClass);
    },

    success: function (element) {
        this.clean(element);
        element.addClass(this.successClass);
    }
};