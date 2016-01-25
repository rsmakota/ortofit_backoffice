/**
 * @copyright 2016 rsmakota@gmail.com
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

BackOffice.Transport = {
    send: function (url, data, callback) {
        $.ajax({
            type: "POST",
            url : url,
            data: data,
            success: function(msg) {
                callback(msg);
            },
            error: function() {
                callback();
            }
        });
    },
    alert: function () {
        alert('Alert');
    }
};