/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Diagnosis = {
    createUrl: null,
    updateUrl: null,
    init: function(id) {
        var me = this;
        $('#saveButton').click(function(){
            if (id) {
                me.update();
            } else {
                me.create();
            }
        });
    },
    getData: function() {
        return {
            description: $('#description').val(),
            id:          $('#id').val(),
            personId:    $('#personId').val()

        };
    },
    update: function() {
        BackOffice.Transport.send(this.updateUrl, this.getData(), function() {
            BackOffice.Modal.getWindow().modal('hide');
            location.reload();
        });
    },
    create: function() {
        BackOffice.Transport.send(jQuery.diagnosis.createUrl, this.getData(), function() {
            BackOffice.Modal.getWindow().modal('hide');
            location.reload();
        });
    }
};