{{ method_field('PATCH') }}
<div class="justify-content-md-center mt-4">
    <div class="form-group row">
        <label class="col-lg-12 custom-file" for="avatar">Avatar</label>

        <div class="col-lg-12">

            <input type="file" class="custom-file" name="avatar" id="avatar"
                   placeholder="{{$user->avatar}}">

        </div>
    </div>
</div>
<div class="mt-4 ml-3">
    <button type="submit" class="btn btn-dark">Actualizar</button>
</div>