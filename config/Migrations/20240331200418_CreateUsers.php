<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('users');
        $table
            ->addColumn('username', 'string', [
                'limit' => 255,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('password', 'string', [
                'limit' => 256,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('role_id', 'integer', [
                'limit' => 11,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('created', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('modified', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addPrimaryKey(['id'])
            ->create();
    }
    
    public function down()
    {
        $this->table('users')->drop()->save();
    }
}
