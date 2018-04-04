BackOffice.FormAppRemindHelper= {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getDateEl: function() {
        return $('#date');
    },
    getIdEl: function() {
        return $('#id');
    },
    /**
     *
     * @returns {integer}
     */
    getDescriptionEl: function() {
        return $('#description');
    },

    getButUpdateEl: function () {
        return $('#updateButton');
    },

    getButRemoveEl: function () {
        return $('#removeButton');
    },



    /**
     * @returns {{appId: (*|integer), officeId: (*|integer), dateTime: (*|string)}}
     */
    getFormData: function() {
        var formData = $('#appRemindForm').serializeArray();
        var data = {};
        for (var i = 0; i<formData.length; i++) {
            var record = formData[i];
            data[record.name] = record.value;
        }

        return data;
    }


};