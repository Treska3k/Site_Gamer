<?php
// view/produtos.php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Produto.php';

// Carrega todos os produtos
$prods = Produto::all($pdo);
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebSite Gamer - Produtos</title>
  <link rel="stylesheet" href="/SiteGamer/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <!-- Page Hero -->
  <section class="page-hero">
    <div class="container text-center text-white">
      <h1>Produtos</h1>
      <p>Confira nossa seleção de periféricos gamers</p>
    </div>
  </section>

  <!-- Destaques de Produtos -->
  <section class="destaques py-5 bg-dark">
    <div class="container">
      <h2 class="text-white text-center mb-4">Destaques de Produtos</h2>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <!-- Card 1 -->
        <div class="col">
          <div class="card h-100 bg-transparent border-0 text-white">
            <img src="/SiteGamer/public/imgs/MouseRazer.jpg"
                 class="card-img-top rounded"
                 style="height:250px; object-fit:contain; object-position:center; background:#000;"
                 alt="Mouse Razer">
            <div class="card-body">
              <p class="card-text text-center">
                Razer DeathAdder Elite – design ergonômico e sensor de 16.000 DPI.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card h-100 bg-transparent border-0 text-white">
            <img src="/SiteGamer/public/imgs/TecladoRazer.webp"
                 class="card-img-top rounded"
                 style="height:250px; object-fit:contain; object-position:center; background:#000;"
                 alt="Teclado Razer">
            <div class="card-body">
              <p class="card-text text-center">
                Razer BlackWidow V3 – switches mecânicos táteis e RGB personalizável.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col">
          <div class="card h-100 bg-transparent border-0 text-white">
            <img src="/SiteGamer/public/imgs/KitRazer.jpg"
                 class="card-img-top rounded"
                 style="height:250px; object-fit:contain; object-position:center; background:#000;"
                 alt="Kit Razer">
            <div class="card-body">
              <p class="card-text text-center">
                Kit Ultimate – combo completo com mouse, teclado e headset.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 4 (Headset ajustado para aparecer completo) -->
        <div class="col">
          <div class="card h-100 bg-transparent border-0 text-white">
            <img src="/SiteGamer/public/imgs/HeadsetRazer.webp"
                 class="card-img-top rounded"
                 style="height:250px; object-fit:contain; object-position:center; background:#000;"
                 alt="Headset Razer">
            <div class="card-body">
              <p class="card-text text-center">
                Razer Kraken – som surround 7.1 e microfone com cancelamento de ruído.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Grid de produtos dinâmico (somente se houver produtos) -->
  <?php if (!empty($prods)): ?>
  <main class="container my-5">
    <div class="row g-4">
      <?php foreach ($prods as $p): ?>
        <div class="col-sm-6 col-lg-4">
          <div class="card h-100">
            <img src="<?= '/SiteGamer/public/imgs/' . htmlspecialchars($p['imagem'], ENT_QUOTES) ?>"
                 class="card-img-top" alt="<?= htmlspecialchars($p['nome'], ENT_QUOTES) ?>">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($p['nome'], ENT_QUOTES) ?></h5>
              <p class="card-text"><?= htmlspecialchars($p['descricao'], ENT_QUOTES) ?></p>
              <div class="mt-auto">
                <span class="fw-bold">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <?php endif; ?>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
