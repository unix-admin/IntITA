<?php

class m151022_122312_create_table_acc_course_service extends CDbMigration
{
	public function up()
	{
        $this->createTable('acc_course_service', array(
            'service_id' => 'INT(10) UNSIGNED NOT NULL COMMENT `Service code`',
            'course_id' => 'INT(11) NOT NULL COMMENT `Course code`',
            'INDEX `service_id` (`service_id`, `course_id`)',
            'INDEX `course_id` (`course_id`)'
        ), "COLLATE='utf8_general_ci' ENGINE=InnoDB;"
        );
	}

	public function safeDown()
	{
        $this->dropIndex('service_id', 'acc_course_service');
        $this->dropIndex('course_id', 'acc_course_service');
        $this->dropTable('acc_course_service');
	}
}