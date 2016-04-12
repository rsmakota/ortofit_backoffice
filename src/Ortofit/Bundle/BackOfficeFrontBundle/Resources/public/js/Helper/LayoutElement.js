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
    }
};