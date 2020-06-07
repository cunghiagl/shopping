$(function(){
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
    $(".select2_init").select2({
        placeholder:"Chọn Danh Mục",
        allowClear:true
    })
});