@switch($action)
    @case('new')
        @include('projects.tabs.milestones.create')
        @break
    @case('edit')
        @include('projects.tabs.milestones.edit')
        @break
    
    @default
    @include('projects.tabs.milestones.index')

@endswitch