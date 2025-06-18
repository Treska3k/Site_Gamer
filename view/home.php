<?php
// view/home.php
session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebSite Gamer - Home</title>
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container text-center">
      <h1>Bem-vindo ao WebSite Gamer</h1>
      <p>Os melhores periféricos para elevar sua jogatina ao próximo nível.</p>
      <a href="produtos.php" class="btn btn-hero">Ver Produtos</a>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features">
    <div class="container">
      <div class="row gy-4">
        <div class="col-md-4">
          <div class="feature-card p-4 text-center">
            <i class="bi bi-controller"></i>
            <h5>Variedade de Produtos</h5>
            <p>Teclados, mouses, headsets e muito mais, das melhores marcas.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card p-4 text-center">
            <i class="bi bi-truck"></i>
            <h5>Frete Rápido</h5>
            <p>Entregamos na sua porta com rapidez e segurança.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card p-4 text-center">
            <i class="bi bi-shield-check"></i>
            <h5>Suporte Garantido</h5>
            <p>Estamos disponíveis para tirar suas dúvidas e oferecer assistência.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
