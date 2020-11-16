<div class="card card-outline card-info">
    <div class="card-header">
        <h3 class="card-title">New Disscusstion</h3>
    </div> 
    <form action="{{ url('/team/'. active_team()->id .'/projects/' . $project->id . '/notices') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title"
                    class="form-control @error('title') is-invalid @enderror" 
                    value="{{ old('title') }}"
                > 

                @error('title')
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