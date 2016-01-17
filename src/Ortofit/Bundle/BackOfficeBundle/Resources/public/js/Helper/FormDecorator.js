/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormDecorator = {
    errorClass:   'has-error',
    successClass: 'has-success',
    disableClass: 'disabled',
    /**
     * @param {Array|jQuery|HTMLElement} element
     */
    clean: function (element) {
        if (element instanceof Array) {
            for(var i=0; i<element.length; i++) {
                this._clean(element[i]);
            }
        } else {
            this._clean(element);
        }
    },

    /**
     * @param {jQuery|HTMLElement} element
     * @private
     */
    _clean: function (element) {

        element.parent().removeClass(this.errorClass);
        element.parent().removeClass(this.successClass);
        this.enabled(element);
    },
    /**
     *
     * @param {Array|jQuery|HTMLElement} element
     */
    freezeEl: function(element) {
        if (element instanceof Array) {
            for(var i=0; i<element.length; i++) {
                this._freezeEl(element[i]);
            }
        } else {
            this._freezeEl(element);
        }
    },
    /**
     * @param {jQuery|HTMLElement} element
     * @private
     */
    _freezeEl: function(element) {
        this.success(element);
        this.disabled(element);
    },
    /**
     * @param {jQuery|HTMLElement} element
     * @param element
     */
    error: function (element) {
        this.clean(element);
        element.parent().addClass(this.errorClass);
    },

    success: function (element) {
        this.clean(element);
        element.parent().addClass(this.successClass);
    },

    disabled: function (element) {
        element.attr(this.disableClass, true);
    },

    enabled: function (element) {
        element.attr(this.disableClass, false);
    }
};