/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
BackOffice.Person = {
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
            name:           $('#name').val(),
            born:           $('#born').val().replace(/\//gim, '-'),
            familyStatusId: $('#familyStatusId').val(),
            id:             $('#id').val(),
            clientId:       $('#clientId').val()

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