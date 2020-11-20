    <nav class="navbar navbar-expand-lg navbar-dark nav-bg">
      <div class="container">
        <a class="navbar-brand" href="{{ route('front-page') }}">
          <img
            src="{{ asset('front/assets/img/CCC.png') }}"
            alt="logo-pondok-informatika-almadinah"
            class="logo mx-2"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link text-light mx-2" href="qna.html">INFORMASI</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-light mx-2 {{ request()->is('jadwal') ? 'nav-active' : '' }}" href="{{ route('jadwal') }}">JADWAL</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-light mx-2  {{ request()->is('question-and-answer') ? 'nav-active' : '' }}" href="{{ route('qna') }}">Q&A</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-light mx-2  {{ request()->is('user') ? 'nav-active' : '' }} " href="{{ route('dashboard-user') }}">AKUN SAYA</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>