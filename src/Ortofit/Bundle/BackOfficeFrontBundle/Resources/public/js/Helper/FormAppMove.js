BackOffice.FormAppMoveHelper = {
    /**
     * @returns {jQuery|HTMLElement}
     */
    getOfficeEl: function() {
        return $('#office');
    },
    /**
     *
     * @returns {integer}
     */
    getOfficeId: function() {
        return this.getOfficeEl().val();
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getDateEl: function () {
        return $('#date');
    },
    /**
     * @returns {string}
     */
    getDate: function () {
        return this.getDateEl().val();
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getTimeEl: function () {
        return $('#time');
    },
    /**
     * @returns {string}
     */
    getTime: function () {
        return this.getTimeEl().val();
    },
    /**
     * @returns {jQuery|HTMLElement}
     */
    getAppEl: function () {
        return $('#app');
    },
    /**
     * @returns {integer}
     */
    getAppId: function () {
        return this.getAppEl().val();
    },

    /**
     * @returns {jQuery|HTMLElement}
     */
    getSaveButtonEl: function () {
        return $('#saveButton');
    },
    /**
     * @returns {string}
     */
    getDateTime: function() {
        return this.getDate()+' '+this.getTime();
    },
    /**
     * @returns {{appId: (*|integer), officeId: (*|integer), dateTime: (*|string)}}
     */
    getFormData: function() {
        return {
            appId:    this.getAppId(),
            officeId: this.getOfficeId(),
            dateTime: this.getDateTime(),
            date:     this.getDate()
        }
    },

    setDateEl: function (dates) {
        var me = this;
        var el = me.getDateEl();
        el.empty();
        console.log(dates);
        $.each(dates, function(key, value) {
            el.append($("<option/>", {
                value: key,
                text: value
            }));

        });
    },

    setTimeEl: function (times) {
        var me = this;
        var el = me.getTimeEl();
        el.empty();
        $.each(times, function(key, value) {
            el.append($("<option/>", {
                value: value,
                text: value
            }));
        });
    }


};