<x-backend.app-layout title="{{ $title }}">
    <div class="col-md-12">
        <div class="card table-card review-card">
            <div class="card-header borderless ">
                <h5>{{ $title }}</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option"></div>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="review-block">
                    <div class="row">
                        <div class="col-sm-auto p-r-0">
                            <img src="{{ asset('backend') }}/images/user/avatar-2.jpg" alt="user image"
                                class="img-radius profile-img cust-img m-b-15">
                        </div>
                        <div class="col">
                            <h6 class="m-b-5">
                                John Deo
                                <small class="float-right text-muted">
                                    bergabung sejak 2025
                                </small>
                            </h6>
                            <p class="m-t-5 m-b-15">
                                <span><b>Pengalaman:</b> 0 tahun</span> <br>
                                <b>Spesialisasi:</b> <br>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                the 1500s.
                            </p>
                        </div>
                    </div>
                    <div class="row border-top">
                        <div class="col-sm-auto p-r-0">
                            <img src="{{ asset('backend') }}/images/user/avatar-4.jpg" alt="user image"
                                class="img-radius profile-img cust-img m-b-15">
                        </div>
                        <div class="col">
                            <h6 class="m-b-15">
                                Allina D’croze
                                <small class="float-right text-muted">
                                    bergabung sejak 2025
                                </small>
                            </h6>
                            <p class="m-t-5 m-b-15">
                                <span><b>Pengalaman:</b> 0 tahun</span> <br>
                                <b>Spesialisasi:</b> <br>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                the 1500s.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend.app-layout>
