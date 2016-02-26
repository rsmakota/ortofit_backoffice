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
    }

};
