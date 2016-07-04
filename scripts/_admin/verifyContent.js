function initDirectory(url) {
    $jq.ajax({
        url: url,
        type: "POST",
        success: function () {
            bootbox.confirm("Операцію успішно виконано.", function () {
                load(basePath + "/_teacher/_admin/verifyContent/index");
            });
        },
        error: function () {
            showDialog();
        }
    });
}

function initWaitLectures() {
    $jq('#waitLecturesTable').DataTable({
        "ajax": {
            "url": basePath + "/_teacher/_admin/verifyContent/waitLecturesList",
            "dataSrc": "data"
        },
        "columns": [
            { "data": "module" },
            {
                "width": "10%",
                "data": "order" },
            { "data": "title" },
            {
                "width": "15%",
                "data": "type" },
            {
                "width": "15%",
                "data": "url",
                "render": function (url) {
                    return '<a href="#" onclick="setVerifyStatus(' + url + ')">Затвердити</a>';
                }
            }],

        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initVerifiedLectures() {
    $jq('#verifiedLecturesTable').DataTable({
        "ajax": {
            "url": basePath + "/_teacher/_admin/verifyContent/verifiedLecturesList",
            "dataSrc": "data"
        },
        "columns": [
            { "data": "module" },
            {
                "width": "10%",
                "data": "order"
            },
            { "data": "title" },
            {
                "width": "15%",
                "data": "type"
            },
            {
                "width": "15%",
                "data": "url",
                "render": function (url) {
                    return '<a href="#" onclick="setVerifyStatus(' + url + ')">Скасувати</a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function setVerifyStatus(url) {
    bootbox.confirm('Змінити статус лекції?', function (result) {
        if (result) {
            $jq.ajax({
                url: url,
                type: "POST",
                success: function () {
                    bootbox.confirm("Операцію успішно виконано.", function () {
                        load(basePath + "/_teacher/_admin/verifyContent/index");
                    });
                },
                error:function () {
                    showDialog("Операцію не вдалося виконати.");
                }
            });
        } else {
            showDialog("Операцію відмінено.");
        }
    });
}
