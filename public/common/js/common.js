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

    modules.debounce = function (func, wait) {
        let debounceTimer;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), wait);
        }
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

    modules.previewMultipleImage = function () {
        let imgArray = [];
        $(document).on('change', '.upload_multiple',function (e) {
            let imgWrap = $(document).find('.upload__img-wrap');
            let subImageLength = imgWrap.find('.upload__img-box').length;
            let maxLength = $(this).data('max_length');
            let filesArr = Array.prototype.slice.call(e.target.files);
            filesArr.forEach(f => {
                if (f.type.match('image.*') && imgArray.length <= maxLength && subImageLength <= maxLength) {
                    imgArray.push(f);
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        imgWrap.append(`
                            <div class='upload__img-box'>
                                <div style="background-image: url('${e.target.result}')" data-number='${$(".upload__img-close").length}' data-file='${f.name}' class='img-bg'>
                                    <div class='upload__img-close'></div>
                                </div>
                            </div>
                        `);
                    };
                    subImageLength++;
                    reader.readAsDataURL(f);
                }
            });
            modules.cloneFile(imgArray, "input[name='sub_image[]']");
        });

        $(document).on('click', ".upload__img-close", function (e) {
            let index = imgArray.findIndex(item => item.name === $(this).parent().data("file"));
            if(index > -1) {
                imgArray.splice(index, 1);
            }
            modules.cloneFile(imgArray, "input[name='sub_image[]']");
            $(this).parent().parent().remove();
        });
    };

    modules.cloneFile = function (imgArray, inputFile) {
        let transfer = new DataTransfer();
        imgArray.map(item => transfer.items.add(item));
        $(document).find(inputFile)[0].files = transfer.files;
    };

    modules.previewImage = function (previewIn, previewOut) {
        let imageFile = previewIn.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(imageFile);
        reader.onload = function (evt) {
            $(previewOut).attr('src', evt.target.result);
            $(previewOut).hide();
            $(previewOut).fadeIn(650);
        }
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
