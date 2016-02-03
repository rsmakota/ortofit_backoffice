/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Doctor = {
    createUrl: null,
    updateUrl: null,
    loadUrl: null,

    /**
     * @returns {jQuery|HTMLElement}
     */
    getUlElement: function() {
        return $('#doctorList');
    },

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
    /**
     * @param {JSON} data
     */
    createMenu: function(data) {
        var el = $('#doctorList');
        el.empty();
        data = data.data;
        for (var i=0; i<data.length; i=i+1) {
            el.append("<li><a href=\"#\"><i class=\"fa fa-circle-o\"></i>"+data[i].name+"</a></li>");
        }

    },
    loadData: function() {
        BackOffice.Transport.get(this.loadUrl, null, this.createMenu);
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
