<!DOCTYPE html>
<html>
<head>
    <title>Edit Testimonial</title>
</head>
<body>
    <h1>Edit Testimonial</h1>

    <form action="/testimoni/update/<?= $testimonial['id'] ?>" method="post">
        <input type="hidden" name="_method" value="PUT">

        <label for="gambar">Gambar:</label>
        <input type="text" name="gambar" id="gambar" value="<?= $testimoni['gambar'] ?>" required><br>

        <label for="uraian">Uraian:</label>
        <textarea name="uraian" id="uraian" required><?= $testimoni['uraian'] ?></textarea><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
