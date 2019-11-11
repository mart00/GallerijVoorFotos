
<div class="form-group">
    <label for="title">title</label>
    <input type="text" name="title" value="{{ old('title')}}" class="form-control">
    <div>{{ $errors->first('title') }}</div>
</div>

<div class="form-group d-flex flex-column">
    <label for="photo">Profile Image</label>
    <input type="file" name="photo" class="py-2">
    <div>{{ $errors->first('photo') }}</div>
</div>
@csrf
