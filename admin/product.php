<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <?php include("./links.php"); ?>
    
</head>
<body>
    <div class="containers">
        <?php include("./sidebar.php")?>
        <div class="right-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text-body-secondary">
                <span class="h5">All Products</span>
                <br />
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                <i class="fa-solid fa-user-plus fa-xs"></i>
                Add new product
            </button>
        </div>

            <table class="display table table-bordered table-striped table-hover align-middle" id="productTable" style="width: 100%;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="">Product ID</th>
                        <th scope="col" class="">Product Name</th>
                        <th scope="col" class="">Image</th>
                        <th scope="col" class="">Description</th>
                        <th scope="col" class="">Price</th>
                        <th scope="col" class="">Category ID</th>
                        <th scope="col" class="">Actions</th>
                    </tr> 
                </thead>
            </table>


            <!-- Add product offcanvas -->

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" style="width: 600px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add new product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form method="POST" id="addProductForm">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                            </div>
                            <div class="col">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Description">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="$ Price">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Upload Image</label>
                            <div class="col-2">
                                <img src="../images/noprofile.jpg" alt="" class="preview_img">
                            </div>
                            <div class="col-10">
                                <div class="file-upload text-secondary">
                                    <input type="file" class="image" name="image" accept="image/*">
                                    <span class="fs-4 fw-2">Choose file...</span>
                                    <span>or drag and drop file here</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="number" id="category_id" name="category_id" placeholder="Category ID">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- edit user offcanvas -->

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditProduct" style="width: 600px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add new product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form method="POST" id="editProductForm">
                    <input type="hidden" name="id" id="id">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                            </div>
                            <div class="col">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Description">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="$ Price">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Upload Image</label>
                            <div class="col-2">
                                <img src="images/noprofile.jpg" alt="" class="preview_img">
                            </div>
                            <div class="col-10">
                                <div class="file-upload text-secondary">
                                    <input type="file" class="image" name="image" accept="image/*">
                                    <input type="hidden" name="image_old" id="image_old">
                                    <span class="fs-4 fw-2">Choose file...</span>
                                    <span>or drag and drop file here</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="number" id="category_id" name="category_id" placeholder="Category ID">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-1" id="editBtn">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>



            <!-- Toast Container -->
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <!--success toast-->
                <div class="toast align-items-center text-bg-success" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
                    <div class="d-flex">
                        <div class="toast-body">
                        <strong>Success!</strong>
                        <span id="successMsg"></span>
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                <!--error toast-->
                <div class="toast align-items-center text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast">
                    <div class="d-flex">
                        <div class="toast-body">
                        <strong>Error!</strong>
                        <span id="errorMsg"></span>
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("./script.php");?>    

    <script>
        $(document).ready(function() {
           //call fetchData function
            fetchData();

            let table = new DataTable("#productTable");

            // function to display image before upload
            $("input.image").change(function () {
                var file = this.files[0];
                var url = URL.createObjectURL(file);
                $(this).closest(".row").find(".preview_img").attr("src", url);
            });

            function fetchData() {
                $.ajax({
                    url: "./api/product.api.php?action=fetchData",
                    type: "POST",
                    dataType: "json",
                    success: function(response){
                        var data = response.data;
                        table.clear().draw();
                        $.each(data, function(index, value) {
                            table.row.add([
                                value.id,
                                value.product_name,
                                '<img src="uploads/' +
                                    value.image +
                                    '" style="width:50px; height:50px; border:2px solid gray; border-radius: 8px;object-fit:cover;">',
                                value.description,
                                value.price,
                                value.category_id,
                                '<Button type="button" class="btn editBtn" value="' +
                                    value.id +
                                    '"><i class="fa-solid fa-pen-to-square fa-xl"></i></Button>' +
                                '<Button type="button" class="btn deleteBtn" value="' +
                                    value.id +
                                    '"><i class="fa-solid fa-trash fa-xl"></i></Button>' +
                                    '<input type="hidden" class="delete_image" value="' +
                                    value.image +
                                    '">',
                            ]).draw(false);
                        });
                    } 
                })
            }
            // function to insert data to database

            $("#addProductForm").on("submit", function(e) {
                e.preventDefault();
                $("#insertBtn").attr("disabled", "disabled");

                $.ajax({
                    url: "./api/product.api.php?action=insertData",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response){
                        var response = JSON.parse(response);
                        if(response.statusCode === 200){
                            fetchData();
                            $("#insertBtn").removeAttr("disabled");
                            $("#addProductForm")[0].reset();
                            $("#successToast").toast("show");
                            $("#successMsg").html(response.message);
                            $("#offcanvasAddUser").offcanvas("hide")
                        } else if (response.statusCode === 500) {
                            $("#errorToast").toast("show");
                            $("#errorMsg").html(response.message);
                        }
                    }
                })
            })


            // function to edit data
            $("#productTable").on("click", ".editBtn", function(){
                var id = $(this).val();
                $.ajax({
                    url: "./api/product.api.php?action=fetchSingle",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id,
                    },
                    success: function(response){
                        var data = response.data;

                        $("#editProductForm #id").val(data.id);
                        $("#editProductForm input[name='product_name']").val(data.product_name);
                        $("#editProductForm input[name='description']").val(data.description);
                        $("#editProductForm input[name='price']").val(data.price);
                        $("#editProductForm input[name='category_id']").val(data.category_id);
                        $("#editProductForm .preview_img").attr("src", "uploads/" + data.image + "");
                        $("#editProductForm #image_old").val(data.image);
                        $("#offcanvasEditProduct").offcanvas("show");
                    }
                    
                })
            })


            //function to update data in database
            $("#editProductForm").on("submit", function (e) {
                $("#editBtn").attr("disabled", "disabled");
                e.preventDefault();

                $.ajax({
                    url: "./api/product.api.php?action=updateData",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        var response = JSON.parse(response);

                        if (response.statusCode == 200) {
                        $("#offcanvasEditProduct").offcanvas("hide");
                        $("#editBtn").removeAttr("disabled");
                        $("#editProductForm")[0].reset();
                        $(".preview_img").attr("src", "images/noprofile.jpg");
                        $("#successToast").toast("show");
                        $("#successMsg").html(response.message);
                        fetchData();
                        } else if (response.statusCode == 500) {
                        $("#offcanvasEditProduct").offcanvas("hide");
                        $("#editBtn").removeAttr("disabled");
                        $("editProductForm")[0].reset();
                        $(".preview_img").attr("src", "images/noprofile.jpg");
                        $("#errorToast").toast("show");
                        $("#errorMsg").html(response.message);
                        } else if (response.statusCode === 400) {
                        $("#editBtn").removeAttr("disabled");
                        $("#errorToast").toast("show");
                        $("#errorMsg").html(response.message);
                        }
                    },
                });
            });


            // function to delete data from database

            $("#productTable").on("click", ".deleteBtn", function(){
                if(confirm("Are you sure you want to delete this use?")){
                    var id = $(this).val();
                    var delete_image = $(this).closest("td").find(".delete_image").val();
                    $.ajax({
                        url: "./api/product.api.php?action=deleteData",
                        type: "POST",
                        dataType: "json",
                        data: {
                            id,
                            delete_image
                        },
                        success: function(response){
                            if(response.statusCode === 200){
                                fetchData();
                                $("#successToast").toast("show");
                                $("#successMsg").html(response.message);
                            } else if(response.statusCode === 500){
                                $("#errorToast").toast("show");
                                $("#errorMsg").html(response.message);
                            }
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>
