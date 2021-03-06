
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="">
                    <span>
                        <i class="feather-home mr-1"></i>
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a class="menu-item" href="">
                    <span>
                        <i class="feather-users mr-1"></i>
                        Viewer
                    </span>
                </a>
            </li>
            <li>
                <h5 class="text-secondary">
                    Batch Management
                </h5>
            </li>
            <li>
                <a class="menu-item" href="{{ route('batch.create') }}">
                    <span>
                        <i class="feather-user-plus mr-1"></i>
                        Add Batch
                    </span>

                </a>
            </li>
            <li>
                <a class="menu-item" href="{{ route('batch.index') }}">
                    <span>
                        <i class="fas fa-list mr-1"></i>
                        Batch List
                    </span>
                    <span class="badge badge-pill badge-light shadow-sm">
                        {{ \App\Batch::count() }}
                    </span>
                </a>
            </li>
            <li>
                <h5 class="text-secondary">
                    Course Management
                </h5>
            </li>
            <li>
                <a class="menu-item" href="{{ route('course.create') }}">
                    <span>
                        <i class="feather-plus-circle"></i>
                        Add Course
                    </span>
                </a>
            </li>
            <li>
                <a class="menu-item" href="{{ route('course.index') }}">
                    <span>
                        <i class="feather-list"></i>
                        Course List
                    </span>
                    <span class="badge badge-pill badge-light shadow-sm">
                        {{ \App\Course::count() }}
                    </span>
                </a>
            </li>

            <li>
                <div class="my-5"></div>
            </li>




            <li>
                <a class="menu-item alert-danger text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>



