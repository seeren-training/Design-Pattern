<?php include __DIR__ . '/../header.html.php' ?>

    <section class="container">
        <div class="row my-4">
            <?php foreach ($cards ?? [] as $card): ?>
                <div class="col col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                    <a href="/<?= urlencode($card->getName()) ?>">
                        <img title="<?= $card->getName() ?>" class="w-100" src="<?= $card->getImage() ?>">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row my-2">
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

<?php include __DIR__ . '/../footer.html.php' ?>