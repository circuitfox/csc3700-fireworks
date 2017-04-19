@extends('layouts/app')
@section('content')
<ul class="nav nav-tabs">
  <li class="active"><a href="#tab1" data-toggle="tab">Tab 1</a></li>
  <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
</ul>
<div class="tab-content" id="TabContents">
  <div class="tab-pane fade active in" id="tab1">
    <p>Here is some stuff for Tab 1</p>
  </div>
  <div class="tab-pane fade" id="tab2">
    <p>Here is some other stuff for Tab 2</p>
  </div>
</div>
@endsection
