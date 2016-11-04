/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormOrderServicePerson = {
    getBtnNext: function() {
        return $('#nextButton');
    },

    getForm: function() {
        return $('#serviceForm');
    },
    getRemindEl: function() {
        return $('#remind');
    },
    /**
     * @returns {Date}
     */
    getRemindDate: function() {
        var hlp = BackOffice.FormOrderServicePerson;
        var remindStr = hlp.getRemindEl().val();

        return new Date(
            remindStr.substring(6, 10),
            (remindStr.substring(3, 5) - 1),
            remindStr.substring(0, 2)
        );
    },

    getFormData: function()
    {
        var formData = $('#serviceForm').serializeArray();

        var data = {};
        var services = [];
        for (var i = 0; i<formData.length; i++) {
            var record = formData[i];
            data[record.name] = record.value;
        }
        $('#serviceForm :checked').each(function() {
            services.push($(this).val());
        });
        data.services = services;
        return data;
    },

    getTrRemindNotice: function () {
        return $('#remindNotice');
    },

    getServicedEls: function () {
        return $('.chb-service');
    },
    getServiceTr: function () {
        return $('.tr-service');
    },
    removeErrStFromServices: function () {
        var hlp = BackOffice.FormOrderServicePerson;
        hlp.getServiceTr().removeClass('danger');
    },

    addErrStToServices: function () {
        var hlp = BackOffice.FormOrderServicePerson;
        hlp.getServiceTr().addClass('danger');
    },
    addErrStToRemind: function() {
        var hlp = BackOffice.FormOrderServicePerson;
        hlp.getTrRemindNotice().removeClass('hidden');
    },
    removeErrStToRemind: function() {
        var hlp = BackOffice.FormOrderServicePerson;
        hlp.getTrRemindNotice().addClass('hidden');
    },

    isCheckedServiceEl: function () {
        var hlp = BackOffice.FormOrderServicePerson;
        var elements = hlp.getServicedEls();
        var isChecked = false;
        elements.each(function() {
            if (this.checked) {
                isChecked = true;
            }
        });

        return isChecked;
    }
};
