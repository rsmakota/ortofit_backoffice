/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Layout = {
    remindUrl: null,
    interval: 20000,
    init: function () {
        var hlp = BackOffice.LayoutElement;
        this.checkReminds();
        // hlp.showRemindEl();
        // hlp.setRemindElValue(4);
        hlp.getRemindEl().everyTime(this.interval, this.checkReminds);
    },
    
    checkReminds: function () {
        var controller = BackOffice.Layout;
        var url        = controller.remindUrl;
        var transport  = BackOffice.Transport;
        transport.get(url, {}, controller.processResponseCheck);
    },
    
    processResponseCheck: function (response) {
        var hlp = BackOffice.LayoutElement;
        if (response.data.num > 0) {
            hlp.showRemindEl();
            hlp.setRemindElValue(response.data.num);
        } else {
            hlp.hideRemindEl();
        }
    }
};