@extends('layouts.app')

@section('content')

<Form method='post'>
  @csrf
  <Input type="text" name="_email" />
  <input type="submit" name="_search" />
</form>
<p>
  search ref
</p>

<Form method='post'>
  @csrf
  <Input type="text" name="_email" />
  <input type="submit" name="_searchRef" />
</form>

<h2> Tìm ref </h2>
<Form method='post'>
  @csrf
  <Input type="text" name="_ref" />
  <input type="submit" name="_findRef" />
</form>
<div class="mb-3"></div>
<a href="/handleAdmin/deposit" class="btn btn-outline-primary">deposit</a><br>
<!-- User  -->
<x-admin.user-component :users='$users' />
<!-- Category  -->
<x-admin.cat-component :cats='$cat' />
<!--Comment   -->
<x-admin.comment-component :news='$new' />
<!-- Info  -->
<x-admin.info-component :info='$info' />
<!-- withdraw  -->
<x-admin.withdraw-component :withdraw='$withdraw' />
<!--Banned  -->
<x-admin.banned-component :banned='$users' />

@endsection