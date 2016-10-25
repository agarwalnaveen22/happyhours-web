// JavaScript Document

// Binding next button on first step
$(".open1").click(function (event) {
    event.preventDefault();
    $(".tab-pane.active , .form-wizard .active").removeClass("active");
    $("#step-1 , .tb_1").addClass("active");
    $(".tb_1").prevAll().addClass("active");
    $(".tb_1").nextAll().removeClass("active");
    $(".tb_1").nextAll().removeClass("activeprev");
});

// Binding next button on second step
$(".open2").click(function (event) {
    event.preventDefault();
    $(".tab-pane.active , .form-wizard .active").removeClass("active");
    $("#step-2 , .tb_2").addClass("active");
    $(".tb_2").prevAll().addClass("active");
    $(".tb_2").nextAll().removeClass("active");
    $(".tb_2").nextAll().removeClass("activeprev");
});

// Binding back button on second step
$(".open3").click(function (event) {
    event.preventDefault();
    $(".tab-pane.active , .form-wizard .active").removeClass("active");
    $("#step-3 , .tb_3").addClass("active");
    $(".tb_3").prevAll().addClass("active");
    $(".tb_3").nextAll().removeClass("active");
    $(".tb_3").nextAll().removeClass("activeprev");
});

// Binding back button on third step
$(".open4").click(function (event) {
    event.preventDefault();
    $(".tab-pane.active , .form-wizard .active").removeClass("active");
    $("#step-4 , .tb_4").addClass("active");
    $(".tb_4").prevAll().addClass("active");
    $(".tb_4").nextAll().removeClass("active");
    $(".tb_4").nextAll().removeClass("activeprev");
});

$(".open5").click(function (event) {
    event.preventDefault();
    $(".tab-pane.active , .form-wizard .active").removeClass("active");
    $("#step-5 , .tb_5").addClass("active");
    $(".tb_5").prevAll().addClass("active");
    $(".tb_5").nextAll().removeClass("active");
    $(".tb_5").nextAll().removeClass("activeprev");
});

$(".open6").click(function (event) {
    event.preventDefault();
    $(".tab-pane.active , .form-wizard .active").removeClass("active");
    $("#step-6 , .tb_6").addClass("active");
    $(".tb_6").prevAll().addClass("active");
    $(".tb_6").nextAll().removeClass("active");
    $(".tb_6").nextAll().removeClass("activeprev");
});

/*$('a[data-toggle="tab"]').click(function () {
 
 $(this).parent('li').prevAll().addClass("activeprev");
 $(this).parent('li').nextAll().removeClass("activeprev");
 });*/

/*===== tooltip ==========*/
$('[data-toggle="tooltip"]').tooltip();

/*===== multi select tree ==========*/
$("#test-select , #test-select2").treeMultiselect({enableSelectAll: true, sortable: true, collapsible: true});

$('.scroll_box_inner, .last_step_table').perfectScrollbar();

function saveSupplierDetails() {
    var request = $.ajax({
        url: apiUrl + "/users/supplierRegistration",
        method: "POST",
        data: $("#supplier-form").serialize(),
        dataType: "json"
    });

    request.done(function (data) {
        if (data.status) {
            $(".tab-pane.active , .form-wizard .active").removeClass("active");
            $("#step-2 , .tb_2").addClass("active");
            $(".tb_2").prevAll().addClass("active");
            $(".tb_2").nextAll().removeClass("active");
            $(".tb_2").nextAll().removeClass("activeprev");
            $("#supplierId").val(data.data);
            $("#supplierDeclareId").val(data.data);
            $("#supplierPictureId").val(data.data)
            //alert(data.message);
        } else {
            alert(data.message);
        }
    });

    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);

    });
    return false;
}

function saveSupplierDeclarationDetails() {
    var request = $.ajax({
        url: apiUrl + "/users/supplierRegistration",
        method: "POST",
        data: $("#supplier-declare-form").serialize(),
        dataType: "json"
    });

    request.done(function (data) {
        if (data.status) {
            $(".tab-pane.active , .form-wizard .active").removeClass("active");
            $("#step-3 , .tb_3").addClass("active");
            $(".tb_3").prevAll().addClass("active");
            $(".tb_3").nextAll().removeClass("active");
            $(".tb_3").nextAll().removeClass("activeprev");
        } else {
            alert(data.message);
        }
    });

    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);

    });
    return false;
}

function otherDocMore() {
    $("#moreDoc").append($(".other_attachemts .add_file_row:first").clone());
    $("#moreDoc .plus_btn_wrap:last").remove();
    $("#moreDoc .remove_btn_wrap:last").remove();
    $(".other_attachemts .add_file_row:first .remove_btn_wrap").show();
}

function removeDocMore(e) {
    $("#moreDoc .add_file_row:last").remove();
}

function saveSupplierDocumentDetails() {
    var request = $.ajax({
        url: apiUrl + "/users/supplierRegistration",
        method: "POST",
        data: $("#supplier-document-form").serialize(),
        dataType: "json"
    });

    request.done(function (data) {
        if (data.status) {
            var formData = new FormData();
            formData.append('profile', $('#load_file')[0].files[0]);
            formData.append('id', $('#supplierPictureId').val());
            var request = $.ajax({
                url: apiUrl + "/users/supplierDocumentUpload",
                method: "POST",
                data: formData,
                dataType: "json",
                processData: false, // tell jQuery not to process the data
                contentType: false
            });

            request.done(function (data) {
                if (data.status) {
                    window.location.href = apiUrl + "/users/login";
                } else {
                    alert(data.message);
                }
            });

            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);

            });
        } else {
            alert(data.message);
        }
    });

    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);

    });
    return false;
}


function fileUpload() {
    var formData = new FormData();
    formData.append('other', $('#load_file1')[0].files[0]);
    formData.append('id', $('#supplierPictureId').val());

    var request = $.ajax({
        url: apiUrl + "/users/supplierDocumentUpload",
        method: "POST",
        data: formData,
        dataType: "json",
        processData: false, // tell jQuery not to process the data
        contentType: false
    });

    request.done(function (data) {
        if (data.status) {
            $('.add_more_feture_ul').append("<li id='" + data.id + "'><lable>" + data.name + "</lable><a onclick='removeImage(" + data.id + ")' href='javascript:void(0);'><img src='" + apiUrl + "/img/black-xross.png' alt='feature image'></a></li>");
            $("#load_file1").val('');
            $(".show_name1").empty();
        } else {
            alert(data.message);
        }
    });

    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);

    });
}

function removeImage(id) {
    if (confirm("Are you sure?")) {
        var request = $.ajax({
            url: apiUrl + "/users/supplierDocumentRemove",
            method: "POST",
            data: {id: id},
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                $("#" + id).remove();
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });

    }
}