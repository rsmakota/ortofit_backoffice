BackOffice.OrderRewind = {
    postUrl: null,
    appId:   null,
    /**
     */
    init: function() {
        var hlp = BackOffice.FormOrderRewind;
        hlp.getBtnNextEl().click(this._nextBtnHandler);
        hlp.getBtnRewindEl().click(this._rewindBtnHandler);

    },

    _nextBtnHandler: function() {
        var me   = BackOffice.OrderRewind;
        var data = {appId: me.appId, complete: true};
        BackOffice.Modal.load(BackOffice.OrderRewind.postUrl, data);
    },

    _rewindBtnHandler: function() {
        var me   = BackOffice.OrderRewind;
        var data = {appId: me.appId, rewind: true};
        BackOffice.Modal.load(BackOffice.OrderRewind.postUrl, data);
    }


};