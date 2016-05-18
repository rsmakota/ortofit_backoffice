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
        if (null != this.getMsisdn().match(this.pattern)) {
            return true;
        } else {

        }
        return false;

    },

    getData: function() {
        var hlp = this.elements;
        return {
            msisdn:            this.getMsisdn(),
            clientName:        hlp.getClientName().val(),
            clientDirectionId: hlp.getDirectionId().val(),
            gender:            hlp.getGender().val(),
            officeId:          hlp.getOfficeId().val(),
            dateTime:          this.getDateTime(),
            duration:          hlp.getDuration().val(),
            description:       hlp.getDescription().val(),
            appId:             hlp.getAppId().val(),
            serviceId:         hlp.getServiceId().val(),
            doctorId:          hlp.getDoctorId().val(),
            clientId:          hlp.getClientId().val(),
            forwarder:         hlp.getForwarder().val()
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
            BackOffice.Calendar.update();
        });
    },

    update: function() {
        BackOffice.Transport.send(this.updateUrl, this.getData(), function(){
            BackOffice.Modal.getWindow().modal('hide');
            BackOffice.Calendar.update();
        });
    },

    init: function(appId) {
        this.elements  = BackOffice.FormElement;
        this.decorator = BackOffice.FormDecorator;
        var me = this; var hlp = BackOffice.FormElement;
        hlp.getDate().inputmask("dd/mm/yyyy", {"placeholder": "ДД/ММ/ГГГГ"});
        hlp.getTime().inputmask("hh:mm", {"placeholder": "ЧЧ:ММ"});
        hlp.getDataMasked().inputmask();

        hlp.getSaveButton().click(function(){
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
        var hlp = BackOffice.FormElement;
        return [
            hlp.getDirectionId(),
            hlp.getMsisdn(),
            hlp.getGender(),
            hlp.getClientName()
        ]
    },
    /**
     * @param {Array|null} elementIds
     */
    freezeClientFields: function(elementIds) {
        var hlp = BackOffice.FormElement;
        var decorator = BackOffice.FormDecorator;
        var elements = [];
        if (null == elementIds) {
            elements = this.getAllClientEl();
        } else {
            elements = hlp.getByIds(elementIds);
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
            me.decorator.success($(this));
        });
    },

    findClient: function(msisdn, callback) {
        BackOffice.Transport.send(this.clientUrl, {'msisdn':msisdn}, callback);
    },

    cbClientH: function (data) {
        var hlp = BackOffice.FormElement;
        var decorator = BackOffice.FormDecorator;
        var elements = [];
        if (data.success == 'ok') {
            var client = data.data;
            hlp.getClientId().val(client.id);
            if (client.clientDirectionId) {
                var direction =  hlp.getDirectionId();
                direction.val(client.clientDirectionId);
                elements.push(direction);
            }
            if (client.name) {
                var name = hlp.getClientName();
                name.val(client.name);
                elements.push(name);
            }
            if (client.gender) {
                var gender = hlp.getGender();
                gender.val(client.gender);
                elements.push(gender);
            }
            decorator.freezeEl(elements);
        }
    }
};
