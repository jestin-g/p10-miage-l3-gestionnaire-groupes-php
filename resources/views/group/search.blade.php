@extends('layouts.app')

@section('content')
<h1 class="display-3">Rechercher un individu</h1>
<div class="form-group">
  <input type="text" class="form-controller" id="search" name="search" placeholder="Entrer un nom"></input>
</div>
<table  class="table table-sm table-hover">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Email</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>

<script type="text/javascript">
$('#search').on('keyup',function(){
  if($(this).val().length > 1) {
    $value=$(this).val();
    $.ajax({
      type : 'get',
      url : "{{URL::to('/search/searchAjax')}}",
      data:{'search':$value},
      success:function(data) {
        $('tbody').html(data);
      }
    });
  }
})
</script>

<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
  

@endsection