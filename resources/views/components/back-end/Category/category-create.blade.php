<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup">
                <div class="modal-title">
                    <h1>Create Brand</h1>
                    <span class="close-btn close">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="category_name" placeholder="Enter your Category name" id="CategoryName"/><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="country">
                            <select name="status" id="SelectStatus">
                                <option>Select Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select><br />
                        </label>
                        <button onclick="Save()" type="submit" class="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->

<script>
    async function Save() {
        try {
            let CategoryName = document.getElementById('CategoryName').value;
            let SelectStatus = document.getElementById('SelectStatus').value;

            if (CategoryName.length === 0) {
                errorToast("Category Name Required!");
            } else if (SelectStatus.length === 0) {
                errorToast("Status Required!");
            } else {
                let formData = new FormData();
                formData.append('category_name', CategoryName);
                formData.append('status', SelectStatus);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post("/api/create-category", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();
                    await getList();  // Refresh the list after creation
                } else {
                    errorToast(res.data['message']);
                }
            }
        } catch (e) {
            unauthorized(e.response.status);
        }
    }
</script>
