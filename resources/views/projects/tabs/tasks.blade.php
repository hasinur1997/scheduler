<tasks 
    :team_id="{{ active_team()->id }}"  
    :project_id={{ $project->id }} 
    :users="{{ $project->users }}"
    :milestones="{{ $project->milestones }}"
>
</tasks>