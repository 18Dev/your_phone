const COMMON = (function () {
    let modules = {};

    // constants
    modules.ON_SALE = 1;
    modules.STOP_SELLING = 2;


    modules.confirmDelete = function (name, handle) {
        swal({
            title: `Are you sure you want to delete ${name}?`,
            icon: "warning",
            dangerMode: true,
        })
            .then(willDelete => {
                if (willDelete) {
                    handle();
                }
            });
    };

    modules.notifySuccess = function (content) {
        swal("Thành công!", content, "success");
    };

    modules.loading = function (isLoading, delay = 0) {
        if (isLoading) {
            $('.loading').removeClass('d-none')
        } else {
            setTimeout(() => $('.loading').addClass('d-none'), delay);
        }
    };

    modules.clearForm = function (form) {
        form.get(0).reset();
    };

    modules.clearImagePreview = function () {
        $("#image-preview").attr('src', '#');
        $("#image-preview").addClass('d-none');
    };

    modules.clearValidate = function (formId) {
        $(formId).find('.error-msg').remove();
    };

    modules.showValidateMessage = function (formId, xhr) {
        let res = xhr.responseJSON.errors;
        let elmError = `<div class="text-danger error-msg"></div>`;

        $.each(res, function (key, value) {
            $(formId).find(`input[name="${key}"]`).after($(elmError).text(value[0]));
        })
    };

    modules.escapeHtml = function (unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    };

    modules.trimSpaces = function (string) {
        if (string) {
            return $.trim(string)
        }

        return string;
    };

    return modules;
})();

export { COMMON }
