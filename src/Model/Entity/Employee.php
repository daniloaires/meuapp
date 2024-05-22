<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property int|null $estado_civil
 * @property int|null $qtde_filhos
 * @property int|null $sexo
 * @property int|null $nacionalidade
 * @property \Cake\I18n\FrozenDate|null $dt_nascimento
 * @property string|null $funcao
 * @property int|null $sector_id
 * @property int|null $modalidade_contrato
 * @property float|null $remuneracao
 * @property string|null $obs
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Sector $sector
 */
class Employee extends Entity
{
    const ESTADO_CIVIL_SOLTEIRO = 1;
    const ESTADO_CIVIL_CASADO = 2;
    const ESTADO_CIVIL_DIVORCIADO = 3;
    const ESTADO_CIVIL_UNIAO_ESTAVEL = 4;
    const ESTADO_CIVIL_VIUVO = 5;

    const LIST_ESTADO_CIVIL = [
        self::ESTADO_CIVIL_SOLTEIRO,
        self::ESTADO_CIVIL_CASADO,
        self::ESTADO_CIVIL_DIVORCIADO,
        self::ESTADO_CIVIL_UNIAO_ESTAVEL,
        self::ESTADO_CIVIL_VIUVO,
    ];

    const LIST_ESTADO_CIVIL_STR = [
        self::ESTADO_CIVIL_SOLTEIRO => 'Solteiro(a)',
        self::ESTADO_CIVIL_CASADO => 'Casado(a)',
        self::ESTADO_CIVIL_DIVORCIADO => 'Divorciado(a)',
        self::ESTADO_CIVIL_UNIAO_ESTAVEL => 'União Estável',
        self::ESTADO_CIVIL_VIUVO => 'Viúvo(a)',
    ];

    protected $_accessible = [
        'nome' => true,
        'cpf' => true,
        'rg' => true,
        'estado_civil' => true,
        'qtde_filhos' => true,
        'sexo' => true,
        'nacionalidade' => true,
        'dt_nascimento' => true,
        'funcao' => true,
        'sector_id' => true,
        'modalidade_contrato' => true,
        'remuneracao' => true,
        'obs' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'sector' => true,
    ];
}
