<h2>Contact Us</h2>
@if(Session::has('flash_message'))
<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
@endif
<form method="POST" action="{{route('contact.store')}}">
{{csrf_field()}}
  <div class="form-group" >
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Name">
    @if($errors->has('name'))
    <small class="form-text text-muted alert alert-danger error">{{ $errors->first('name') }}</small>
    @endif
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="you@example.com">
    @if($errors->has('email'))
    <small class="form-text text-muted alert alert-danger error">{{ $errors->first('email') }}</small>
    @endif
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="subject" name="subject" placeholer="Maxmum 200 word">
    @if($errors->has('subject'))
    <small class="form-text text-muted alert alert-danger error">{{ $errors->first('subject') }}</small>
    @endif
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

