/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Doctor = {
    createUrl: null,
    updateUrl: null,
    loadUrl: null,
    calendarUrl: null,
    scheduleUrl: null,
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

    getCssClass: function(url, menuEl) {
        var currentUrl = window.location.href;
        if (0 == url.localeCompare(currentUrl)) {
            menuEl.addClass('active');
            return 'class="active"';
        }
        return '';
    },
    /**
     * @param {JSON} data
     */
    createMenu: function(data) {
        var hlp = BackOffice.MenuElement;
        var me = BackOffice.Doctor;
        var appEl = hlp.getDoctorListUl();
        var schEl = hlp.getDoctorsScheduleListUl();
        var href = '', activeApp = '', activeSch = '';

        appEl.empty();
        data = data.data;
        for (var i=0; i<data.length; i=i+1) {
            href      = me.calendarUrl+"?doctorId="+data[i].id;
            activeApp = me.getCssClass(href, hlp.getAppointmentsLi());
            appEl.append("<li "+activeApp+"><a href=\""+href+"\"><i class=\"fa fa-user-md\"></i>"+data[i].name+"</a></li>");

            href      = me.scheduleUrl+"?doctorId="+data[i].id;
            activeSch = me.getCssClass(href, hlp.getScheduleLi());
            schEl.append("<li "+activeSch+"><a href=\""+href+"\"><i class=\"fa fa-user-md\"></i>"+data[i].name+"</a></li>");
        }
        activeApp = me.getCssClass(me.calendarUrl, hlp.getAppointmentsLi());
        appEl.append("<li "+activeApp+"><a href=\""+me.calendarUrl+"\"><i class=\"fa fa-hospital-o\"></i>Все</a></li>");

        activeSch = me.getCssClass(me.scheduleUrl, hlp.getScheduleLi());
        schEl.append("<li "+activeSch+"><a href=\""+me.scheduleUrl+"\"><i class=\"fa fa-hospital-o\"></i>Все</a></li>");

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
