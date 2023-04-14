<form action="{{route('changestatus')}}" method="get">
    @csrf
    <input type="hidden" id="appid" name="id">
    <input type="hidden" name="type" value="approve">
    <input type="hidden" name="email" id="useremail">
    <input type="hidden" name="username" id="username">
    <h6>
        Set Claiming Schedule
    </h6>
    <input type="datetime-local" class="form-control" name="schedule" required>
    <button type="submit" style="float:right" class="btn btn-primary mt-3 btn-sm px-3">Approve <i class="fas fa-check-circle"></i></button>
</form>