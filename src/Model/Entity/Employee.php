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

    const SEXO_MASCULINO = 1;    
    const SEXO_FEMININO = 2;
    const SEXO_AGENERO = 3;
    const SEXO_INTERSEXO = 4;
    const SEXO_NAO_INFORMADO = 5;

    const LIST_SEXO = [
        self::SEXO_MASCULINO,
        self::SEXO_FEMININO,
        self::SEXO_AGENERO,
        self::SEXO_INTERSEXO,
        self::SEXO_NAO_INFORMADO,
    ];

    const LIST_SEXO_STR = [
        self::SEXO_MASCULINO => 'Masculino',
        self::SEXO_FEMININO => 'Feminino',
        self::SEXO_AGENERO => 'Agênero',
        self::SEXO_INTERSEXO => 'Intersexo',
        self::SEXO_NAO_INFORMADO => 'Não Informado',
    ];

    const NACIONALIDADE_BRASILEIRA = 1;
    const NACIONALIDADE_AMERICANA = 2;
    const NACIONALIDADE_CANADENSE = 3;
    const NACIONALIDADE_MEXICANA = 4;
    const NACIONALIDADE_ARGENTINA = 5;
    const NACIONALIDADE_BRITANICA = 6;
    const NACIONALIDADE_ALEMÃ = 7;
    const NACIONALIDADE_FRANCESA = 8;
    const NACIONALIDADE_ESPANHOLA = 9;
    const NACIONALIDADE_ITALIANA = 10;
    const NACIONALIDADE_PORTUGUESA = 11;
    const NACIONALIDADE_CHINESA = 12;
    const NACIONALIDADE_JAPONESA = 13;
    const NACIONALIDADE_COREANA = 14;
    const NACIONALIDADE_INDIANA = 15;
    const NACIONALIDADE_RUSSA = 16;
    const NACIONALIDADE_AUSTRALIANA = 17;
    const NACIONALIDADE_SUL_AFRICANA = 18;
    const NACIONALIDADE_OUTRA = 19;

    const LIST_NACIONALIDADE = [
        self::NACIONALIDADE_BRASILEIRA, 
        self::NACIONALIDADE_AMERICANA, 
        self::NACIONALIDADE_CANADENSE, 
        self::NACIONALIDADE_MEXICANA, 
        self::NACIONALIDADE_ARGENTINA, 
        self::NACIONALIDADE_BRITANICA, 
        self::NACIONALIDADE_ALEMÃ, 
        self::NACIONALIDADE_FRANCESA, 
        self::NACIONALIDADE_ESPANHOLA, 
        self::NACIONALIDADE_ITALIANA, 
        self::NACIONALIDADE_PORTUGUESA, 
        self::NACIONALIDADE_CHINESA, 
        self::NACIONALIDADE_JAPONESA, 
        self::NACIONALIDADE_COREANA, 
        self::NACIONALIDADE_INDIANA, 
        self::NACIONALIDADE_RUSSA, 
        self::NACIONALIDADE_AUSTRALIANA, 
        self::NACIONALIDADE_SUL_AFRICANA,         
        self::NACIONALIDADE_OUTRA,
    ];

    const LIST_NACIONALIDADE_STR = [
        self::NACIONALIDADE_BRASILEIRA => "Brasileira",
        self::NACIONALIDADE_AMERICANA => "Americana",
        self::NACIONALIDADE_CANADENSE => "Canadense",
        self::NACIONALIDADE_MEXICANA => "Mexicana",
        self::NACIONALIDADE_ARGENTINA => "Argentina",
        self::NACIONALIDADE_BRITANICA => "Britânica",
        self::NACIONALIDADE_ALEMÃ => "Alemã",
        self::NACIONALIDADE_FRANCESA => "Francesa",
        self::NACIONALIDADE_ESPANHOLA => "Espanhola",
        self::NACIONALIDADE_ITALIANA => "Italiana",
        self::NACIONALIDADE_PORTUGUESA => "Portuguesa",
        self::NACIONALIDADE_CHINESA => "Chinesa",
        self::NACIONALIDADE_JAPONESA => "Japonesa",
        self::NACIONALIDADE_COREANA => "Coreana",
        self::NACIONALIDADE_INDIANA => "Indiana",
        self::NACIONALIDADE_RUSSA => "Russa",
        self::NACIONALIDADE_AUSTRALIANA => "Australiana",
        self::NACIONALIDADE_SUL_AFRICANA => "Sul-Africana",
        self::NACIONALIDADE_OUTRA => "Outra",
    ];

    const MODALIDADE_CONTRATO_CLT = 1;
    const MODALIDADE_CONTRATO_COOPERADO = 2;
    const MODALIDADE_CONTRATO_PJ = 3;
    const MODALIDADE_CONTRATO_ESTATUTO = 4;
    const MODALIDADE_CONTRATO_OUTRO = 5;    

    const LIST_MODALIDADE_CONTRATO = [
        self::MODALIDADE_CONTRATO_CLT,
        self::MODALIDADE_CONTRATO_COOPERADO,
        self::MODALIDADE_CONTRATO_PJ,
        self::MODALIDADE_CONTRATO_ESTATUTO,
        self::MODALIDADE_CONTRATO_OUTRO,
    ];

    const LIST_MODALIDADE_CONTRATO_STR = [
        self::MODALIDADE_CONTRATO_CLT => 'CLT',
        self::MODALIDADE_CONTRATO_COOPERADO => 'Cooperado',
        self::MODALIDADE_CONTRATO_PJ => 'Pessoa Jurídica',
        self::MODALIDADE_CONTRATO_ESTATUTO => 'Estatuto',
        self::MODALIDADE_CONTRATO_OUTRO => 'Outro',
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
