/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Client = {
    createUrl: null,
    updateUrl: null,

    init: function(id) {
        var me = this;
        $("[data-mask]").inputmask();
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
            msisdn:            $('#code').val()+$('#msisdn').val().replace(/[^0-9]/gim,''),
            name:              $('#name').val(),
            gender:            $('#gender').val(),
            clientDirectionId: $('#clientDirectionId').val(),
            id:                $('#id').val()

        };
    },
    update: function() {
        BackOffice.Transport.send(this.updateUrl, this.getData(), function() {
            BackOffice.Modal.getWindow().modal('hide');
            location.reload();
        });
    },
    create: function() {
        BackOffice.Transport.send(this.createUrl, this.getData(), function() {
            BackOffice.Modal.getWindow().modal('hide');
            location.reload();
        });
    }
};
