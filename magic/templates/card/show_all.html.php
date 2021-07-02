<?php include __DIR__ . '/../header.html.php' ?>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($cards ?? [] as $card) : ?>

            <div class="position-relative col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="position-absolute m-auto start-0 end-0 top-0 bottom-0 text-light spinner-border"></div>
                <div class="bg-dark mb-2" style="min-height: 13.5em;">
                    <a href="/cards/<?= $card->getName() ?>">

                        <img class="magic-card w-100 d-none" title="<?= $card->getName() ?>"
                             data-src="<?= $card->getImageUrl() ?>"/>
                    </a>
                </div>
            </div>

        <?php endforeach ?>
    </div>

    <script type="text/javascript">
        document.querySelectorAll(".magic-card").forEach((card) => {
            card.onload = () => {
                card.classList.remove("d-none");
                card.parentNode.parentNode.parentNode.removeChild(card.parentNode.parentNode.parentNode.querySelector(".spinner-border"));
            }
            card.setAttribute("src", card.getAttribute("data-src"));
            card.removeAttribute("data-src");
        });
    </script>

</div>

<?php include __DIR__ . '/../footer.html.php' ?>
