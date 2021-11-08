@extends('layouts.adminApp')

@section('content-title')
Продукты
<a href="{{route('admin.product.create')}}" style="color: #00cd5a;" class="btn btn-app-success" id="prodCreateBtn">
    <i class="far fa-plus-square"></i> Создать
</a>
@endsection

@section('content')
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>Название</th>
          <th>Категория</th>
          <th>Ед. измерения</th>
          <th>Цена</th>
          <th>Действие</th>
        </tr>
      </thead>
      <tbody id="output">

      </tbody>
    </table>
</div>
<div class="card-tools">
    <ul class="pagination pagination-sm float-right">
      <li class="page-item page-link" id="prev" style="cursor: pointer">«</li>
      <li class="page-item page-link" id="next" style="cursor: pointer">»</li>
    </ul>
</div>
<br><br>
@endsection

@section('scripts')
<script>
    getProductsList();
</script>
@endsection
