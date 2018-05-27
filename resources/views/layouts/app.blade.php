@extends('inspinia::layouts.main')

@if (auth()->check())
@section('user-avatar', 'https://www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?d=mm')
@section('user-name', auth()->user()->name)
@section('user-email', auth()->user()->email)
@endif

@section('breadcrumbs')
@include('inspinia::layouts.main-panel.breadcrumbs', [
  'breadcrumbs' => [
    (object) [ 'title' => 'Home', 'url' => route('home') ]
  ]
])
@endsection

@section('sidebar-menu')
  <ul class="nav metismenu" id="side-menu" style="padding-left:0px;">
    <li {{{ (Request::is('home') ? 'class=active' : '') }}} {{{ (Request::is('/') ? 'class=active' : '') }}}>
         <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
    </li>

    <li {{{ (Request::is('targets') ? 'class=active' : '') }}} {{{ (Request::is('targets/vulnerabilities') ? 'class=active' : '') }}}>
         <a href="{{ route('targets') }}"><i class="fa a-fw fa-dot-circle-o"></i> <span class="nav-label">Targets</span></a>
    </li>

    <li {{{ (Request::is('settings') ? 'class=active' : '') }}}>
         <a href="{{ route('settings') }}"><i class="fa fa-fw fa-cog"></i> <span class="nav-label">Settings</span></a>
    </li>

    <li {{{ (Request::is('user_manual') ? 'class=active' : '') }}}>
         <a href="{{ route('user_manual') }}"><i class="fa fa-fw fa-file-text"></i> <span class="nav-label">User Manual</span></a>
    </li>
  </ul>
@endsection
