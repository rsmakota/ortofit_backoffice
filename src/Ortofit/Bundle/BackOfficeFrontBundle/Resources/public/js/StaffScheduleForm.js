/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.StaffScheduleForm = {
    createUrl: null,
    updateUrl: null,

    getStartDateTime: function() {
        var hlp = BackOffice.FormStaffScheduler;

        return hlp.getDateEL().val().replace(/\//gim, '-')+' '+hlp.getStartTimeEl().val();
    },
    getEndDateTime: function() {
        var hlp = BackOffice.FormStaffScheduler;

        return hlp.getDateEL().val().replace(/\//gim, '-')+' '+hlp.getEndTimeEl().val();
    },

    getData: function() {
        var hlp = BackOffice.FormStaffScheduler;
        var me = this;
        return {
            id:        hlp.getAppId().val(),
            officeId:  hlp.getOfficeId().val(),
            doctorId:  hlp.getDoctorId().val(),
            startTime: me.getStartDateTime(),
            endTime:   me.getEndDateTime()
        };

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
        var me = this; var hlp = BackOffice.FormStaffScheduler;
        var id = hlp.getIdEl().val();
        hlp.getDate().inputmask("dd/mm/yyyy", {"placeholder": "ДД/ММ/ГГГГ"});
        hlp.getTime().inputmask("hh:mm", {"placeholder": "ЧЧ:ММ"});
        hlp.getDataMasked().inputmask();
        
        hlp.getSaveButton().click(function() {
            var valid = me._validate();
            if (!valid) {
                return false;
            }
            if (id.length > 0) {
                me.update();
            } else {
                me.create();
            }
        });
    },

    _validate: function () {
        var hlp = BackOffice.FormStaffScheduler;
        var dec = BackOffice.FormDecorator;
        var isValid = true;
        var start = hlp.getStartTimeEl().val();
        var end   = hlp.getEndTimeEl().val();
        var date  = hlp.getDateEL().val();
        if (start.length != 5) {
            dec.error(start);
            isValid = false;
        }
        if (end.length != 5) {
            dec.error(end);
            isValid = false;
        }
        if(date.length != 10) {
            dec.error(date);
            isValid = false;
        }
        return isValid;
    }
};
