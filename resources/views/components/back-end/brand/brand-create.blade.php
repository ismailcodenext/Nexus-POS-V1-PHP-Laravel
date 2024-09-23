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
                        <div class="upload-profile">
                            <div class="item">
                                <div class="img-box">
                                    <svg width="32" height="32" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="50" height="50" fill="url(#pattern0_1204_6)" fill-opacity="0.5" />
                                        <defs>
                                            <pattern id="pattern0_1204_6" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_1204_6" transform="scale(0.005)" />
                                            </pattern>
                                            <image id="image0_1204_6" width="200" height="200" />
                                        </defs>
                                    </svg>
                                </div>

                                <div class="profile-wrapper">
                                    <label class="custom-file-input-wrapper">
                                        <input type="file" class="custom-file-input" aria-label="Upload Photo" id="BrandImg" />
                                    </label>
                                    <p>PNG, JPEG or GIF (up to 1 MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6"></div>

                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="brand_name" placeholder="Enter your full name" id="BrandName" required /><br />
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
            let BrandName = document.getElementById('BrandName').value;
            let SelectStatus = document.getElementById('SelectStatus').value;
            let imgInput = document.getElementById('BrandImg');
            let imgFile = imgInput.files[0];

            if (BrandName.length === 0) {
                errorToast("Brand Name Required !");
            } else if (SelectStatus.length === 0) {
                errorToast("Status Required !");
            } else if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            } else {
                let formData = new FormData();
                formData.append('brand_name', BrandName); // Field name as expected in controller
                formData.append('status', SelectStatus);  // Field name as expected in controller
                formData.append('img', imgFile);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                let res = await axios.post("/api/create-brand", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();
                    await getList();
                } else {
                    errorToast(res.data['message'])
                }
            }
        } catch (e) {
            unauthorized(e.response.status)
        }
    }
</script>
