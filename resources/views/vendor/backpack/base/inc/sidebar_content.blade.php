<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>Settings</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('state') }}'><i class='nav-icon la la-question'></i> States</a></li>
@if(!app()->environment('production') or !isset($_GET['dev']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('country') }}'><i class='nav-icon la la-question'></i> Countries</a></li>
@endif
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('city') }}'><i class='nav-icon la la-question'></i> Cities</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('section') }}'><i class='nav-icon la la-question'></i> Sections</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('place') }}'><i class='nav-icon la la-question'></i> Places</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('branch-group') }}'><i class='nav-icon la la-question'></i> Branch groups</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('advertisement') }}'><i class='nav-icon la la-question'></i> Advertisements</a></li>