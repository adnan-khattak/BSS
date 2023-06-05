<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 pb-4 text-white min-vh-100 sticky-top"
    style="background-color: #60adbe">

    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4 fw-bold">Brains Science School</span>
    </a>
    <ul class="nav nav-pills flex-column mb-auto mt-3">
        <li class="nav-item">
            <a href="{{ route('student.home') }}" class="nav-link link-dark fs-5">
                <i class="bi bi-house-door-fill pe-4"></i>Home
            </a>
        </li>

        <li>
            <a href="{{ route('student.assessment.view') }}" class="nav-link link-dark fs-5">
                <i class="bi bi-clipboard-check-fill pe-4"></i>Assessment
            </a>
        </li>

        <li>
            <a href="{{ route('student.subject.view') }}" class="nav-link link-dark fs-5">
                <i class="bi bi-book-fill pe-4"></i>Subject
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle nav-link fs-5"
            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill pe-2"></i><strong>{{ Auth::guard('student')->user()->name }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="{{ route('student.profile') }}">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('student.signout') }}">Sign out</a></li>
        </ul>
    </div>
</div>
