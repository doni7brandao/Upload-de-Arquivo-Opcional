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
