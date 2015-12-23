/**
 * Created by rodion on 22.11.15.
 */
$(document).ready(function() {
    jQuery.base = {
        appFormUrl:   null,
        appCreateUrl: null,
        appUpdateUrl: null,
        send: function(url, data, callback) {
            $.ajax({
                type: "POST",
                url : url,
                data: data,
                success: function(msg){
                    callback(msg);
                },
                error: function() {
                    callback();
                }
            });
        },
        getModal: function() {
            return $('#appointmentModal');
        }
    };

    jQuery.appointment = {
        getData: function() {
            return {
                msisdn:            $('#code').val()+$('#msisdn').val().replace(/[^0-9]/gim,''),
                clientName:        $('#clientName').val(),
                clientDirectionId: $('#directionId').val(),
                gender:            $('#gender').val(),
                officeId:          $('#officeId').val(),
                dateTime:          $('#date').val().replace(/\//gim, '-')+' '+$('#time').val(),
                duration:          $('#duration:checked').val(),
                description:       $('#description').val(),
                appId:             $('#appId').val(),
                serviceId:         $('#serviceId').val()

            };
        },
        processResponse: function(response) {

        },
        create: function() {
            jQuery.base.send(jQuery.base.appCreateUrl, this.getData(), function(){
                jQuery.base.getModal().modal('hide');
                var calendar = $('#calendar'+$('#officeId').val());
                calendar.fullCalendar('refetchEvents');
            });
        },
        update: function() {
            jQuery.base.send(jQuery.base.appUpdateUrl, this.getData(), function(){
                jQuery.base.getModal().modal('hide');
                var calendar = $('#calendar'+$('#officeId').val());
                calendar.fullCalendar('refetchEvents');
            });
        },

        init: function(appId) {
            $("#date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            $("#time").inputmask("hh:mm", {"placeholder": "hh:mm"});
            $("[data-mask]").inputmask();

            $('#saveButton').click(function(){
                if (appId) {
                    jQuery.appointment.update();
                } else {
                    jQuery.appointment.create();
                }
            });
        }
    };

    jQuery.client = {
        createUrl: null,
        updateUrl: null,
        init: function(id) {
            $("[data-mask]").inputmask();
            $('#saveButton').click(function(){
                if (id) {
                    jQuery.client.update();
                } else {
                    jQuery.client.create();
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
            jQuery.base.send(jQuery.client.updateUrl, this.getData(), function() {
                jQuery.base.getModal().modal('hide');
                location.reload();
            });
        },
        create: function() {
            jQuery.base.send(jQuery.client.createUrl, this.getData(), function() {
                jQuery.base.getModal().modal('hide');
                location.reload();
            });
        }
    };

    jQuery.person = {
        createUrl: null,
        updateUrl: null,
        init: function(id) {
            $("[data-mask]").inputmask();
            $('#saveButton').click(function(){
                if (id) {
                    jQuery.person.update();
                } else {
                    jQuery.person.create();
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
            jQuery.base.send(jQuery.person.updateUrl, this.getData(), function() {
                jQuery.base.getModal().modal('hide');
                location.reload();
            });
        },
        create: function() {
            jQuery.base.send(jQuery.person.createUrl, this.getData(), function() {
                jQuery.base.getModal().modal('hide');
                location.reload();
            });
        }
    };

    jQuery.diagnosis = {
        createUrl: null,
        updateUrl: null,
        init: function(id) {
            $('#saveButton').click(function(){
                if (id) {
                    jQuery.diagnosis.update();
                } else {
                    jQuery.diagnosis.create();
                }
            });
        },
        getData: function() {
            return {
                description:    $('#description').val(),
                id:             $('#id').val(),
                personId:       $('#personId').val()

            };
        },
        update: function() {
            jQuery.base.send(jQuery.diagnosis.updateUrl, this.getData(), function() {
                jQuery.base.getModal().modal('hide');
                location.reload();
            });
        },
        create: function() {
            jQuery.base.send(jQuery.diagnosis.createUrl, this.getData(), function() {
                jQuery.base.getModal().modal('hide');
                location.reload();
            });
        }
    };

    $(document).ready(function() {
        $('#appButton').click(function (e) {
            jQuery.base.send(jQuery.base.appFormUrl, {}, function(response){
                var modal = jQuery.base.getModal();
                modal.empty();
                modal.append(response);
                modal.modal();
            })
        });


    });
});