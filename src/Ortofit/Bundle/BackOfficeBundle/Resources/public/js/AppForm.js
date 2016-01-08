/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.AppForm = {
    createUrl: null,
    updateUrl: null,

    getData: function() {
        return {
            msisdn:            $('#code').val()+$('#msisdn').val().replace(/[^0-9]/gim,''),
            clientName:        $('#clientName').val(),
            clientDirectionId: $('#directionId').val(),
            gender:            $('#gender').val(),
            officeId:          $('#officeId').val(),
            dateTime:          $('#date').val().replace(/\//gim, '-')+' '+$('#time').val(),
            duration:          $('#duration:checked').val(),
            description:       $('#description').val(),
            appId:             $('#appId').val(),
            serviceId:         $('#serviceId').val()

        };
    },

    processResponse: function(response) {

    },

    create: function() {
        BackOffice.Transport.send(this.createUrl, this.getData(), function(){
            BackOffice.Modal.getWindow().modal('hide');
            var calendar = $('#calendar'+$('#officeId').val());
            calendar.fullCalendar('refetchEvents');
        });
    },

    update: function() {
        BackOffice.Transport.send(this.updateUrl, this.getData(), function(){
            BackOffice.Modal.getWindow().modal('hide');
            var calendar = $('#calendar'+$('#officeId').val());
            calendar.fullCalendar('refetchEvents');
        });
    },

    init: function(appId) {
        var me = this;
        $("#date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("#time").inputmask("hh:mm", {"placeholder": "hh:mm"});
        $("[data-mask]").inputmask();

        $('#saveButton').click(function(){
            if (appId) {
                me.update();
            } else {
                me.create();
            }
        });
    }
};
