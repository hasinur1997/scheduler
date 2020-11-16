<h2>Reports Tab</h2>

@if(count($user->completedTask()))

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
            @foreach($user->completedTask() as $task)
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