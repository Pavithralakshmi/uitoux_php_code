function mark_1(mark_1){
    var regex=/^[0-9]+$/;
    if(!mark_1.value.match(regex)){
        mark_1.value = mark_1.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(mark_1).parents(".fieldGroup");
        var mark_1   = fieldGroup.find(".mark_1").val();
        var mark_2    = fieldGroup.find(".mark_2").val();
        var mark_3    = fieldGroup.find(".mark_3").val();
        mark_1 = parseInt(mark_1);
        mark_2 = parseInt(mark_2);
        mark_3 = parseInt(mark_3);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(mark_1+mark_2+mark_3);
    }
}
function mark_2(mark_2){
    var regex=/^[0-9]+$/;
    if(!mark_2.value.match(regex)){
        mark_2.value = mark_2.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(mark_2).parents(".fieldGroup");
        var mark_1   = fieldGroup.find(".mark_1").val();
        var mark_2    = fieldGroup.find(".mark_2").val();
        var mark_3    = fieldGroup.find(".mark_3").val();
        mark_1 = parseInt(mark_1);
        mark_2 = parseInt(mark_2);
        mark_3 = parseInt(mark_3);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(mark_1+mark_2+mark_3);
    }
}
function mark_3(mark_3){
    var regex=/^[0-9]+$/;
    if(!mark_3.value.match(regex)){
        mark_3.value = mark_3.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(mark_3).parents(".fieldGroup");
        var mark_1   = fieldGroup.find(".mark_1").val();
        var mark_2    = fieldGroup.find(".mark_2").val();
        var mark_3    = fieldGroup.find(".mark_3").val();
        mark_1 = parseInt(mark_1);
        mark_2 = parseInt(mark_2);
        mark_3 = parseInt(mark_3);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(mark_1+mark_2+mark_3);
    }
}

$(document).ready(function(){
    //group add limit
    var maxGroup = 20;

    //add more fields group
    $(".addMore").click(function(){
        //alert($('form').find('.ui.form').length);
        if($('form').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="three fields fieldGroup"><div class="ten wide' +
                ' field"><label>Descrition</label><textarea class="form-control" name="descItem[]"' +
                ' rows="1"></textarea></div><div class="two wide field"><label>Mark - 1</label><input type="text"' +
                ' class="form-control mark_1" name="mark_1[]" onkeyup="mark_1(this)" value="0"' +
                ' placeholder="0"></div><div class="two wide field"><label>Mark - 2</label><input type="text"' +
                ' class="form-control mark_2" name="mark_2[]" onkeyup="mark_2(this)" class="mark_2" value="0"' +
                ' placeholder="0"></div><div class="two wide field"><label>Mark - 3</label><input type="text"' +
                ' class="form-control mark_3" name="mark_3[]" onkeyup="mark_3(this)" class="mark_3" value="0"' +
                ' placeholder="0"></div><div class="two wide field"><label>Total</label><div class="ui action' +
                ' input"><input type="text" class="form-control sumUnit" value="0" placeholder="0" readonly style="width:unset;"><button' +
                ' class="ui remove button" href="javascript:void(0)" ><i class="minus' +
                ' icon"></i></button></div></div></div>';
            $('form').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });

    //remove fields group
    $('form').on("click",".remove",function(){
        $(this).parents(".fieldGroup").remove();
    });
});