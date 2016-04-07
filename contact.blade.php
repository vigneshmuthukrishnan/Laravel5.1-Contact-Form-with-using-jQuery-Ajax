<!-- Error message -->
<div class="alert alert-danger info" style="display: none;">
  <ul></ul>
</div>
<form method="POST" id="contact_form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div>
    <label>NAME</label>
    <input type="text" name="name" value="{{ old('name') }}" id="name">
  </div>
  <div>
    <label>Subject</label>
    <input type="text" name="subject" value="{{ old('subject') }}" id="subject">
  </div>
  <div>
    <label>EMAIL</label>
    <input type="email" name="email" value="{{ old('email') }}" id="email">
  </div>
  <div>
    <label>MESSAGE</label>
    <textarea placeholder="Please type your message." name="message" rows="15" id="message" >{{ old('text') }}</textarea>
  </div>
  <div>
    <button type="submit">
      Submit
    </button>
  </div>
</form>
<!-- Thank　You　-->
<div class="thanks" style="display:none;">
  <p>Thank　you for your Message!</p>
</div>
