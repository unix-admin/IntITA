<?php
/* @var $this MailTemplatesController */
/* @var $model MailTemplates */
/* @var $form CActiveForm */
?>

<div class="form" ng-controller="mailTemplatesCtrl">

	<div class="panel panel-primary" >
		<div class="panel-body">
			<form name="mailTemplateForm" novalidate>
				<div class="form-group">
					<label>Назва шаблону</label>
					<br>
					<input type="text" class="form-control" name="title" placeholder="Введіть назву шаблону"
						   size="90" required ng-model="mailTemplateModel.title">
					<br>
				</div>
				<div class="form-group">
					<label>Тема повідомлення</label>
					<br>
					<input type="text" class="form-control" name="title" placeholder="Введіть тему повідомлення"
						   size="90" required ng-model="mailTemplateModel.subject">
					<br>
				</div>
				<div class="form-group">
					<label>Текст електронного листа</label>
					<br>
					<textarea ckeditor="editorOptions" rows="10" cols="45"class="form-control" name="text" id="text" placeholder="Введіть текст листа"
						   size="90" required ng-model="mailTemplateModel.text"></textarea>
					<br>
				</div>
				<div class="form-group">
                    <label>Видимість шаблону</label>
					<select class="form-control" name="active" ng-model="mailTemplateModel.active">
						<option value="1">Видимий</option>
						<option value="0">Не видимий</option>
					</select><br>
				</div>
                <div class="form-group">
                    <label>Тип шаблону</label>
                    <select class="form-control" name="active" ng-model="mailTemplateModel.template_type">
                        <option value="1">Розсилка</option>
                        <option value="2">Повідомлення про завдання</option>
                    </select><br>
                </div>
                <div class="form-group" ng-show="mailTemplateModel.template_type == 2">
                    <label>Параметри повідомлення</label>
                    <br>
                    <ul>
                        <li>{userName} - Повне ім'я користувача </li>
                        <li>{taskName} - Назва завдання </li>
                        <li>{taskLink} - Посилання на завдання </li>
                    </ul>
                    <br>
                </div>
				<button class="btn btn-primary" ng-click="addMailTemplate()">
					<span ng-if="!mailTemplateModel.id">Створити шаблон</span>
					<span ng-if="mailTemplateModel.id">Змінити шаблон</span>
				</button>
				<button type="reset" class="btn btn-default" ng-click="changeView('newsletter/templates')">
					Скасувати
				</button>
			</form>
			<br>

		</div>

	</div>

</div><!-- form -->
