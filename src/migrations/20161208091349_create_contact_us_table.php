<?php
/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/skeleton
 */

use Phinx\Migration\AbstractMigration;

/**
 * CreateContactUsTable
 */
class CreateContactUsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->execute('CREATE TABLE contact_us ( id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255), message TEXT NOT NULL, mark_read TINYINT(1) DEFAULT 0, mark_answered TINYINT(1) DEFAULT 0, created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, updated TIMESTAMP NOT NULL);');
    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('contact_us');
    }
}
