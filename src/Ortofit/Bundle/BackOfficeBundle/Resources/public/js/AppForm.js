/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.AppForm = {
    createUrl: null,
    updateUrl: null,
    clientUrl: null,
    pattern:   null,
    decorator: null,
    elements: null,

    getMsisdn: function() {
        return this.elements.getPrefix().val()+this.elements.getMsisdn().val().replace(/[^0-9]/gim,'');
    },
    getDateTime: function() {
        return this.elements.getData().val().replace(/\//gim, '-')+' '+this.elements.getTime().val();
    },

    isValidMsisdn: function() {
        console.log(this.getMsisdn());
        if(null != this.getMsisdn().match(this.pattern)) {
            return true;
        }

        return false;
    },

    getData: function() {
        var eHelper = this.elements;
        return {
            msisdn:            this.getMsisdn(),
            clientName:        eHelper.getClientName().val(),
            clientDirectionId: eHelper.getDirectionId().val(),
            gender:            eHelper.getGender().val(),
            officeId:          eHelper.getOfficeId().val(),
            dateTime:          this.getDateTime(),
            duration:          eHelper.getDuration().val(),
            description:       eHelper.getDescription().val(),
            appId:             eHelper.getAppId().val(),
            serviceId:         eHelper.getServiceId().val(),
            doctorId:          eHelper.getDoctorId().val()

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

    init: function(pattern, appId) {
        this.pattern = pattern;
        this.elements = BackOffice.FormElement;
        this.decorator = BackOffice.FormDecorator;
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
        this.uMsisdnH();
    },

    uMsisdnH: function() {
        var me = this;
        var msisdnE = this.elements.getMsisdn();
        msisdnE.keyup(function() {
            console.log(msisdnE.val().length);
            if (msisdnE.val().length < 13) {
                me.decorator.clean(msisdnE);
                return true;
            }
            if (me.isValidMsisdn()) {
                me.decorator.success(msisdnE);
                me.findClient(me.getMsisdn(), me.cbClientH);

            } else {
                me.decorator.error(msisdnE);
            }
        });
    },

    findClient: function(msisdn, callback) {
        BackOffice.Transport.send(this.clientUrl, {'msisdn':msisdn}, callback);
    },

    cbClientH: function (data) {
        if (data.success == 'ok') {
            this.elements.getClientId().val(data.data.id);
            this.elements.getClientName().val(data.data.name);
            this.elements.getGender().val(data.data.gender);
        }
    }
};
