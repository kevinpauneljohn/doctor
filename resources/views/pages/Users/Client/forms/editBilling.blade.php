<h2 class="modal-form-title">Billing Address</h2>
<div class="form-group address">
    <label for="address">Address</label><span class="required">*</span>
    <input type="text" name="address" class="form-control" id="address" value="{{$user->address}}">
</div>
<div class="form-group region">
    <label for="region">Region</label><span class="required">*</span>
    <select name="region" id="region" class="form-control" style="width: 100%;">
        <option value="">Select a Region</option>
        @foreach($regions as $region)
            <option value="{{$region->regCode}}">{{$region->regDesc}}</option>
        @endforeach
    </select>
</div>
<div class="form-group state">
    <label for="state">State</label><span class="required">*</span>
    <select name="state" class="form-control" id="state">

    </select>
</div>
<div class="form-group city">
    <label for="city">City</label><span class="required">*</span>
    <select name="city" class="form-control" id="city">

    </select>
</div>
<div class="form-group postalcode">
    <label for="postalcode">Postal Code</label><span class="required">*</span>
    <input type="text" name="postalcode" class="form-control" id="postalcode" value="{{$user->postalcode}}">
</div>