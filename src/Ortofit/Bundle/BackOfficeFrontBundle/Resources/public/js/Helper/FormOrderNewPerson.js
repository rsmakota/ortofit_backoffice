/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormOrderNewPerson = {
    getBtnNext: function() {
        return $('#nextButton');
    },

    getForm: function() {
        return $('#newPersonForm');
    },

    getFormData: function()
    {
        var formData = $('#newPersonForm').serializeArray();
        var data = {};
        for (var i = 0; i<formData.length; i++) {
            var record = formData[i];
            data[record.name] = record.value;
        }

        return data;
    },

    getBornEl: function()
    {
        return  $("#born");
    }
};
