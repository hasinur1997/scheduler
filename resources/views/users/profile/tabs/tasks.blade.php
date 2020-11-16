@if(count($user->currentTasks()))

    <table 
        class="table table-striped table-sm"
    >
        <thead>
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Description</th>
                <th>Created Date</th>
            </tr>        
        </thead>
        <tbody>
            @foreach($user->currentTasks() as $task)
                <tr>
                    <td>#</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No task found</p>
@endif