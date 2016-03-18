function load(url, header, histories, tab) {
    clearDashboard();
    if ((histories == undefined || histories == '') && history.state.url!=url) {
        history.pushState({url: url, header: header,tab:tab}, "");
    }
    $jq.ajax({
        url: url,
        async: true,
        success: function (data) {
            container = $jq('#pageContainer');
            container.html('');
            container.html(data);
            if (header) {
                $jq("#pageTitle").html(header);
            } else {
                $jq("#pageTitle").html('Особистий кабінет');
            }
        },
        error: function () {
            showDialog();
        }
    });
}

function reloadPage(event) {
    if (event.state) {
        var path = history.state.url;
        var header = history.state.header;
        load(path, header, true);
    }
}

function setTeacherRole(url) {
    var role = $jq("select[name=role] option:selected").val();
    var teacher = $jq("#teacher").val();
    $jq.ajax({
        url: url,
        type: 'post',
        async: true,
        data: {role: role, teacher: teacher},
        success: function (response) {
            if (response == "success") {
                bootbox.confirm("Операцію успішно виконано.", function () {
                    load(basePath + "/_teacher/_admin/teachers/showTeacher/id/" + teacher, 'Викладач');
                });
            } else {
                showDialog("Операцію не вдалося виконати.");
            }
        },
        error: function () {
            showDialog("Операцію не вдалося виконати.");
        }
    });
}

function cancelTeacherRole(url, role, teacher) {
    bootbox.confirm("Скасувати роль?", function (response) {
        if (response) {
            $jq.ajax({
                url: url,
                type: 'post',
                async: true,
                data: {role: role, teacher: teacher},
                success: function (response) {
                    if (response == "success") {
                        bootbox.confirm("Операцію успішно виконано.", function () {
                            load(basePath + "/_teacher/_admin/teachers/showTeacher/id/" + teacher, 'Викладач');
                        });
                    } else {
                        showDialog("Операцію не вдалося виконати.");
                    }
                },
                error: function () {
                    showDialog("Операцію не вдалося виконати.");
                }

            })
        } else {
            showDialog("Операцію відмінено.");
        }
    });
}

function loadPage(url) {
    $jq.ajax({
        url: url,
        success: function (data) {
            container = $jq('#pageContainer');
            container.html(data);
            $jq("#pageTitle").html("Особистий кабінет");
        },
        error: function () {
            showDialog();
        }
    });
}

function clearDashboard() {
    if (document.getElementById("dashboard"))
        document.getElementById("dashboard").style.display = "none";
}

//Modal windows
function showDialog(str) {
    if (str) {
        $jq('#modalText').html(str);
    }
    $jq('#myModal').modal('show');
}

function send(url) {
    clearDashboard();

    var jsonData = {
        "user": user,
        "subject": document.getElementById("subject"),
        "text": document.getElementById("text"),
        receivers: document.getElementById("receiver")
    };

    $jq.ajax({
        url: url,
        data: jsonData,
        type: 'post',
        success: function (data) {
            container = $jq('#pageContainer');
            container.html('');
            container.html(data);
        },
        error: function () {
            showDialog();
            location.reload();
        }
    });
}

function sendMessage(url) {
    receiver = $jq("#receiverId").val();
    if (receiver == "0") {
        bootbox.alert('Виберіть отримувача повідомлення.');
    } else {
        var posting = $jq.post(url,
            {
                "id": $jq("input[name=id]").val(),
                "receiver": receiver,
                "subject": $jq("input[name=subject]").val(),
                "text": $jq("#text").val(),
                "scenario": "new"
            }
        );

        posting.done(function (response) {
                if (response == "success") {
                    bootbox.alert("Ваше повідомлення успішно відправлено.", loadMessagesIndex);
                } else {
                    bootbox.alert("Повідомлення не вдалося відправити. Спробуйте надіслати пізніше або " +
                        "напишіть на адресу " + adminEmail, loadMessagesIndex);
                }
            })
            .fail(function () {
                bootbox.alert("Повідомлення не вдалося відправити. Спробуйте надіслати пізніше або " +
                    "напишіть на адресу " + adminEmail, loadMessagesIndex);
            });
    }
}

function reply(url) {
    var data = {
        "id": $jq("input[name=id]").val(),
        "receiver": $jq("input[name=receiver]").val(),
        "parent": $jq("input[name=parent]").val(),
        "subject": $jq("input[name=subject]").val(),
        "text": $jq("#text").val()
    };
    var posting = $jq.post(url, data);

    posting.done(function (response) {
            if (response == "success") {
                bootbox.alert("Ваше повідомлення успішно відправлено.", loadMessagesIndex);
            } else {
                bootbox.alert("Повідомлення не вдалося відправити. Спробуйте надіслати пізніше або " +
                    "напишіть на адресу " + adminEmail, loadMessagesIndex);
            }
        })
        .fail(function () {
            bootbox.alert("Повідомлення не вдалося відправити. Спробуйте надіслати пізніше або " +
                "напишіть на адресу " + adminEmail, loadMessagesIndex);
        });

}

function forward(url) {
    receiver = $jq("#receiverId").val();
    if (receiver == "0") {
        bootbox.alert('Виберіть отримувача повідомлення.');
    } else {
        var posting = $jq.post(url,
            {
                "id": $jq("input[name=id]").val(),
                "receiver": receiver,
                "subject": $jq("input[name=subject]").val(),
                "parent": $jq("input[name=parent]").val(),
                "forwardToId": $jq("input[name=forwardToId]").val(),
                "text": $jq("#text").val()
            }
        );

        posting.done(function (response) {
                if (response == "success") {
                    bootbox.alert("Ваше повідомлення успішно відправлено.", loadMessagesIndex);
                } else {
                    bootbox.alert("Повідомлення не вдалося відправити. Спробуйте надіслати пізніше або " +
                        "напишіть на адресу " + adminEmail, loadMessagesIndex);
                }
            })
            .fail(function () {
                bootbox.alert("Повідомлення не вдалося відправити. Спробуйте надіслати пізніше або " +
                    "напишіть на адресу " + adminEmail, loadMessagesIndex);
            });
    }
}

function loadMessagesIndex() {
    window.history.pushState(null, null, basePath + "/cabinet/#");
    load(basePath + "/_teacher/messages/index", 'Листування');
}

function loadForm(url, receiver, scenario, message) {
    idBlock = "#collapse" + message;
    $jq(idBlock).collapse('show');
    id = "#form" + message;
    var command = {
        "user": user,
        "message": message,
        "receiver": receiver,
        "scenario": scenario
    };

    $jq.post(url, {form: JSON.stringify(command)}, function () {
        })
        .done(function (data) {
            $jq(id).empty();
            $jq(id).append(data);
        })
        .fail(function () {
            showDialog();
        })
        .always(function () {
            },
            "json"
        );
}
function showAjaxLoader() {
    var el=document.getElementById('ajaxLoad');
    el.style.top = (window.pageYOffset+(document.body.clientHeight-200)/2 + "px");
    el.style.left = (window.pageXOffset+(document.body.clientWidth-400)/2 + "px");
    el.style.display = "block";
}
function hideAjaxLoader() {
    var el=document.getElementById('ajaxLoad');
    el.style.display = "none";
}
//open tabs by index after load page
function openTab(id, tabIndex){
    if (tabIndex != undefined) {
        $jq(id+' li:eq('+tabIndex+') a').tab('show');
    }
}


