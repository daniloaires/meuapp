<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PeoplesFixture
 */
class PeoplesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'tipo' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'email_sec' => 'Lorem ipsum dolor sit amet',
                'email_terc' => 'Lorem ipsum dolor sit amet',
                'rg' => 'Lorem ipsum dolor ',
                'cpf' => 'Lorem ipsum dolor ',
                'cnpj' => 'Lorem ipsum dolor sit amet',
                'inscricao_municipal' => 'Lorem ipsum dolor sit amet',
                'inscricao_estadual' => 'Lorem ipsum dolor sit amet',
                'telefone_fixo' => 'Lorem ipsum dolor ',
                'telefone_celular' => 'Lorem ipsum dolor ',
                'telefone_comercial' => 'Lorem ipsum dolor ',
                'created' => '2024-05-20 12:24:06',
                'modified' => '2024-05-20 12:24:06',
                'deleted' => '2024-05-20 12:24:06',
            ],
        ];
        parent::init();
    }
}
