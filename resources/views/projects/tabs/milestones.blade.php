<div class="card card-outline card-info">
    <div class="card-header">
        <h3 class="card-title">New Milestone</h3>
    </div> 
    <form action="{{ url('/team/'. active_team()->id .'/projects/' . $project->id . '/milestones') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="name"
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}"
                > 

                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Due Date</label>
                <input 
                    type="text" 
                    id="due_date" 
                    name="due_date"
                    class="form-control @error('due_date') is-invalid @enderror" 
                    value="{{ old('due_date') }}"
                > 

                @error('due_date')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 

            <div class="form-group">
                <label for="description">Description</label> 
                <textarea 
                    id="description" 
                    class="form-control @error('description') is-invalid @enderror" 
                    name="description"
                >
                    {{ old('description') }}
                </textarea> 
                @error('description')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 
            <div class="form-group">
                <input type="submit" value="Add New" class="btn btn-default">
            </div>
        </div>
    </form>
 </div>