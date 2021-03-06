/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.StaffScheduleForm = {
    createUrl: null,
    updateUrl: null,
    deleteUrl: null,
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
        var me = BackOffice.StaffScheduleForm;
        return {
            id:        hlp.getIdEL().val(),
            officeId:  hlp.getOfficeIdEl().val(),
            doctorId:  hlp.getDoctorIdEl().val(),
            startTime: me.getStartDateTime(),
            endTime:   me.getEndDateTime()
        };

    },

    create: function() {
        var me = BackOffice.StaffScheduleForm;
        BackOffice.Transport.send(me.createUrl, me.getData(), function(){
            BackOffice.Modal.getWindow().modal('hide');
            BackOffice.Calendar.update();
        });
    },

    update: function() {
        var me = BackOffice.StaffScheduleForm;
        BackOffice.Transport.send(me.updateUrl, me.getData(), function(){
            BackOffice.Modal.getWindow().modal('hide');
            BackOffice.Calendar.update();
        });
    },
    delete:function () {
        var me = BackOffice.StaffScheduleForm;
        BackOffice.Transport.send(me.deleteUrl, me.getData(), function(){
            BackOffice.Modal.getWindow().modal('hide');
            BackOffice.Calendar.update();
        });    
    },
    init: function() {
        var me  = BackOffice.StaffScheduleForm;
        var hlp = BackOffice.FormStaffScheduler;
        var id  = hlp.getIdEL().val();
        hlp.getDateEL().inputmask("dd/mm/yyyy", {"placeholder": "ДД/ММ/ГГГГ"});
        hlp.getStartTimeEl().inputmask("hh:mm", {"placeholder": "ЧЧ:ММ"});
        hlp.getEndTimeEl().inputmask("hh:mm", {"placeholder": "ЧЧ:ММ"});
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
        
        hlp.getDelButton().click(function () {
            var me  = BackOffice.StaffScheduleForm;
            var hlp = BackOffice.FormStaffScheduler;
            var id  = hlp.getIdEL().val();
            console.log(id);
            if (id.length > 0) {
                me.delete();
            }
        });

        hlp.getDateEL().click(me._clean);
        hlp.getStartTimeEl().click(me._clean);
        hlp.getEndTimeEl().click(me._clean);
    },

    _clean: function () {
        var dec = BackOffice.FormDecorator;
        dec.clean($(this));
    },
    _validate: function () {
        var hlp = BackOffice.FormStaffScheduler;
        var dec = BackOffice.FormDecorator;
        var isValid = true;
        var start = hlp.getStartTimeEl().val();
        var end   = hlp.getEndTimeEl().val();
        var date  = hlp.getDateEL().val();
        if (start.length != 5) {
            dec.error(hlp.getStartTimeEl());
            isValid = false;
        }
        if (end.length != 5) {
            dec.error(hlp.getEndTimeEl());
            isValid = false;
        }
        if(date.length != 10) {
            dec.error(hlp.getDateEL());
            isValid = false;
        }
        return isValid;
    }


};
