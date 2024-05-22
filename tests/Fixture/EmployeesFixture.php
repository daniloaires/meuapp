<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeesFixture
 */
class EmployeesFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'cpf' => 'Lorem ipsum ',
                'rg' => 'Lorem ipsum dolor ',
                'estado_civil' => 1,
                'qtde_filhos' => 1,
                'sexo' => 1,
                'nacionalidade' => 1,
                'dt_nascimento' => '2024-05-22',
                'funcao' => 'Lorem ipsum dolor sit amet',
                'sector_id' => 1,
                'modalidade_contrato' => 1,
                'remuneracao' => 1,
                'obs' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2024-05-22 16:09:27',
                'modified' => '2024-05-22 16:09:27',
                'deleted' => '2024-05-22 16:09:27',
            ],
        ];
        parent::init();
    }
}
