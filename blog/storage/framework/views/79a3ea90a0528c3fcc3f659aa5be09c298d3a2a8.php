<?php echo $__env->make('useradmin.chunks.top', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>








<body class="user-page  ">
    <div class="bravo_wrap">

        <div class="bravo_user_profile">
            <div class="container-fluid">
                <div class="row row-eq-height">
                    <div class="col-md-3">
                        <div class="sidebar-user">
                            <div class="bravo-close-menu-user"><i class="icofont-scroll-left"></i></div>
                            <div class="logo">
                                <span class="avatar-text">B</span>
                            </div>
                            <div class="user-profile-avatar">
                                <div class="info-new">
                                    <span class="role-name badge badge-info">Customer</span>
                                    <h5><?php echo e(Auth::user()->name); ?></h5>
                                    <p>Member Since <?php echo e(Auth::user()->created_at->toFormattedDateString()); ?></p>
                                </div>
                            </div>
                            <div class="user-profile-plan">
                                <a href="profile\change-password.html">Become a vendor</a>
                            </div>
                            <div class="sidebar-menu">
                                

                                <ul class="main-menu">
                                    <li class="active">
                                        <a href="/my_profile">
                                            <span class="icon text-center"><i class="fa fa-home"></i></span>
                                            Dashboard

                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/booking_history">
                                            <span class="icon text-center"><i class="fa fa-clock-o"></i></span>
                                            Booking History

                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/wishlist">
                                            <span class="icon text-center"><i class="fa fa-heart-o"></i></span>
                                            Wishlist

                                        </a>
                                    </li>
                                    <li class=" has-children">
                                        <a href="/hotel">
                                            <span class="icon text-center"><i class="fa fa-building-o"></i></span>
                                            Manage Hotel

                                        </a>
                                        <i class="caret"></i>
                                        <ul class="children">
                                            <li class=""><a href="/hotel">
                                                    All Hotels</a></li>
                                            <li class=""><a href="hotel/add">
                                                    Add Hotel</a></li>
                                            <li class=""><a href="booking_report">
                                                    Booking Report</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class=" has-children">
                                        <a href="space">
                                            <span class="icon text-center"><i class="icofont-building-alt"></i></span>
                                            Manage Space

                                        </a>
                                        <i class="caret"></i>
                                        <ul class="children">
                                            <li class=""><a href="space">
                                                    All Spaces</a></li>
                                            <li class=""><a href="/space/add">
                                                    Add Space</a></li>
                                            <li class=""><a href="/space/availability">
                                                    Availability</a></li>
                                            <li class=""><a href="/space/booking_report">
                                                    Booking Report</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class=" has-children">
                                        <a href="event">
                                            <span class="icon text-center"><i class="icofont-ticket"></i></span>
                                            Manage Resuturent

                                        </a>
                                        <i class="caret"></i>
                                        <ul class="children">
                                            <li class=""><a href="event">
                                                    All Resurents</a></li>
                                            <li class=""><a href="event/create">
                                                    Add Resturent</a></li>
                                            <li class=""><a href="event/availability">
                                                    Availability</a></li>
                                            <li class=""><a href="event/booking-report">
                                                    Booking Report</a></li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="/enquiry-report">
                                            <span class="icon text-center"><i class="icofont-ebook"></i></span>
                                            Enquiry Report

                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/vendor/payouts">
                                            <span class="icon text-center"><i class="icon ion-md-card"></i></span>
                                            Payouts

                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="verification">
                                            <span class="icon text-center"><i class="fa fa-handshake-o"></i></span>
                                            Verifications

                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/my_profile">
                                            <span class="icon text-center"><i class="fa fa-cogs"></i></span>
                                            My Profile

                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="profile/change-password">
                                            <span class="icon text-center"><i class="fa fa-lock"></i></span>
                                            Change password

                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/admin">
                                            <span class="icon text-center"><i class="icon ion-ios-ribbon"></i></span>
                                            Admin Dashboard

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="logout">
                               
                                <a href="/logout"><i class="fa fa-sign-out"></i> Log Out
                                </a>
                            </div>
                            <div class="logout">
                                <a href="/" style="color: #1ABC9C"><i
                                        class="fa fa-long-arrow-left"></i> Back to Homepage</a>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->yieldContent('userdash'); ?>
                </div>
            </div>
        </div>

        <div id="cdn-browser-modal" class="modal fade">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div id="cdn-browser" class="cdn-browser d-flex flex-column" v-cloak=""
                        :class="{is_loading:isLoading}">
                        <div class="files-nav flex-shrink-0">
                            <div class="d-flex justify-content-between">
                                <div class="col-left d-flex align-items-center">
                                    <div class="filter-item">
                                        <input type="text" placeholder="Search file name...." class="form-control"
                                            v-model="filter.s" @keyup.enter="filter.page = 1;reloadLists()">
                                    </div>
                                    <div class="filter-item">
                                        <button class="btn btn-default" @click="filter.page = 1;reloadLists()">
                                            <i class="fa fa-search"></i> Search</button>
                                    </div>
                                    <div class="filter-item">
                                        <small><i>Total: files</i></small>
                                    </div>
                                </div>
                                <div class="col-right">
                                    <i class="fa-spin fa fa-spinner icon-loading active" v-show="isLoading"></i>
                                    <button class="btn btn-success btn-pick-files">
                                        <span><i class="fa fa-upload"></i> Upload</span>
                                        <input multiple="" type="file" name="files[]" ref="files">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="upload-new" v-show="showUploader" display="none">
                            <input type="file" name="filepond[]" class="my-pond">
                        </div>
                        <div class="files-list">
                            <div class="files-wraps " :class="'view-'+viewType">
                                <file-item v-for="(file,index) in files" :key="index" :view-type="viewType"
                                    :selected="selected" :file="file" v-on:select-file="selectFile"></file-item>
                            </div>
                            <p class="no-files-text text-center" v-show="!total && apiFinished" style="display: none">No
                                file found</p>
                            <div class="text-center" v-if="totalPage > 1">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item" :class="{disabled:filter.page <= 1}">
                                            <a class="page-link" v-if="filter.page <=1">Previous</a>
                                            <a class="page-link" href="#" v-if="filter.page > 1"
                                                v-on:click="changePage(filter.page-1,$event)">Previous</a>
                                        </li>
                                        <li class="page-item" v-if="p >= (filter.page-3) && p <= (filter.page+3)"
                                            :class="{active: p == filter.page}" v-for="p in totalPage"
                                            @click="changePage(p,$event)">
                                            <a class="page-link" href="#">p</a></li>
                                        <li class="page-item" :class="{disabled:filter.page >= totalPage}">
                                            <a v-if="filter.page >= totalPage" class="page-link">Next</a>
                                            <a href="#" class="page-link" v-if="filter.page < totalPage"
                                                v-on:click="changePage(filter.page+1,$event)">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('useradmin.chunks.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</body>



</html>
