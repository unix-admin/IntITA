<div class="col-lg-12">
    <br>
    <a type="button" class="btn btn-primary" ng-href="#/admin/users/addrole/author">
        Призначити автора контента
    </a>
    <a title="Експорт" class="glyphicon glyphicon-floppy-disk btn btn-primary pull-right" style="margin: 5px;"
       href="/_teacher/_admin/users/export/type/authors">
    </a>
    <br>
    <br>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table ng-table="authorsTableParams" class="table table-bordered table-striped table-condensed">
                    <tr ng-repeat="row in $data track by $index">
                        <td data-title="'ПІБ'" filter="{'user.fullName': 'text'}" sortable="'user.fullName'">
                            <a ng-href="#/admin/users/user/{{row.id_user}}">{{row.user.firstName}} {{row.user.middleName}} {{row.user.secondName}}</a>
                        </td>
                        <td data-title="'Email'" sortable="'user.email'" filter="{'user.email': 'text'}">
                            <a ng-href="#/admin/users/user/{{row.id_user}}">{{row.user.email}}</a>
                        </td>
                        <td data-title="'Призначено'" filter="{'start_date': 'text'}" sortable="'start_date'">{{row.start_date}}</td>
                        <td data-title="'Профіль'"><a ng-href="/profile/{{row.id_user}}" target="_blank">Профіль</a></td>
                        <td data-title="'Відправити листа'">
                            <a class="btnChat"  ng-href="#/newmessages/receiver/{{row.id_user}}"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">
                                <i class="fa fa-envelope fa-fw"></i>
                            </a>
                        </td>
                        <td data-title="'Скасувати роль'"><a ng-if="!row.end_date" ng-click="cancelRole(row.id_user,'author')"><i class="fa fa-trash fa-fw"></i></a></td>
                        <td data-title="'Додати'"><a type="button" class="btn btn-primary" ng-href="#/admin/teacher/{{row.id_user}}/editRole/role/author">модуль</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>