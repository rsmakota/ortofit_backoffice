/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Layout = {
    remindUrl: null,
    orderUrl: null,
    interval: 20000,

    init: function () {
        var hlp = BackOffice.LayoutElement;
        this.checkReminds();
        this.checkOrders();
        hlp.getRemindEl().everyTime(this.interval, this.checkReminds);
        hlp.getOrderEl().everyTime(this.interval, this.checkOrders);
    },
    
    checkReminds: function () {
        var controller = BackOffice.Layout;
        var url        = controller.remindUrl;
        var transport  = BackOffice.Transport;
        transport.get(url, {}, controller.processResponseCheckReminds);
    },

    checkOrders: function () {
        var controller = BackOffice.Layout;
        var url        = controller.orderUrl;
        var transport  = BackOffice.Transport;
        transport.get(url, {}, controller.processResponseCheckOrders);
    },

    processResponseCheckReminds: function (response) {
        var hlp = BackOffice.LayoutElement;
        if (response.data.num > 0) {
            hlp.showRemindEl();
            hlp.setRemindElValue(response.data.num);
        } else {
            hlp.hideRemindEl();
        }
    },
    
    processResponseCheckOrders: function (response) {
        var hlp = BackOffice.LayoutElement;
        if (response.data.num > 0) {
            hlp.showOrderEl();
            hlp.setOrderElValue(response.data.num);
        } else {
            hlp.hideOrderEl();
        }
    }
};