BackOffice.FormAppMoveHelper = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getOfficeEl: function() {
        return $('#office');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getFormEl: function () {
        return $('#rescheduleForm');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getFormControlsEls: function() {
        return $('.form-control');
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getDateEl: function () {
        return $('#date');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getTimeEl: function () {
        return $('#time');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getAppEl: function () {
        return $('#app');
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getSaveButtonEl: function () {
        return $('#saveButton');
    },

    getDoctorIdEl: function () {
        return $('#doctorId');
    },

    getDurationEl: function () {
        return $('#duration');
    },
    getDescription: function () {
        return $('#description');
    },
    getCheckedEls: function () {
        var me = BackOffice.FormAppMoveHelper;
        return [
            me.getDateEl(),
            me.getTimeEl()
        ];
    },

    /**
     * @returns {{appId: (*|integer), officeId: (*|integer), dateTime: (*|string)}}
     */
    getFormData: function() {
        return {
            appId:    this.getAppEl().val(),
            officeId: this.getOfficeEl().val(),
            dateTime: this.getDateEl().val() +' '+ this.getTimeEl().val() + ':00',
            doctorId: this.getDoctorIdEl().val(),
            duration: this.getDurationEl().val(),
            description: this.getDescription().val()
        }
    },

    getDataMasked: function () {
        return $("[data-mask]");
    }


};