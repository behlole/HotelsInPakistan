@extends('useradmin.master')



@section('userdash')
<div class="col-md-9">
    <div class="user-form-settings">
        <div class="breadcrumb-page-bar" aria-label="breadcrumb">
            <ul class="page-breadcrumb">
                <li class="">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class=" ">
                    <a href="space">Manage Spaces</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class=" active">
                    All
                </li>
            </ul>
            <div class="bravo-more-menu-user">
                <i class="icofont-settings"></i>
            </div>
        </div>
        <h2 class="title-bar">
            Manage Spaces
            <a href="/space/add" class="btn-change-password">Add Space</a>
        </h2>
        <div class="bravo-list-item">
            <div class="bravo-pagination">
                <span class="count-string">Showing 1 - 3 of 3 Spaces</span>

            </div>
            <div class="list-item">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item-list">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="featured">
                                        Featured
                                    </div>
                                    <div class="thumb-image">
                                        <a href="http://localhost:8001/space/lily-dale-village" target="_blank">
                                            <img src="http://localhost:8001/uploads/demo/space/space-10.jpg"
                                                class="img-responsive" alt="">
                                        </a>
                                        <div class="service-wishlist " data-id="10" data-type="space">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="item-title">
                                        <a href="http://localhost:8001/space/lily-dale-village" target="_blank">
                                            LILY DALE VILLAGE
                                        </a>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-paper-plane"></i>
                                        Location: Paris
                                    </div>
                                    <div class="location">
                                        <i class="icofont-money"></i>
                                        Price: <span class="sale-price"></span> <span class="price">$250</span>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-ui-settings"></i>
                                        Status: <span class="badge badge-publish">publish</span>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-wall-clock"></i>
                                        Last Updated: 10/10/2020 12:46
                                    </div>
                                    <div class="control-action">
                                        <a href="http://localhost:8001/user/space/clone/10" target="_blank"
                                            class="btn btn-primary">Clone</a>
                                        <a href="http://localhost:8001/space/lily-dale-village" target="_blank"
                                            class="btn btn-info">View</a>
                                        <a href="http://localhost:8001/user/space/edit/10"
                                            class="btn btn-warning">Edit</a>
                                        <a href="http://localhost:8001/user/space/del/10" class="btn btn-danger"
                                            data-confirm="Do you want to delete?">Del</a>
                                        <a href="http://localhost:8001/user/space/bulkEdit/10?action=make-hide"
                                            class="btn btn-secondary">Make hide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="item-list">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="featured">
                                        Featured
                                    </div>
                                    <div class="thumb-image">
                                        <a href="http://localhost:8001/space/luxury-apartment" target="_blank">
                                            <img src="http://localhost:8001/uploads/demo/space/space-2.jpg"
                                                class="img-responsive" alt="">
                                        </a>
                                        <div class="service-wishlist " data-id="2" data-type="space">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="item-title">
                                        <a href="http://localhost:8001/space/luxury-apartment" target="_blank">
                                            LUXURY APARTMENT
                                        </a>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-paper-plane"></i>
                                        Location: California
                                    </div>
                                    <div class="location">
                                        <i class="icofont-money"></i>
                                        Price: <span class="sale-price"></span> <span class="price">$900</span>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-ui-settings"></i>
                                        Status: <span class="badge badge-publish">publish</span>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-wall-clock"></i>
                                        Last Updated: 10/10/2020 12:46
                                    </div>
                                    <div class="control-action">
                                        <a href="http://localhost:8001/user/space/clone/2" target="_blank"
                                            class="btn btn-primary">Clone</a>
                                        <a href="http://localhost:8001/space/luxury-apartment" target="_blank"
                                            class="btn btn-info">View</a>
                                        <a href="http://localhost:8001/user/space/edit/2"
                                            class="btn btn-warning">Edit</a>
                                        <a href="http://localhost:8001/user/space/del/2" class="btn btn-danger"
                                            data-confirm="Do you want to delete?">Del</a>
                                        <a href="http://localhost:8001/user/space/bulkEdit/2?action=make-hide"
                                            class="btn btn-secondary">Make hide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="item-list">
                            <div class="sale_info">64%</div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="thumb-image">
                                        <a href="http://localhost:8001/space/luxury-studio" target="_blank">
                                            <img src="http://localhost:8001/uploads/demo/space/space-1.jpg"
                                                class="img-responsive" alt="">
                                        </a>
                                        <div class="service-wishlist " data-id="1" data-type="space">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="item-title">
                                        <a href="http://localhost:8001/space/luxury-studio" target="_blank">
                                            LUXURY STUDIO
                                        </a>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-paper-plane"></i>
                                        Location: New York, United States
                                    </div>
                                    <div class="location">
                                        <i class="icofont-money"></i>
                                        Price: <span class="sale-price">$300</span> <span class="price">$107</span>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-ui-settings"></i>
                                        Status: <span class="badge badge-publish">publish</span>
                                    </div>
                                    <div class="location">
                                        <i class="icofont-wall-clock"></i>
                                        Last Updated: 10/10/2020 12:46
                                    </div>
                                    <div class="control-action">
                                        <a href="http://localhost:8001/user/space/clone/1" target="_blank"
                                            class="btn btn-primary">Clone</a>
                                        <a href="http://localhost:8001/space/luxury-studio" target="_blank"
                                            class="btn btn-info">View</a>
                                        <a href="http://localhost:8001/user/space/edit/1"
                                            class="btn btn-warning">Edit</a>
                                        <a href="http://localhost:8001/user/space/del/1" class="btn btn-danger"
                                            data-confirm="Do you want to delete?">Del</a>
                                        <a href="http://localhost:8001/user/space/bulkEdit/1?action=make-hide"
                                            class="btn btn-secondary">Make hide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bravo-pagination">
                <span class="count-string">Showing 1 - 3 of 3 Spaces</span>

            </div>
        </div>
    </div>
</div>
@endsection