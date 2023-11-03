# Documentação do Código

Este é um breve resumo do código PHP fornecido, descrevendo sua funcionalidade e como ele funciona.

## Descrição

O código PHP fornecido realiza várias tarefas relacionadas à cópia de diretórios e manipulação de arquivos HTML. Aqui estão as principais ações realizadas pelo código:

1. **Cópia de Diretórios:** O código copia recursivamente o conteúdo de um diretório de origem para um diretório de destino no servidor.

2. **Manipulação de Arquivo HTML:** O código verifica a existência de um arquivo HTML e realiza várias substituições no seu conteúdo. Isso inclui a troca de imagens, textos e estilos no HTML.

3. **Mensagens de Saída:** O código imprime mensagens de sucesso, informando o nome da nova pasta criada e detalhes das operações realizadas.

## Funções

O código define duas funções principais:

1. `getNextWhiteLabelName($destination, $baseName)`: Esta função gera um novo nome de diretório baseado em `$baseName` para evitar conflitos de nomeação.

2. `copyDir($source, $destination)`: Esta função copia recursivamente o conteúdo do diretório de origem para o diretório de destino.

## Variáveis

O código utiliza as seguintes variáveis para configurar as operações:

- `$sourceFolder`: O diretório de origem a ser copiado.
- `$publicHtmlFolder`: O diretório de destino raiz onde a cópia será criada.
- `$baseFolderName`: O nome base para a nova pasta.
- `$newFolderName`: O nome da nova pasta gerado usando `getNextWhiteLabelName`.

## Uso

Para usar o código, siga os seguintes passos:

1. Defina as variáveis `$sourceFolder`, `$publicHtmlFolder`, e `$baseFolderName` com os valores apropriados.
2. Execute o código para copiar o diretório de origem para o diretório de destino.
3. O código também realiza a manipulação do arquivo HTML, como substituição de imagens e texto.

## Avisos

Certifique-se de ter as permissões adequadas para executar operações de arquivo/diretório no servidor.

## Exemplo

Aqui está um exemplo de como o código pode ser usado:

```php
// Defina as variáveis
$sourceFolder = '/caminho/do/diretorio/origem';
$publicHtmlFolder = '/caminho/do/diretorio/destino';
$baseFolderName = 'White_Labels';

// Copie o diretório de origem para o diretório de destino
$newFolderName = getNextWhiteLabelName($publicHtmlFolder, $baseFolderName);
$destinationFolderInPublicHtml = $publicHtmlFolder . '/' . $newFolderName;
copyDir($sourceFolder, $destinationFolderInPublicHtml);

// Manipule o arquivo HTML conforme necessário
// ...

// Imprima uma mensagem de sucesso
echo "Pasta '$newFolderName' criada com sucesso!";
