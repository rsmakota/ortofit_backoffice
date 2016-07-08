/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.Remind = {
    dataPath:    null,
    processPath: null,
    tipTemplate: '',
    clientDetailUrl: null,

    init: function () {
        var me   = BackOffice.Remind;
        BackOffice.Transport.get(me.dataPath, [], me.addTips);
    },
    
    processClientDetails: function () {
        var me     = BackOffice.Remind;
        var modal  = BackOffice.Modal;
        var msisdn = $(this).attr('msisdn');
        modal.load(me.clientDetailUrl, {msisdn: msisdn});
    },
    
    processResponseHandler: function (mes) {
        var data = mes.data;
        var me   = BackOffice.Remind;
        var hlp  = BackOffice.RemindElement;
        hlp.getTipEl(data.id).hide('show')
        me.init();
    },
    
    processTip: function (id) {
        var me        = BackOffice.Remind;
        var transport = BackOffice.Transport;
        transport.send(me.processPath, {'id': id}, me.processResponseHandler)
    },

    isTipAdded: function (id) {
        var hlp = BackOffice.RemindElement;
        if (hlp.getTipEl(id).length) {
            return true;
        }
        return false;
    },

    addTips: function (message) {
        var me      = BackOffice.Remind;
        var hlp     = BackOffice.RemindElement;
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
        hlp.getClientDelailEl().click(me.processClientDetails);
    },

    createTip: function (data, params, template) {
        for (var i = 0; i<params.length; i++) {
            var expr = new RegExp('#'+params[i]+'#', 'ig');
            template = template.replace(expr, data[params[i]]);
        }

        return template;

    },
    
    buttonProcess: function () {
        var me    = BackOffice.Remind;
        var id    = $(this).attr('id');
        me.processTip(id);
    }

};