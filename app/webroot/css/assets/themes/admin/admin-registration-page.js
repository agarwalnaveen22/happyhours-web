function saveSupplierDetails() {
    var request = $.ajax({
        url: apiUrl + "/users/supplierRegistration",
        method: "POST",
        data: $("#supplier-form").serialize(),
        dataType: "json"
    });

    request.done(function (data) {
        console.log(data)
        if (data.status) {
            
            $("#generalTab").removeClass("current");
            $("#declarationTab").addClass("current");
            $("#supplier-form").hide();
            $("#supplier-declare-form").show();
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
            $("#declarationTab").removeClass("current");
            $("#companyProfile").addClass("current");
            $("#supplier-declare-form").hide();
            $("#supplier-document-form").show();
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
                    window.location.href = apiUrl + "/users/supplierList";
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

function saveSupplierEditDocumentDetails() {
    var request = $.ajax({
        url: apiUrl + "/users/supplierRegistration",
        method: "POST",
        data: $("#supplier-declare-form").serialize(),
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
                    window.location.href = apiUrl + "/users/supplierList";
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

