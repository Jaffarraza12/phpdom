var app  = {
    init : function () {

    },
    baseUrl:function()
    {
        return "http://localhost/rems";
    },
    postWithCallback:function(url, data, callback)
    {
        $.ajax(url, {
            type: 'POST',
            data: data,
            success: function( resp ) {
                callback(resp);
            },
            error: function( req, status, err ) {
                alert('something went wrong', status, err );
            }
        });
    },
    getWithCallback:function(url, data, callback)
    {
        $.ajax(url, {
            type: 'GET',
            data: data,
            success: function( resp ) {
                callback(resp);
            },
            error: function( req, status, err ) {
                alert('something went wrong', status, err );
            }
        });
    }, popUp : function (url,elem) {
       /* element_to_open = '<div id="element_to_pop_up"><a class="b-close">x</a><div class="content" style="height:auto;"><iframe id="player" type="text/html" width="100%" height="100%" src="'+url+'" frameborder="0"></iframe></div></div>'
        $(element_to_open).bPopup({
            follow: [false, false], //x, y
            position: [120, 100],
            speed: 450,
            transition: 'fadein',
            onClose: function() { elem.ajax.reload() }
        });*/
        $.magnificPopup.open({
            items: {
                src: url ,
            },type: 'iframe',
            callbacks: {
                close: function () {
                    elem.ajax.reload()
                }


            }
        });
    }
};