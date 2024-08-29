# Formulário de Upload Opcional de Arquivos

Este projeto contém um formulário HTML para upload opcional de arquivos e um script PHP que processa o upload. O formulário aceita arquivos nos formatos `.jpeg`, `.jpg`, `.png` e `.pdf`.

## Estrutura do Projeto


/project-directory ├── upload_form.html ├── upload.php └── /uploads

- **`upload_form.html`**: Formulário HTML para enviar arquivos.
- **`upload.php`**: Script PHP para processar o upload dos arquivos.
- **`/uploads`**: Diretório onde os arquivos enviados serão armazenados.

## Arquivos

### 1. `upload_form.html`

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Upload</title>
</head>
<body>
    <h1>Upload de Arquivo Opcional</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Escolha um arquivo (opcional):</label>
        <input type="file" name="fileUpload" id="fileUpload" accept=".jpeg, .jpg, .png, .pdf">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

```

### 2. `upload.php`

```php
<?php
// Defina o diretório onde os arquivos serão armazenados
$uploadDir = 'uploads/';

// Verifique se o diretório existe, se não, crie-o
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Verifique se o arquivo foi enviado
if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == UPLOAD_ERR_OK) {
    // Obtenha informações do arquivo
    $fileTmpName = $_FILES['fileUpload']['tmp_name'];
    $fileName = basename($_FILES['fileUpload']['name']);
    $fileType = $_FILES['fileUpload']['type'];
    $fileSize = $_FILES['fileUpload']['size'];
    
    // Defina os tipos de arquivos permitidos
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
    
    // Verifique o tipo de arquivo
    if (in_array($fileType, $allowedTypes)) {
        // Defina o caminho completo do arquivo
        $uploadFilePath = $uploadDir . $fileName;
        
        // Mova o arquivo para o diretório de uploads
        if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
            echo "Arquivo enviado com sucesso: " . htmlspecialchars($fileName);
        } else {
            echo "Erro ao enviar o arquivo.";
        }
    } else {
        echo "Tipo de arquivo não permitido. Apenas arquivos JPEG, JPG, PNG e PDF são aceitos.";
    }
} else {
    echo "Nenhum arquivo enviado ou erro no envio.";
}
?>

```
### Explicação

1. **HTML Formulário (`upload_form.html`)**
   - O formulário usa `enctype="multipart/form-data"` para permitir o upload de arquivos.
   - O atributo `accept` no `<input type="file">` restringe a seleção de arquivos aos formatos especificados.

2. **Script PHP (`upload.php`)**
   - Verifica se um arquivo foi enviado e se não houve erro durante o upload.
   - Valida o tipo de arquivo contra uma lista de tipos permitidos.
   - Move o arquivo enviado para um diretório específico e exibe uma mensagem de sucesso ou erro.

Lembre-se de garantir que o diretório de uploads (`uploads/`) tenha permissões adequadas para que o PHP possa gravar arquivos nele. Este exemplo assume que o PHP tem permissão para criar diretórios e arquivos no local especificado.

### Configuração

Crie o Diretório de Uploads

Certifique-se de que o diretório uploads/ existe e tem permissões de escrita. Se o diretório não existir, o script PHP tentará criá-lo.

Permissões de Arquivo

Assegure-se de que o servidor web tem permissões adequadas para criar e escrever arquivos no diretório uploads/.

Testando o Upload

Abra o arquivo upload_form.html em um navegador e teste o envio de arquivos. O script upload.php processará o arquivo e exibirá uma mensagem de sucesso ou erro conforme apropriado.

### Licença

Este projeto está licenciado sob a Licença MIT.

