/**
 * Created by Wizlight on 06.01.2016.
 */
angular
    .module('lessonEdit')
    .directive('editBlock', function ($compile) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    if (angular.element('.openCKE').length) {
                        alert(scope.editMsg);
                        return;
                    }
                    var orderBlock = element.attr('id').substring(1);
                    var template = '<textarea data-ng-cloak class="openCKE" ' +
                        'id="openCKE' + orderBlock + '" ng-init="editRedactor = getBlockHtml(' + orderBlock + ',' + idLecture + ');"  ' +
                        'ckeditor="editorOptions" name="editor" ng-model="editRedactor">' +
                        '</textarea>';
                    ($compile(template)(scope)).insertAfter(element);
                    element.hide();
                });
            }
        };
    })
    .directive('upBlock', function ($compile, $http) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    var order = element.parent().attr('id').substring(1);
                    $http({
                        url: basePath + '/lesson/upElement',
                        method: "POST",
                        data: $.param({idLecture: idLecture, order: order}),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                        .success(function () {
                            $.fn.yiiListView.update('blocks_list', {
                                complete: function () {
                                    var template = angular.element('#blockList').html();
                                    angular.element('#blockList').empty();
                                    angular.element('#blockList').append(($compile(template)(scope)));
                                    setTimeout(function () {
                                        MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                                    });
                                }
                            });
                        })
                        .error(function () {
                            alert(scope.errorMsg);
                        });
                });
            }
        };
    })
    .directive('downBlock', function ($compile, $http) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    var order = element.parent().attr('id').substring(1);
                    $http({
                        url: basePath + '/lesson/downElement',
                        method: "POST",
                        data: $.param({idLecture: idLecture, order: order}),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                        .success(function () {
                            $.fn.yiiListView.update('blocks_list', {
                                complete: function () {
                                    var template = angular.element('#blockList').html();
                                    angular.element('#blockList').empty();
                                    angular.element('#blockList').append(($compile(template)(scope)));
                                    setTimeout(function () {
                                        MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                                    });
                                }
                            });
                        })
                        .error(function () {
                            alert(scope.errorMsg);
                        });
                });
            }
        };
    })
    .directive('deleteBlock', function ($compile, $http) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    if (confirm(scope.deleteMsg)) {
                        var order = element.parent().attr('id').substring(1);
                        $http({
                            url: basePath + '/lesson/deleteElement',
                            method: "POST",
                            data: $.param({idLecture: idLecture, order: order}),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        })
                            .success(function () {
                                $.fn.yiiListView.update('blocks_list', {
                                    complete: function () {
                                        var template = angular.element('#blockList').html();
                                        angular.element('#blockList').empty();
                                        angular.element('#blockList').append(($compile(template)(scope)));
                                        setTimeout(function () {
                                            MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                                        });
                                    }
                                });
                            })
                            .error(function () {
                                alert(scope.errorMsg);
                            });
                    }
                });
            }
        };
    });