<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Products List</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div>
                            <form action="#" method="POST" id="service-form" enctype="multipart/form-data">
                                <div class="row g-3 align-items-end">
                                    <div class="col-6">
                                            <label for="service_id" class="form-label">Product Id <span class="text-danger">*</span></label>
                                            <input type="text" id="product-search" class="form-control" placeholder="Enter Product Id">
                                            <div class="list-group suggestions" id="suggestions-list"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 position-relative">
                            <div class="input-group">
                                <input type="text" class="form-control" id="product-search" placeholder="Search products...">
                            </div>
                            <div class="list-group suggestions" id="suggestions-list"></div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<script>
    $(document).ready(function() {
        $(".service-info").hide();

        $("#service-form").on('submit', function(e) {
            e.preventDefault();
            $(".service-info").show();
        })
    });
</script>

<script>
    const products = [
        "Apple iPhone 14",
        "Samsung Galaxy S22",
        "Sony WH-1000XM5",
        "Dell XPS 13",
        "HP Spectre x360",
        "Logitech MX Master 3",
        "Bose QuietComfort 45",
        "Apple MacBook Pro 16",
        "Google Pixel 6",
        "Nintendo Switch"
    ];

    const searchBox = document.getElementById('product-search');
    const suggestionsList = document.getElementById('suggestions-list');

    searchBox.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase();
        suggestionsList.innerHTML = ''; // Clear previous suggestions

        if (query.length > 0) {
            const filteredProducts = products.filter(product => product.toLowerCase().includes(query));

            filteredProducts.forEach(product => {
                const div = document.createElement('a');
                div.classList.add('list-group-item', 'list-group-item-action', 'suggestion-item');
                div.textContent = product;

                div.addEventListener('click', () => {
                    searchBox.value = product; // Fill the input box with the selected suggestion
                    suggestionsList.innerHTML = ''; // Clear suggestions
                });

                suggestionsList.appendChild(div);
            });
        }
    });

    // Hide suggestions when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.position-relative')) {
            suggestionsList.innerHTML = ''; // Clear suggestions
        }
    });
</script>
<?php include('layouts/footer.php') ?>