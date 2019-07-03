<?php
/**
 * Arquivo de Configuração da PHAN = Ferramenta de análise estática
 */
return [

    //versão do php
    "target_php_version" => 7.2,

    // Lista de diretórios que DEVEM ser analisados. // Os arquivos serão analisados estaticamente em busca de erros.
    'directory_list' => [
        'src',
        'vendor/symfony/dom-crawler',
        'vendor/guzzlehttp/guzzle',
        'vendor/psr/http-message'
    ],

    // Lista de diretórios que NÃO devem ser analisados.
    "exclude_analysis_directory_list" => [
        'vendor/'
    ],

    // Lista de plugins úteis ao PHAN
    'plugins' => [
        'AlwaysReturnPlugin',      // => Sempre retornar
        'UnreachableCodePlugin',   // => Código não encontrado
        'DollarDollarPlugin',      // => Variável-variável
        'DuplicateArrayKeyPlugin', // => Chave duplicada
        'PregRegexCheckerPlugin',  // => Checa se há expressões regulares inválidas
        'PrintfCheckerPlugin',     // => Checa se há cadeias de caracteres inválidos
    ]

];