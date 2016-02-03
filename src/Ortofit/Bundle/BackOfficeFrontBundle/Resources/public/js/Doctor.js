/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Doctor = {
    createUrl: null,
    updateUrl: null,
    loadUrl: null,
    calendarUrl: null,

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

    getCssClass: function(url) {
        var currentUrl = window.location.href;
        if (0 == url.localeCompare(currentUrl)) {
            BackOffice.MenuElement.getScheduleLi().addClass('active');
            return 'class="active"';
        }
        return '';
    },
    /**
     * @param {JSON} data
     */
    createMenu: function(data) {
        var el = BackOffice.MenuElement.getDoctorListUl();
        var href = '', active = '';

        el.empty();
        data = data.data;
        for (var i=0; i<data.length; i=i+1) {
            href   = BackOffice.Doctor.calendarUrl+"?doctorId="+data[i].id;
            active = BackOffice.Doctor.getCssClass(href);
            el.append("<li "+active+"><a href=\""+href+"\"><i class=\"fa fa-circle-o\"></i>"+data[i].name+"</a></li>");
        }
        active = BackOffice.Doctor.getCssClass(BackOffice.Doctor.calendarUrl);
        console.log('WTF');
        el.append("<li "+active+"><a href=\""+BackOffice.Doctor.calendarUrl+"\"><i class=\"fa fa-circle-o\"></i>Все</a></li>");

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
