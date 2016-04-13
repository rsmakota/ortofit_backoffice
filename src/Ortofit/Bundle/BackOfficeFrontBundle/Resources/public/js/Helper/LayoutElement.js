/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.LayoutElement = {
    getRemindEl: function () {
        return $('#remind-table');
    },
    hideRemindEl: function () {
        var el = BackOffice.LayoutElement.getRemindEl();
        if (!el.hasClass('hidden')) {
            el.addClass('hidden');
        }
    },
    showRemindEl: function () {
        var el = BackOffice.LayoutElement.getRemindEl();
        if (el.hasClass('hidden')) {
            el.removeClass('hidden');
        }
    },
    setRemindElValue: function (val) {
        var el = BackOffice.LayoutElement.getRemindEl();
        el.text(val);
    },
    getOrderEl: function () {
        return $('#order-table');
    },
    hideOrderEl: function () {
        var el = BackOffice.LayoutElement.getOrderEl();
        if (!el.hasClass('hidden')) {
            el.addClass('hidden');
        }
    },
    showOrderEl: function () {
        var el = BackOffice.LayoutElement.getOrderEl();
        if (el.hasClass('hidden')) {
            el.removeClass('hidden');
        }
    },
    setOrderElValue: function (val) {
        var el = BackOffice.LayoutElement.getOrderEl();
        el.text(val);
    }

};