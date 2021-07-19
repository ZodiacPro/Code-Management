<div class="sidebar" data-color="gray">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="/" class="simple-text logo-mini">
      {{ __('DCM') }}
    </a>
    <a href="/" class="simple-text logo-normal">
      {{ __('Code Management') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app @if($activePage == 'home') text-dark @endif"></i>
          <p class="@if($activePage == 'home') text-dark @endif">{{ __('Dashboard') }}</p>
        </a>
      </li>
    {{-- Docu --}}
    <li>
      <a data-toggle="collapse" href="#documents">
          <i class="fab fa-laravel"></i>
        <p>
          {{ __("Document") }}
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse @if($activePage == 'form_index' || $activePage == 'request_index') show @endif" id="documents">
        <ul class="nav">
          <li class="@if ($activePage == 'form_index') active @endif">
            <a href="/document">
              <i class="fas fa-archive @if($activePage == 'form_index') text-dark @endif"></i>
              <p class="@if($activePage == 'form_index') text-dark @endif"> {{ __("Form Management") }} </p>
            </a>
          </li>
          <li class="@if ($activePage == 'request_index') active @endif">
            <a href="/request">
              <i class="fas fa-unlock @if($activePage == 'request_index') text-dark @endif"></i>
              <p class="@if($activePage == 'request_index') text-dark @endif"> {{ __("Request") }} </p>
            </a>
          </li>
        </ul>
      </div>
    </li>
    {{-- end --}}
      <li>
        <a data-toggle="collapse" href="#usermanagement">
            <i class="fas fa-user-circle"></i>
          <p>
            {{ __("Profile ") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if ($activePage == 'profile' || $activePage == 'users') show @endif" id="usermanagement">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02 @if($activePage == 'profile') text-dark @endif"></i>
                <p class="@if($activePage == 'profile') text-dark @endif"> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
