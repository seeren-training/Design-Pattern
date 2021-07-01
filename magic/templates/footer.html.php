</main>

<footer class="navbar navbar-dark bg-dark">
    <div class="container-fluid justify-content-center">
        <a href="?<?= http_build_query([
            "color" => $options["colors"] ?? null,
            "page" => $options["page"] - 1
        ]) ?>" class="<?= 1 === $options["page"] ? "disabled" : null ?> btn btn-secondary me-2">Prev</a>
        <a href="?<?= http_build_query([
                "color" => $options["colors"] ?? null,
                "page" => $options["page"] + 1
        ]) ?>" class="btn btn-secondary ms-2">Next</a>
    </div>
</footer>

<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>