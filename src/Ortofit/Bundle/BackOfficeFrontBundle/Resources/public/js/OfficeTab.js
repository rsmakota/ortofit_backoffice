/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.OfficeTab = {

    description: [],

    init: function (id) {
        var hlp = BackOffice.OfficeHelper;
        var me =  BackOffice.OfficeTab;
        if (null != id) {
            hlp.setOfficeId(id);
        }
        hlp.getOfficeId();
        hlp.getTabEl().click(me._clickTab);
    },

    describe: function (fn) {
        BackOffice.OfficeTab.description.push(fn);
    },
    /**
     * @private
     */
    _clickTab: function () {
        var hlp = BackOffice.OfficeHelper;
        var me =  BackOffice.OfficeTab;
        var officeId = $(this).attr('office-id');
        hlp.setOfficeId(officeId);
        if (me.description.length == 0) {
            return;
        }
        for (var i=0; i<me.description.length; i++) {
            me.description[i](officeId);
        }
    }

};
