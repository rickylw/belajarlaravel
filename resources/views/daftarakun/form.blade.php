{{-- {{ csrf_field() }} --}}
@csrf
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
        <input type="text" placeholder="Please Insert Your name..." name="name" id="name" class="form-control" value="{{ $name ?? '' }}" >
    </div>
</div>

<div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        <input type="password" name="password" id="password" class="form-control" value="{{ $password ?? '' }}" >
    </div>
</div>

<div class="form-group">
    <label for="role" class="col-sm-2 control-label">role</label>
    <div class="col-sm-10">
        <input type="text" name="role" class="form-control" value="{{ $role ?? '' }}" >
    </div>
 </div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" value="{{ $email ?? '' }}" >
        </div>
</div>
<div class="form-group">
    <label for="password_confirmation" class="form-label">password_confirmation</label>
        <div class="col-sm-10">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
        </div>    
</div>
<button class="btn btn-primary btn-sm" type="submit">Create</button>
{{-- <div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a type="submit" class="btn btn-primary" role="button">Batal</a>
</div>
</div> --}}