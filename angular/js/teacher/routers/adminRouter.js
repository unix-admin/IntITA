/**
 * Created by adm on 16.07.2016.
 */
angular
    .module('adminRouter',['ui.router']).
config(function ($stateProvider, $urlRouterProvider, $locationProvider) {
    $stateProvider
        .state('admin', {
            url: "/admin",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/admin/index",
        })
        .state('admin/carousel', {
            url: "/admin/carousel",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/carousel/index",
        })
        .state('admin/carousel/view/id/:id', {
            url: "/admin/carousel/view/id/:id",
            cache: false,
            controller:"mainSliderTableCtrl",
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/carousel/view/?id="+$stateParams.id;
            }
        })
        .state('admin/carousel/update/id/:id', {
            url: "/admin/carousel/update/id/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/aboutusSlider/update/?id="+$stateParams.id;
            }
        })
        .state('admin/aboutusSlider', {
            url: "/admin/aboutusSlider",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/aboutusSlider/index",
        })
        .state('admin/aboutusSlider/view/id/:id', {
            url: "/admin/aboutusSlider/view/id/:id",
            cache: false,
            controller:"aboutUsSliderTableCtrl",
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/aboutusSlider/view/?id="+$stateParams.id;
            }
        })
        .state('admin/aboutusSlider/update/id/:id', {
            url: "/admin/aboutusSlider/update/id/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/aboutusSlider/update/?id="+$stateParams.id;
            }
        })
        .state('admin/address', {
            url: "/admin/address",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/address/index",
        })
        .state('admin/verifycontent', {
            url: "/admin/verifycontent",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/verifyContent/index",
        })
        .state('admin/coursemanage', {
            url: "/admin/coursemanage",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/coursemanage/index",
        })
        .state('admin/teachers', {
            url: "/admin/teachers",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/teachers/index",
        })
        .state('admin/freelectures', {
            url: "/admin/freelectures",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/freeLectures/index",
        })
        .state('admin/permissions', {
            url: "/admin/permissions",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/permissions/index",
        })
        .state('admin/pay', {
            url: "/admin/pay",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/pay/index",
        })
        .state('admin/cancel', {
            url: "/admin/cancel",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/pay/cancelCourseModule",
        })

        .state('admin/users', {
            url: "/admin/users",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/users/index",
        })
        .state('admin/users/user/:id', {
            url: "/admin/users/user/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/user/index?id="+$stateParams.id;
            }
        })
        
        .state('admin/users/teacher/:id', {
            url: "/admin/users/teacher/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/teachers/showTeacher?id="+$stateParams.id;
            }
        })
        .state('admin/users/teacher/update/:id', {
            url: "/admin/users/teacher/update/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/teachers/update/?id="+$stateParams.id;
            }
        })
        .state('admin/teacher/create', {
            url: "/admin/teacher/create",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/teachers/create",
        })
        .state('admin/teacher/addTeacherRol/:id', {
            url: "/admin/teacher/addTeacherRole/:id",
            cache: false,
            controller: "teachersCtrl",
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/teachers/addTeacherRole/?id="+$stateParams.id;
            }
        })
        .state('admin/teacher/addModule/:id', {
            url: "/admin/teacher/addModule/:id",
            cache: false,
            controller: "teachersCtrl",
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/teachers/addModule/?id="+$stateParams.id;
            }
        })
        
        .state('admin/users/consultant/:id', {
            url: "/admin/users/consultant/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_content_manager/contentManager/showTeacher?id="+$stateParams.id;
            }
        })
        .state('carousel/:action/:order', {
            url: "/carousel/:action/:order",
            cache: false,
            controller: function ($stateParams, $http, $state, $location) {
                var url = basePath+'/_teacher/_admin/carousel/' + $stateParams.action + '/order/' + $stateParams.order;
                $http.get(url).success(function (data) {
                    $location.hash(url).replace();
                    $state.go('admin/carousel');
                });

            }
        })
        .state('aboutusSlider/:action/:order', {
            url: "/aboutusSlider/:action/:order",
            cache: false,
            controller: function ($stateParams, $http, $state, $location) {
                var url = basePath+'/_teacher/_admin/aboutusSlider/' + $stateParams.action + '/order/' + $stateParams.order;
                $http.get(url).success(function (data) {
                    $location.hash(url).replace();
                    $state.go('admin/aboutusSlider');
                });

            }
        })
        .state('admin/addmainsliderphoto', {
            url: "/admin/addmainsliderphoto",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/carousel/create",
        })
        .state('admin/addaboutussliderphoto', {
            url: "/admin/addaboutussliderphoto",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/aboutusSlider/create",
        })
        .state('admin/addcity', {
            url: "/admin/addcity",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/address/addCity",
        })
        .state('admin/addcountry', {
            url: "/admin/addcountry",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/address/addCountry",
        })
        .state('lecture/:action/:id', {
            url: "/lecture/:action/:id",
            cache: false,
            controller: function ($stateParams, $http, $state, $location) {
                var url = basePath+'/_teacher/_admin/verifyContent/'+$stateParams.action+'/id/' + $stateParams.id;
                bootbox.confirm('Змінити статус лекції?', function (result) {
                    if (result) {
                        $http.post(url).success(function(data) {
                           bootbox.confirm("Операцію успішно виконано.", function () {
                            })
                        }).error(function(data){
                            showDialog("Операцію не вдалося виконати.");
                        })
                    }
                    else {
                        showDialog("Операцію відмінено.");
                    }
                    $location.hash(url).replace();
                    $state.go('admin/verifycontent');
                })
            }
        })
        .state('admin/addcourse', {
            url: "/admin/addcourse",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/coursemanage/create",
        })
        .state('course/detail/:id', {
            url: "/course/detail/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/coursemanage/view?id="+$stateParams.id;
            }
        })
        .state('course/edit/:id', {
            url: "/course/edit/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/coursemanage/update/id/"+$stateParams.id;
            }
        })
        .state('course/schema/:id', {
            url: "/course/schema/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/coursemanage/schema/idCourse/"+$stateParams.id;
            }
        })
        .state('addLinkedCourse/:model/:course/:lang', {
            url: "/addLinkedCourse/:model/:course/:lang",
            cache: false,
            templateUrl: function ($stateParams) {
                console.log($stateParams.id);
                return basePath+"/_teacher/_admin/coursemanage/addLinkedCourse/model/"+$stateParams.model+"/course/"+$stateParams.course+"/lang/"+$stateParams.lang;
            }
        });
});





