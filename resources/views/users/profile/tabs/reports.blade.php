<h3>Reports</h3>
<form 
    action="{{ url('/team/'. active_team()->id .'/users/'. $user->id .'/profile?tab=reports&action=search') }}"
    method="GET"
>
    <input type="hidden" name="tab" value="reports">
    <input type="hidden" name="action" value="search">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">From</label>
      <input 
        type="text" 
        class="form-control mb-2"
        name="start_date" 
        id="inlineFormInput" 
        placeholder="{{Carbon\Carbon::now()->startofMonth()->toDateString()}}" 
        value="{{old('start_date')}}"
      >
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">To</label>
      <div class="input-group mb-2">
        <input 
            type="text" 
            class="form-control" 
            name="end_date"
            id="inlineFormInputGroup" 
            placeholder="{{Carbon\Carbon::now()->endofMonth()->toDateString()}}"
            value="{{old('end_date')}}"
        >
      </div>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Search</button>
    </div>
  </div>
</form>

@if(count($tasks))

    <table 
        class="table table-striped table-sm"
    >
        <thead>
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Description</th>
                <th>Created Date</th>
                <th>Completed Date</th>
                <th>Working Hour</th>
            </tr>        
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>#</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->completed_date }}</td>
                    <td>{{ $task->working_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No task found</p>
@endif