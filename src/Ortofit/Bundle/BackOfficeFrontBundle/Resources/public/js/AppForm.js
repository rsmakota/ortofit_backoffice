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
    elements:  null,
    length:    null,
    prefix:    null,

    getMsisdn: function() {
        return this.prefix + this.elements.getMsisdn().val().replace(/[^0-9]/gim,'');
    },
    getDateTime: function() {
        return this.elements.getDate().val().replace(/\//gim, '-')+' '+this.elements.getTime().val();
    },

    isValidMsisdn: function() {
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
            doctorId:          eHelper.getDoctorId().val(),
            clientId:          eHelper.getClientId().val()

        };

    },

    processResponse: function(response) {

    },

    create: function() {
        if (!this.isValidMsisdn()) {
            return;
        }
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
        this.elements = BackOffice.FormElement;
        this.decorator = BackOffice.FormDecorator;
        var me = this;

        //$("#date").inputmask("dd/mm/yyyy hh:mm", {"placeholder": "dd/mm/yyyy hh:mm"});
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
        this.uSelectH();
        if (appId) {
            this.freezeClientFields(null);
        }
    },

    getAllClientEl: function() {
        var elManager = BackOffice.FormElement;
        return [
            elManager.getDirectionId(),
            elManager.getMsisdn(),
            elManager.getGender(),
            elManager.getClientName()
        ]
    },
    /**
     * @param {Array|null} elementIds
     */
    freezeClientFields: function(elementIds) {
        var elManager = BackOffice.FormElement;
        var decorator = BackOffice.FormDecorator;
        var elements = [];
        if (null == elementIds) {
            elements = this.getAllClientEl();
        } else {
            elements = elManager.getByIds(elementIds);
        }
        decorator.freezeEl(elements);
    },

    uMsisdnH: function() {
        var me        = this;
        var msisdnE   = this.elements.getMsisdn();
        var nameE     = this.elements.getClientName();
        var genderE   = this.elements.getGender();
        var direction = this.elements.getDirectionId();
        msisdnE.keyup(function() {
            var msisdn  = me.getMsisdn();
            if (msisdn.length < me.length) {
                me.decorator.clean([msisdnE, nameE, genderE, direction]);
                nameE.val('');
                return true;
            }

            if (me.isValidMsisdn()) {
                me.decorator.success(msisdnE);
                me.findClient(msisdn, me.cbClientH);

            } else {
                me.decorator.error(msisdnE);
            }
        });
    },

    uSelectH: function() {
        var me = this;
        $("select").click(function(){
            console.log('change');
            me.decorator.success($(this));
        });
    },

    findClient: function(msisdn, callback) {
        BackOffice.Transport.send(this.clientUrl, {'msisdn':msisdn}, callback);
    },

    cbClientH: function (data) {
        var elManager = BackOffice.FormElement;
        var decorator = BackOffice.FormDecorator;
        var elements = [];
        if (data.success == 'ok') {
            var client = data.data;
            elManager.getClientId().val(client.id);
            if (client.clientDirectionId) {
                var direction =  elManager.getDirectionId();
                direction.val(client.clientDirectionId);
                elements.push(direction);
            }
            if (client.name) {
                var name = elManager.getClientName();
                name.val(client.name);
                elements.push(name);
            }
            if (client.gender) {
                var gender = elManager.getGender();
                gender.val(client.gender);
                elements.push(gender);
            }
            decorator.freezeEl(elements);
        }
    }
};
