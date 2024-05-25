<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * People Entity
 *
 * @property int $id
 * @property int $tipo
 * @property string $nome
 * @property string|null $email
 * @property string|null $email_sec
 * @property string|null $email_terc
 * @property string $rg
 * @property string|null $cpf
 * @property string|null $cnpj
 * @property string|null $inscricao_municipal
 * @property string|null $inscricao_estadual
 * @property string|null $telefone_fixo
 * @property string|null $telefone_celular
 * @property string|null $telefone_comercial
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\AddressesPeople[] $addresses_peoples
 */
class People extends Entity
{
    const TIPO_PESSOA_CLIENTE = 1;
    const TIPO_PESSOA_FORNECEDOR = 2;

    const LIST_TIPO_PESSOA = [
        self::TIPO_PESSOA_CLIENTE,
        self::TIPO_PESSOA_FORNECEDOR,
    ];

    const LIST_TIPO_PESSOA_STR = [
        self::TIPO_PESSOA_CLIENTE => 'Cliente',
        self::TIPO_PESSOA_FORNECEDOR => 'Fornecedor',
    ];    

    // Definindo constantes para cada estado usando suas siglas
    const ESTADO_AC = 'AC';
    const ESTADO_AL = 'AL';
    const ESTADO_AP = 'AP';
    const ESTADO_AM = 'AM';
    const ESTADO_BA = 'BA';
    const ESTADO_CE = 'CE';
    const ESTADO_DF = 'DF';
    const ESTADO_ES = 'ES';
    const ESTADO_GO = 'GO';
    const ESTADO_MA = 'MA';
    const ESTADO_MT = 'MT';
    const ESTADO_MS = 'MS';
    const ESTADO_MG = 'MG';
    const ESTADO_PA = 'PA';
    const ESTADO_PB = 'PB';
    const ESTADO_PR = 'PR';
    const ESTADO_PE = 'PE';
    const ESTADO_PI = 'PI';
    const ESTADO_RJ = 'RJ';
    const ESTADO_RN = 'RN';
    const ESTADO_RS = 'RS';
    const ESTADO_RO = 'RO';
    const ESTADO_RR = 'RR';
    const ESTADO_SC = 'SC';
    const ESTADO_SP = 'SP';
    const ESTADO_SE = 'SE';
    const ESTADO_TO = 'TO';

    // Lista de todas as siglas dos estados
    const LIST_ESTADOS = [
        self::ESTADO_AC,
        self::ESTADO_AL,
        self::ESTADO_AP,
        self::ESTADO_AM,
        self::ESTADO_BA,
        self::ESTADO_CE,
        self::ESTADO_DF,
        self::ESTADO_ES,
        self::ESTADO_GO,
        self::ESTADO_MA,
        self::ESTADO_MT,
        self::ESTADO_MS,
        self::ESTADO_MG,
        self::ESTADO_PA,
        self::ESTADO_PB,
        self::ESTADO_PR,
        self::ESTADO_PE,
        self::ESTADO_PI,
        self::ESTADO_RJ,
        self::ESTADO_RN,
        self::ESTADO_RS,
        self::ESTADO_RO,
        self::ESTADO_RR,
        self::ESTADO_SC,
        self::ESTADO_SP,
        self::ESTADO_SE,
        self::ESTADO_TO,
    ];

    // Lista de todos os estados com suas siglas e nomes
    const LIST_ESTADOS_STR = [
        self::ESTADO_AC => 'Acre',
        self::ESTADO_AL => 'Alagoas',
        self::ESTADO_AP => 'Amapá',
        self::ESTADO_AM => 'Amazonas',
        self::ESTADO_BA => 'Bahia',
        self::ESTADO_CE => 'Ceará',
        self::ESTADO_DF => 'Distrito Federal',
        self::ESTADO_ES => 'Espírito Santo',
        self::ESTADO_GO => 'Goiás',
        self::ESTADO_MA => 'Maranhão',
        self::ESTADO_MT => 'Mato Grosso',
        self::ESTADO_MS => 'Mato Grosso do Sul',
        self::ESTADO_MG => 'Minas Gerais',
        self::ESTADO_PA => 'Pará',
        self::ESTADO_PB => 'Paraíba',
        self::ESTADO_PR => 'Paraná',
        self::ESTADO_PE => 'Pernambuco',
        self::ESTADO_PI => 'Piauí',
        self::ESTADO_RJ => 'Rio de Janeiro',
        self::ESTADO_RN => 'Rio Grande do Norte',
        self::ESTADO_RS => 'Rio Grande do Sul',
        self::ESTADO_RO => 'Rondônia',
        self::ESTADO_RR => 'Roraima',
        self::ESTADO_SC => 'Santa Catarina',
        self::ESTADO_SP => 'São Paulo',
        self::ESTADO_SE => 'Sergipe',
        self::ESTADO_TO => 'Tocantins',
    ];    

    protected $_accessible = [
        'tipo' => true,
        'nome' => true,
        'email' => true,
        'email_sec' => true,
        'email_terc' => true,
        'rg' => true,
        'cpf' => true,
        'cnpj' => true,
        'inscricao_municipal' => true,
        'inscricao_estadual' => true,
        'telefone_fixo' => true,
        'telefone_celular' => true,
        'telefone_comercial' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'addresses_peoples' => true,
    ];
}
