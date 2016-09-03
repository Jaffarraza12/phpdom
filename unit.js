var unit  = {
    init : function () {

        $(document).on("click",".saveOutlet",function () {
            unit.SaveUnit($(this).data("id"))
        })
        $(document).on("change","#category",function () {
            unit.getCategories($(this).val())
        })
    },SaveUnit:function(id){
        url = $(".url").val()
        var nameEle = 'amenities_'+id+'[]';
        var data = {
            'id': id,
            '_token': $("[name='_token']").val(),
            'name':$("#name_"+id).val(),
            'type':$("#type_"+id).val(),
            'floor':$("#floor_"+id).val(),
            'available':$("#available_"+id).val(),
            'furnished':$("#furnished_"+id).val(),
            'amenities[]':[]
        }

        var obj = {}
        $("input[name='"+nameEle+"']:checked").each(function (ind,value) {
            data['amenities[]'].push($(this).val());
           // $.extend(data,obj)
        })
        app.postWithCallback(url, data,function (resp) {
            var json = $.parseJSON(resp);
            if(json.success){
                $("#success_"+id).text(json.success)
                $("#success_"+id).fadeIn()
            } else if(json.error) {
                $("#error_"+id).text(json.success)
                $("#error_"+id).fadeIn()
            }
        })

    },getCategories:function(id){
        $(".loadHtml").html('')
         if(id) {
        app.getWithCallback("categories.php?id=" + id,
            {}, function (resp) {
                var json = $.parseJSON(resp);
                $.each(json, function (i, v) {
                    $(".loadHtml").append('<div class="checkbox"><label ><input type="checkbox" value="'+i+'">  '+v+'</label></div>')
                })
            })
    }
}

};