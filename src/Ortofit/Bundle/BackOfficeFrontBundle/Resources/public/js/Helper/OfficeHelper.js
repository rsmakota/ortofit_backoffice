/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.OfficeHelper = {
    defaultOfficeId: 1,
    officeId:        null,

    /**
     * @param {string}  key
     * @param {integer} value
     * @private
     */
    _setCookie: function (key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + '; path=/; expires=' + expires.toUTCString();
    },

    /**
     * @param {string} key
     *
     * @returns {null|integer}
     * @private
     */
    _getCookie: function (key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    },

    /**
     * @returns {integer}
     */
    getOfficeId: function()
    {
        var me = BackOffice.OfficeHelper;
        if (me.officeId != null) {
            return me.officeId;
        }
        var officeId = me._getCookie('officeId');
        if (officeId != null) {
            me.officeId = officeId;
            me.activateOffice(officeId);
            return me.officeId;
        }
        me.setOfficeId(me.defaultOfficeId);
        me.activateOffice(officeId);
        return me.officeId;
    },


    /**
     * @param {integer|string|number} officeId
     */
    setOfficeId: function(officeId) {
        var me = BackOffice.OfficeHelper;
        me.deactivateOffice(me.officeId);
        me.officeId = officeId;
        me._setCookie('officeId', officeId);
        me.activateOffice(officeId);
    },

    /**
     * @param {string|number} id
     */
    activateOffice: function (id) {
        $('#officeTab' + id).addClass('active');
    },
    deactivateOffice: function(id) {
        $('#officeTab' + id).removeClass('active');
    },
    /**
     * @returns {*|jQuery|HTMLElement}
     */
    getTabEl: function () {
        return $('.office_link');
    }


};
