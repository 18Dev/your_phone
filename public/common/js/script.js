$(function () {
    $('#image-input').on('change', function (event) {
        let src = URL.createObjectURL(event.target.files[0]);
        $('#image-preview').attr('src', src);
        $('#image-preview').removeClass('d-none');
    });

    $("#accordionSidebar").on('click','li',function(){
        // remove classname 'active' from all li who already has classname 'active'
        $("#accordionSidebar li.active").removeClass("active");
        // adding classname 'active' to current click li
        $(this).addClass("active");
    });
})
