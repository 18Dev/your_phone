import { COMMON } from "../../common/js/common.js";

const PRODUCT = (function () {
    let modules = {};


    return modules;
})(window.jQuery, window, document);

$(document).ready(function () {
    $(`#image-upload`).change(function (data) {
        $('#image-preview').removeClass('d-none');
        COMMON.previewImage(data, '#image-preview');
    });

    COMMON.previewMultipleImage();

    $(document).on('click', '.remove-sub-image', function () {
        $('#handle-product').append(`
            <input name="sub_image_remove[]" value="${$(this).data('sub_image_remove')}" type="hidden"/>
        `);
    });
});

