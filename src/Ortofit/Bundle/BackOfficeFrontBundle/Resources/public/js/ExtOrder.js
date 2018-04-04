/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.ExtOrder = {
    dataPath:    null,
    processPath: null,
    tipTemplate: '',
    init: function () {
        BackOffice.Transport.get(this.dataPath, [], this.addTips);
    },

    processResponseHandler: function (mes) {
        var data = mes.data;
        var me   = BackOffice.ExtOrder;
        $('#tip-'+data.id).hide('show');
        me.init();
    },

    processTip: function (id) {
        var me        = BackOffice.ExtOrder;
        var transport = BackOffice.Transport;
        transport.send(me.processPath, {'id': id}, me.processResponseHandler)
    },

    isTipAdded: function (id) {
        if ($("#tip-"+id).length) {
            return true;
        }
        return false;

    },

    addTips: function (message) {
        var me      = BackOffice.ExtOrder;
        var hlp     = BackOffice.ExtOrderElement;
        var data    = message.data;
        var content = hlp.getContentSection();
        var params  = null;
        content.empty();
        for (var i = 0; i < data.length; i++) {
            if (params == null) {
                params = Object.getOwnPropertyNames(data[i]);
            }
            if (!me.isTipAdded(data[i].id)) {
                content.append(me.createTip(data[i], params, me.tipTemplate));
            }
        }
        hlp.getProcessBtn().click(me.buttonProcess);
    },

    createTip: function (data, params, template) {
        for (var i = 0; i<params.length; i++) {
            var expr = new RegExp('#'+params[i]+'#', 'ig');
            template = template.replace(expr, data[params[i]]);
        }

        return template;

    },

    buttonProcess: function () {
        var me    = BackOffice.ExtOrder;
        var id    = $(this).attr('id');
        me.processTip(id);
    }
};