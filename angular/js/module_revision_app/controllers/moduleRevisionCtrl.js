angular
    .module('moduleRevisionsApp')
    .controller('moduleRevisionCtrl',moduleRevisionCtrl);

function moduleRevisionCtrl($rootScope,$scope, $http, getModuleData) {
    //load from service lecture data for scope
    getModuleData.getData(idRevision).then(function(response){
        $rootScope.moduleData=response;
        $scope.lectureInModule=$rootScope.moduleData.lectures;
    });

    getModuleData.getReleasedLecture().then(function(response){
        $scope.readyLectureRevisions=response;
    });
    
    // $scope.editPageRevision = function(pageId) {
    //     location.href=basePath+'/revision/editPageRevision?idPage='+pageId;
    // };

    $scope.addRevisionToModule= function (lectureRevisionId, index) {
        var revision=$scope.readyLectureRevisions[index];
        $scope.readyLectureRevisions.splice(index, 1);
        $scope.lectureInModule.push(revision);
    };
    $scope.removeRevisionFromModule= function (lectureRevisionId, index) {
        var revision=$scope.lectureInModule[index];
        $scope.lectureInModule.splice(index, 1);
        $scope.readyLectureRevisions.push(revision);
    };
    //reorder pages
    $scope.upRevisionInModule = function(lectureRevisionId, index) {
        if(index>0){
            var prevRevision=$scope.lectureInModule[index-1];
            $scope.lectureInModule[index-1]=$scope.lectureInModule[index];
            $scope.lectureInModule[index]=prevRevision;
        }
    };
    $scope.downRevisionInModule = function(lectureRevisionId, index) {
        if(index<$scope.lectureInModule.length-1){
            var nextRevision=$scope.lectureInModule[index+1];
            $scope.lectureInModule[index+1]=$scope.lectureInModule[index];
            $scope.lectureInModule[index]=nextRevision;
        }
    };

    $scope.editModuleRevision = function (object) {
        $.each(object, function(index) {
            object[index]['lecture_order']=index+1;
            object[index]['id_module_revision']=idRevision;
            delete object[index]['title'];
        });
        $http({
            url: basePath+'/moduleRevision/editModuleRevision',
            method: "POST",
            data: $.param({moduleLectures: JSON.stringify(object)}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            bootbox.alert("Зміни збережено");
        }, function errorCallback() {
            bootbox.alert("Зберегти зміни в ревізію не вдалося. Зв'яжіться з адміністрацією");
            return false;
        });
    };
    // $scope.previewRevision = function(url) {
    //     location.href=url;
    // };
    // //send revision for approve
    // $scope.sendRevision = function(id) {
    //     $http({
    //         url: basePath+'/revision/sendForApproveLecture',
    //         method: "POST",
    //         data: $.param({idRevision: id}),
    //         headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
    //     }).then(function successCallback(response) {
    //         if(response.data!='')
    //             bootbox.alert(response.data);
    //         else
    //         getLectureData.getData(idRevision).then(function(response){
    //             $rootScope.lectureData=response;
    //             location.href=basePath+'/revision/previewLectureRevision?idRevision='+idRevision;
    //         });
    //     }, function errorCallback() {
    //         bootbox.alert("Відправити заняття на затвердження не вдалося. Зв'яжіться з адміністрацією");
    //         return false;
    //     });
    // };
    // //canceled edit revision by the editor
    // $scope.cancelEditByEditor = function(id) {
    //     $http({
    //         url: basePath+'/revision/cancelEditRevisionByEditor',
    //         method: "POST",
    //         data: $.param({idRevision: id}),
    //         headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
    //     }).then(function successCallback() {
    //         getLectureData.getData(idRevision).then(function(response){
    //             $rootScope.lectureData=response;
    //             location.href=basePath+'/revision/previewLectureRevision?idRevision='+idRevision;
    //         });
    //     }, function errorCallback() {
    //         bootbox.alert("Відмінити ревізію автором не вдалося. Зв'яжіться з адміністрацією");
    //         return false;
    //     });
    // };
    // //add new page for lecture revision
    // $scope.addPage = function() {
    //     $http({
    //         url: basePath+'/revision/addPage',
    //         method: "POST",
    //         data: $.param({idRevision:idRevision}),
    //         headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
    //     }).then(function successCallback() {
    //         getLectureData.getData(idRevision).then(function(response){
    //             $rootScope.lectureData=response;
    //             $('body,html').animate({scrollTop: $(document).height()}, 500);
    //         });
    //     }, function errorCallback(response) {
    //         if(response.status==403){
    //             bootbox.alert('У вас недостатньо прав для редагування сторінки.');
    //         }
    //         return false;
    //     });
    // };

    // //check whether you can send the lecture for approval
    // $scope.checkLecture = function() {
    //     $http({
    //         url: basePath+'/revision/checkLecture',
    //         method: "POST",
    //         data: $.param({idRevision:idRevision}),
    //         headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
    //     }).then(function successCallback(response) {
    //         bootbox.alert(response.data);
    //     }, function errorCallback() {
    //         console.log('checkLecture error');
    //         return false;
    //     });
    // };
    // //approve lecture
    // $scope.approveLecture = function() {
    //     $http({
    //         url: basePath+'/revision/sendForApproveLecture',
    //         method: "POST",
    //         data: $.param({idLecture:idRevision}),
    //         headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
    //     }).then(function successCallback() {
    //         bootbox.alert('Запит на підтвердження відправлено', function () {
    //             location.href = basePath+'/revision/previewLectureRevision?idRevision=' + idRevision;
    //         });
    //     }, function errorCallback(response) {
    //         console.log('error '+response.status);
    //         return false;
    //     });
    // };
}
