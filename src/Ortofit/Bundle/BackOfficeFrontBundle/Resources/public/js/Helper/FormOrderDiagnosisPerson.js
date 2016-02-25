/**
 * @copyright 2016 Ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.FormOrderDiagnosisPerson = {
    getBtnNext: function() {
        return $('#nextButton');
    },

    getForm: function() {
        return $('#diagnosisForm');
    },

    getFormData: function()
    {
        var formData = $('#diagnosisForm').serializeArray();

        var data = {};
        for (var i = 0; i<formData.length; i++) {
            var record = formData[i];
            data[record.name] = record.value;
        }

        return data;
    }

};
