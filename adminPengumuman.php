<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST["pengumuman_content"];
    file_put_contents("pengumuman.txt", $content);
    updateIndexPengumuman($content);
    exit;
}

function updateIndexPengumuman($content)
{
    $indexFilePath = "../index.php";
    $indexFileContent = file_get_contents($indexFilePath);
    $updatedContent = preg_replace("/<p>(.*?)<\/p>/", "<p>$content</p>", $indexFileContent);
    file_put_contents($indexFilePath, $updatedContent);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #808080;">
<form id="pengumumanForm" method="POST" onsubmit="return updatePengumuman()" style="max-width: 800px; width: 100%; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column;">

    <h1 style="text-align: center;">Admin Pengumuman</h1>

    <label for="pengumuman_content" style="font-weight: bold;">Pengumuman:</label>
    <textarea name="pengumuman_content" id="pengumuman_content" rows="6" style="width: calc(100% - 22px); padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; box-sizing: border-box;" placeholder="Masukkan pengumuman Anda di sini"><?php echo file_get_contents("pengumuman.txt"); ?></textarea>

    <input type="submit" value="Simpan perubahan" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; margin-top: 10px; width: calc(100% - 22px);">
    <input type="button" value="Kembali" onclick="window.location.href='./homeAdmin.php';" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; margin-top: 10px; width: calc(100% - 22px); text-align: center;">
</form>

    <div id="alert" style="display: none; background-color: #4CAF50; color: white; padding: 10px; margin-top: 20px; border-radius: 4px; text-align: center;">
        Pengumuman berhasil disimpan.
    </div>
    <script>
        function updatePengumuman() {
            var form = document.getElementById("pengumumanForm");
            var formData = new FormData(form);

            fetch('adminPengumuman.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => {
                    if (response.ok) {
                        window.alert('Pengumuman berhasil disimpan.');
                        window.location.href = 'homeAdmin.php';
                        return true;
                    } else {
                        return false;
                    }
                })
                .catch(error => console.error('Error:', error));

            return false;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>