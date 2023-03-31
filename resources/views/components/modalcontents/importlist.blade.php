<form action="{{route('importlist')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h6>Import List ( excel file )</h6>
<input type="file" name="file" class="form-control" accept=".xlsx,.xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel">
<button type="submit" class="btn btn-primary mt-2 bg-primary text-light form-control">Import</button>
</form>