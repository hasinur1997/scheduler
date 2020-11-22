<a href="{{ url('/team/'. active_team()->id .'/projects/'. $project->id .'?tab=milestones&action=new') }}" class="btn btn-info">
    Add New 
</a>    

<div class="card card-outline card-success mt-4">
    <div class="card-header">
        <h2 class="card-title">Milestones</h2>
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                @foreach($project->milestones as $milestone)
                    <tr>
                        <td>
                            <strong>{{ $milestone->name }}</strong>
                            <small>{{ $milestone->created_at->diffForHumans() }}</small>
                            @if($milestone->tasks()->count())
                            <div class="card card-outline card-default mt-2">
                                <div class="card-header">
                                    <h2 class="card-title">Task Lists</h2>
                                </div>
                                
                                <div class="card-body">
                                    <table class="table">
                                        @foreach($milestone->tasks as $task)
                                            <tr>
                                                <td>{{$task->name}}</td>
                                                <td class="project_progress">
                                                    <div class="progress progress-sm">
                                                        <div 
                                                            role="progressbar" 
                                                            aria-volumenow="57" 
                                                            aria-volumemin="0" 
                                                            aria-volumemax="100" 
                                                            class="progress-bar bg-green" 
                                                            style="width: {{ $task->progress }}%;"
                                                        >
                                                        </div>
                                                    </div> 
                                                    <small>
                                                        {{ $task->progress }}% Complete
                                                    </small>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                
                            </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>