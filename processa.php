<?php
function getNextWhiteLabelName($destination, $baseName) {
    $i = 1;
    $newFolderName = $baseName;

    // Verifica se o novo nome de pasta já existe no diretório de destino
    while (is_dir($destination . '/' . $newFolderName)) {
        $i++;
        $newFolderName = $baseName . '_' . $i;
    }

    // Retorna o novo nome de pasta que não entra em conflito com as existentes
    return $newFolderName;
}

function copyDir($source, $destination) {
    // Verifica se o diretório de origem existe
    if (is_dir($source)) {
        // Cria o diretório de destino se ele não existir
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        $dir = opendir($source);
        while (false !== ($file = readdir($dir))) {
            // Ignora os diretórios "." e ".."
            if (($file != '.') && ($file != '..')) {
                $srcFile = $source . '/' . $file;
                $destFile = $destination . '/' . $file;

                // Verifica se o item é um diretório e chama a função recursivamente
                if (is_dir($srcFile)) {
                    copyDir($srcFile, $destFile);
                } else {
                    // Copia o arquivo
                    copy($srcFile, $destFile);
                }
            }
        }
        closedir($dir);
    }
}

$sourceFolder = '';
$publicHtmlFolder = '';
$baseFolderName = '';

// Gera um nome de pasta não existente no diretório de destino
$newFolderName = getNextWhiteLabelName($publicHtmlFolder, $baseFolderName);

// Constrói o caminho completo para o novo diretório de destino
$destinationFolderInPublicHtml = $publicHtmlFolder . '/' . $newFolderName;

// Copia o conteúdo do diretório de origem para o novo diretório de destino
copyDir($sourceFolder, $destinationFolderInPublicHtml);

$htmlFilePath = $destinationFolderInPublicHtml . '/index.html';

if (file_exists($htmlFilePath)) {
    $htmlContent = file_get_contents($htmlFilePath);

    // Substitui uma imagem no conteúdo HTML
    $newImageHtml = '<img src="" alt="Nova Logo" width="180" height="80">';

    // Realiza a substituição no conteúdo HTML
    $htmlContent = str_replace('<img decoding="async" width="199" height="100" src="" class="attachment-large size-large wp-image-206 entered lazyloaded" alt="" data-lazy-src="" data-ll-status="loaded">', $newImageHtml, $htmlContent);

    // Continuação do código...

    // Salva o conteúdo modificado de volta no arquivo HTML
    file_put_contents($htmlFilePath, $htmlContent);
}

// Repete o processo de leitura, manipulação e gravação do arquivo HTML para várias substituições

// Imprime mensagens de sucesso
echo "Oba!! <strong><font color='red'>'$newFolderName'</font></strong> criado com sucesso!";
echo "Todos os dados foram importados/modificados conforme!";
?>
