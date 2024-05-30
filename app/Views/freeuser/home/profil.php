    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="video">
                        <img src="<?= base_url('/sparlex');?>/img/about-1.jpg" class="img-fluid rounded" alt="">
                        <div class="position-absolute rounded border-5 border-top border-start border-white"
                            style="bottom: 0; right: 0;;">
                            <img src="<?= base_url('/sparlex');?>/img/about-2.jpg" class="img-fluid rounded" alt="">
                        </div>
                        <button type="button" class="btn btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="fs-4 text-uppercase text-primary">About Us</p>
                    <h1 class="display-4 mb-4">Your Best Spa, Beauty & Skin Care Center</h1>
                    <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled
                    </p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fab fa-gitkraken fa-3x text-primary"></i>
                                <div class="ms-4">
                                    <h5 class="mb-2">Special Offers</h5>
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-gift fa-3x text-primary"></i>
                                <div class="ms-4">
                                    <h5 class="mb-2">Special Offers</h5>
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                    <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book.
                    </p>
                    <a href="#" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5">Explore More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
