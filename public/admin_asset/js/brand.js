import { COMMON } from "../../common/js/common.js";

const BRAND = (function () {
    let modules = {};

    modules.handle = function (e) {
        e.preventDefault();
        const form = $(this);
        const formId = `#${$(this).attr('id')}`;
        const redirect = $(this).data('redirect');
        const formData = new FormData(form.get(0));

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            beforeSend: function () {
                // COMMON.loading(true);
                COMMON.clearValidate(formId);
            },
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message);
                    COMMON.clearForm(form);

                    if (res.data != null) {
                        $(form).find('input[name="name"]').attr('value', res.data.name);
                        $("#mage-preview").attr('src', res.data.avatar);
                        $("#mage-preview").removeClass('d-none');
                    }
                }
            },
            error: function (xhr) {
                COMMON.showValidateMessage(formId, xhr);
            },
            complete: function (data) {
                // COMMON.loading(false, 700);
            },
            statusCode: {
                500: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            }
        });
    };

    modules.updateStatus = function (id, data = {}) {
        console.log(id, data);
        $.ajax({
            type: 'POST',
            url: `brand/${id}/update`, data,
            dataType: 'json',
            beforeSend: function () {
                COMMON.loading(true);
            },
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message);

                    if (res.data.status == COMMON.ON_SALE) {
                        $(`.color_text_msg_${id}`).text('On sale');
                        $(`.color_text_msg_${id}`).removeClass('text-danger').addClass('text-success');
                        $(`.bg_btn_${id}`).text('Stop selling');
                        $(`.bg_btn_${id}`).removeClass('bg-00FF66').addClass('btn-warning');
                        $(`.bg_btn_${id}`).attr('data-status', COMMON.STOP_SELLING);
                    } else if (res.data.status == COMMON.STOP_SELLING) {
                        $(`.color_text_msg_${id}`).text('Stop selling');
                        $(`.color_text_msg_${id}`).removeClass('text-success').addClass('text-danger');
                        $(`.bg_btn_${id}`).text('On sale');
                        $(`.bg_btn_${id}`).removeClass('btn-warning').addClass('bg-00FF66');
                        $(`.bg_btn_${id}`).attr('data-status', COMMON.ON_SALE);
                    }
                }
            },
            complete: function () {
                COMMON.loading(false, 300);
            },
            statusCode: {
                500: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            }
        });
    }

    modules.getList = function (url, data = {}) {
        $.ajax({
            type: 'GET',
            url,
            data,
            dataType: 'json',
            beforeSend: function () {
                COMMON.loading(true);
            },
            success: function (res) {
                if (res.success) {
                    $('#list-brand tbody').html(res.data.html);
                    $('#list-brand .render-paginate').html(res.data.pagination);
                } else {
                    toastr.error('Đã xảy ra lỗi hệ thống');
                }
            },
            complete: function () {
                COMMON.loading(false, 300);
            }
        });
    };

    modules.delete = function (id, callback) {
        $.ajax({
            type: 'DELETE',
            url: `brand/${id}/delete`,
            dataType: 'json',
            beforeSend: function () {
                // COMMON.loading(true);
            },
            success: function (res) {
                console.log(res)
                if (res.success) {
                    // COMMON.notifySuccess(res.message);
                    callback();
                } else {
                    toastr.error(res.message);
                }
            },
            complete: function () {
                // COMMON.loading(false, 300);
            }
        });
    };

    return modules;
})(window.jQuery, window, document);

$(document).ready(function () {
    $(`#handle-category`).on('submit', BRAND.handle);

    // $(document).on('click', '#list-brand .pagination a', function (e) {
    //     e.preventDefault();
    //     PRODUCT.getList($(this).attr('href'), PRODUCT.filter());
    // });

    $(document).on('click', '.update-status', function () {
        let id = $(this).attr('data-id');
        let status = $(this).attr('data-status');
        BRAND.updateStatus(id, {status});
    });

    $(document).on('click', '.delete-item', function () {
        COMMON.confirmDelete($(this).data('name'), () => {
            BRAND.delete($(this).data('id'), () => {
                BRAND.getList('/brand')
            })
        })
    });

});
