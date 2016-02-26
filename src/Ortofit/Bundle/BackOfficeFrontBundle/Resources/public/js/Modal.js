/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.Modal = {

    getWindow: function () {
        return $('#appointmentModal');
    },
    /**
     *
     * @param {string}  url
     * @param {object} param
     */
    load: function (url, param) {
        var modal = this.getWindow();
        BackOffice.Transport.send(url, param, function(response) {
            if (response == 'Complete') {
                modal.modal('hide');
                return;
            }
            modal.empty();
            modal.append(response);
            modal.modal();

        });
    }
};