<?php include('layouts/header.php') ?>

<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="card">


                <div class="card-body">
                    <img id="barcode"/>
                </div>


            </div>
        </div>

    </div>
</div> <!-- content -->

<script src="./assets/js/jsBarcode.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script> -->
<script>
    JsBarcode("#barcode", "123456789012", {
        format: "CODE128",
        lineColor: "#000",
        width: 2,
        height: 100,
        displayValue: true
    });
</script>

<?php include('layouts/footer.php') ?>