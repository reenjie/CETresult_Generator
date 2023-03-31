<form action="{{route('importlist')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h6>Import List ( excel file )</h6>
    <input type="file" name="file" class="form-control" required accept=".xlsx,.xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel">

    <h6>For the year</h6>

    <select name="year" class="form-control mb-3" name="status" id="">
        @php
        $currentYear = date('Y');
        @endphp

        @for($i = $currentYear; $i > 2012 ; $i--) <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
    <button type="submit" class="btn btn-primary mt-2 bg-primary text-light form-control">Import</button>
</form>