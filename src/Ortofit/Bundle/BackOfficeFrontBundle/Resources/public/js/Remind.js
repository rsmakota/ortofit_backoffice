/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.Remind = {
    dataPath:    null,
    processPath: null,
    
    init: function () {
        var hlp = BackOffice.RemindElement;
        BackOffice.Transport.get(this.dataPath, [], this.addTips);
    },
    
    processResponseHandler: function (mes) {
        var data = mes.data;
        var me = BackOffice.Remind;
        $('#tip-'+data.id).hide('show');
        me.init();
    },
    processTip: function (id) {
        var me        = BackOffice.Remind;
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
        var me      = BackOffice.Remind;
        var hlp     = BackOffice.RemindElement;
        var data    = message.data;
        var content = hlp.getContentSection();

        content.empty();
        for (var i=0; i<data.length; i++) {
            if (!me.isTipAdded(data.id)) {
                content.append(me.createTip(data[i]));
            }
        }
        hlp.getProcessBtn().click(me.buttonProcess);
    },

    createTip: function (data) {
        var tipId  = "tip-"+data.id;
        var button = "<button type=\"button\" id=\""+data.id+"\" class=\"btn btn-primary btn-sm btn-remind\" tip=\""+tipId+"\">Обработать</button>";
        var head   = "<h4>Напомнить клиенту ("+data.name+") от <strong>"+data.date+"</strong></h4>";
        var body   = "<p>Необходимо уведомить клиета <strong>"+data.name+"</strong> по телефону <strong> "+data.msisdn+"</strong> о повторном визите. Комментарий к напоминанию <strong>\""+data.description+"\"</strong> </p>";

        return "<div class=\"callout callout-info\" id=\""+tipId+"\"> "+head+body+button+"</div>";
    },
    
    buttonProcess: function () {
        var me    = BackOffice.Remind;
        var id    = $(this).attr('id');
        me.processTip(id);
    }
};