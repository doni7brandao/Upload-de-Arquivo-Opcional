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
