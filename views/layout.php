<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if (isset($data['title'])) echo $data['title'] ?> </title>
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
  <?php require './views/partials/_header.php'; ?>
  <main>
    <?php require $templatePath; ?>
  </main>
  <?php require './views/partials/_footer.php'; ?>
</body>
</html>