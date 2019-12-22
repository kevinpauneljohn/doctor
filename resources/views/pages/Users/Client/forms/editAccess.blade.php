<h2 class="modal-form-title">Access Details</h2>
<div class="form-group email">
    <label for="email">Email</label><span class="required">*</span>
    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
</div>
<div class="form-group username">
    <label for="username">Username</label><span class="required">*</span>
    <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
</div>
<div class="form-group password">
    <label for="password">Password</label><span class="required">*</span>
    <input type="password" name="password" class="form-control" id="password">
</div>
<div class="form-group">
    <label for="password_confirmation">Re-type Password</label><span class="required">*</span>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
</div>
</div>