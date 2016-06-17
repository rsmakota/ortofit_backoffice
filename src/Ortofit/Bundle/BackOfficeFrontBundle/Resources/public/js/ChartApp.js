
BackOffice.ChartApp = {
    countUrl:  null,
    
    init: function() {
        var me        = this;
        var hlp       = BackOffice.ChartElement;
        var transport = BackOffice.Transport;
        transport.get(me.countUrl, {}, function (response) {
            var data = response.data;
            Morris.Line({
                element: hlp.getAppCountElId(),
                data: data.data,
                xkey: data.xKey,
                ykeys: data.yKeys,
                labels: data.yName
            });
        });
       
    }
   

};
