<!-- Brand Update Modal -->
<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-close">&times;</span>

        <h2>Update Product</h2>
        <div class="row">
            <!-- Brand Select -->
            <div class="col-md-6">
                <label class="form-label">Brand<span class="text-danger">*</span></label>
                <select class="form-select" class="input-style" id="UpdateProductBrand">
                    <option value="none">Select Brand</option>
                </select>
            </div>

            <!-- Category Select -->
            <div class="col-md-6">
                <label class="form-label">Category<span class="text-danger">*</span></label>
                <select class="form-select" class="input-style" id="UpdateProductCategory">
                    <option value="none">Select Category</option>
                </select>
            </div>

            <!-- Unit Select -->
            <div class="col-md-6">
                <label class="form-label">Unit<span class="text-danger">*</span></label>
                <select class="form-select" class="input-style" id="UpdateProductUnit">
                    <option value="none">Select Unit</option>
                </select>
            </div>

            <!-- Supplier Select -->
            <div class="col-md-6">
                <label class="form-label">Supplier<span class="text-danger">*</span></label>
                <select class="form-select" class="input-style" id="UpdateProductSupplier">
                    <option value="none">Select Supplier</option>
                </select>
            </div>


            <div class="col-md-12">
                <div class="d-flex align-items-center mt-3">
                    <img class="w-25 me-3" id="oldImg"
                         src="{{ asset('images/default.jpg') }}" />
                    <div>
                        <label class="form-label">Photo</label>
                        <input oninput="updatePreview(this)" type="file" class="form-control"
                               id="UpdateProductImage">
                        <input class="d-none" id="updateID">
                    </div>
                </div>
            </div>



            <!-- Name Input -->
            <div class="col-md-6">
                <label class="form-label">Name<span class="text-danger">*</span></label>
                <input type="text" class="input-style" name="name" id="UpdateProductName" required />
            </div>

                        <!-- Code Input -->
                        <div class="col-md-6">
                            <label class="form-label">Code<span class="text-danger">*</span></label>
                            <input type="text" name="code" class="input-style" id="UpdateProductCode" required />
                        </div>


            <!-- Price Input -->
            <div class="col-md-6">
                <label class="form-label">Price<span class="text-danger">*</span></label>
                <input type="text" name="price" class="input-style" id="UpdateProductPrice" required />
            </div>

            <!-- Sell Price Input -->
            <div class="col-md-6">
                <label class="form-label">Sell Price<span class="text-danger">*</span></label>
                <input type="text" name="sell_price" class="input-style" id="UpdateProductSell" required />
            </div>

            <!-- Date Input -->
            <div class="col-md-6">
                <label class="form-label">Date<span class="text-danger">*</span></label>
                <input type="date" name="date" class="input-style" id="UpdateProductDate" required />
            </div>


            <!-- Status Dropdown -->
            <div class="col-lg-6">
                <label for="UpdateUnitStatus">Status<span class="text-danger">*</span></label>
                <select id="UpdateUnitStatus" class="form-control" required>
                    <option value="Active">Active</option>
                    <option value="InActive">Inactive</option>
                </select>
                <input type="hidden" id="updateID">
                <div class="upload-profile mt-4">
                    <button type="button" class="submit btn btn-primary" onclick="Update()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fetch Brand, Category, Unit, Supplier
    ProductBrandShow();
    ProductCategoryShow();
    ProductUnitShow();
    ProductSuprilerShow();

    async function ProductBrandShow() {
        try {
            let res = await axios.get("/api/brand-list", HeaderToken());
            let optionsHtml = res.data.BrandData.map(Brand => `<option value="${Brand.id}">${Brand.name}</option>`).join('');
            $("#UpdateProductBrand").html(`<option value="none" selected>Select Brand</option>` + optionsHtml);
        } catch (error) {
            console.error("Error fetching brands:", error);
        }
    }

    async function ProductCategoryShow() {
        try {
            let res = await axios.get("/api/category-list", HeaderToken());
            let optionsHtml = res.data.CategoryData.map(Category => `<option value="${Category.id}">${Category.category_name}</option>`).join('');
            $("#UpdateProductCategory").html(`<option value="none" selected>Select Category</option>` + optionsHtml);
        } catch (error) {
            console.error("Error fetching categories:", error);
        }
    }

    async function ProductUnitShow() {
        try {
            let res = await axios.get("/api/unit-list", HeaderToken());
            let optionsHtml = res.data.UnitData.map(Unit => `<option value="${Unit.id}">${Unit.unit_name}</option>`).join('');
            $("#UpdateProductUnit").html(`<option value="none" selected>Select Unit</option>` + optionsHtml);
        } catch (error) {
            console.error("Error fetching units:", error);
        }
    }

    async function ProductSuprilerShow() {
        try {
            let res = await axios.get("/api/supriler-list", HeaderToken());
            let optionsHtml = res.data.SuprilerData.map(Supriler => `<option value="${Supriler.id}">${Supriler.name}</option>`).join('');
            $("#UpdateProductSupplier").html(`<option value="none" selected>Select Supplier</option>` + optionsHtml);
        } catch (error) {
            console.error("Error fetching suppliers:", error);
        }
    }




    async function updatePreview(input, imageUrl) {
        const oldImg = document.getElementById('oldImg');

        if (input.files && input.files[0]) {
            oldImg.src = window.URL.createObjectURL(input.files[0]);
        } else if (imageUrl) {
            oldImg.src = imageUrl;
        } else {
            oldImg.src = "{{ asset('images/default.jpg') }}";
        }
    }



    // Fill form for updating product
    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();
            let res = await axios.post("/api/product-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            let data = res.data.rows;




            document.getElementById('UpdateProductBrand').value = data.brand_id;
            document.getElementById('UpdateProductCategory').value = data.category_id;
            document.getElementById('UpdateProductUnit').value = data.unit_id;
            document.getElementById('UpdateProductSupplier').value = data.suppliers_id;
            document.getElementById('UpdateProductName').value = data.name;
            document.getElementById('UpdateProductPrice').value = data.price;
            document.getElementById('UpdateProductSell').value = data.sell_price;
            document.getElementById('UpdateProductDate').value = data.date;
            document.getElementById('UpdateProductCode').value = data.code;
            document.getElementById('UpdateUnitStatus').value = data.status;
           // Update the preview with the existing image URL
         updatePreview(document.getElementById('UpdateProductImage'), data.img_url);

            openModal(document.getElementById('custom-modal-1'));
        } catch (e) {
            console.error("Error:", e.response);
        }
    }

    // Update Product
    async function Update() {
        try {
            let formData = new FormData();
            formData.append('brand_id', $('#UpdateProductBrand').val());
            formData.append('category_id', $('#UpdateProductCategory').val());
            formData.append('unit_id', $('#UpdateProductUnit').val());
            formData.append('suppliers_id', $('#UpdateProductSupplier').val());
            formData.append('name', $('#UpdateProductName').val());
            formData.append('price', $('#UpdateProductPrice').val());
            formData.append('sell_price', $('#UpdateProductSell').val());
            formData.append('date', $('#UpdateProductDate').val());
            formData.append('code', $('#UpdateProductCode').val());
            formData.append('status', $('#UpdateUnitStatus').val());
            formData.append('id', $('#updateID').val());

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/api/update-product", formData, config);
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message);
                closeModal(document.getElementById('custom-modal-1'));
                await getList(); // Refresh product list
            } else {
                errorToast(res.data.message);
            }
        } catch (e) {
            console.error("Error:", e.response);
        }
    }
</script>
