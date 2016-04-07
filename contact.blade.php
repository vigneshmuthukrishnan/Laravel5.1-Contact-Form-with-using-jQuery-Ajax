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

<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function(){
    $('form').submit(function(e){

    e.preventDefault();

    //formData
    var formData = new FormData();

    formData.append('name',$('#name').val());
    formData.append('subject',$('#subject').val());
    formData.append('email',$('#email').val());
    formData.append('message',$('#message').val());

    $.ajax({
      url:'contact',
      method:'post',
      processData:false,
      contentType:false,
      cache:false,
      dataType:'json',
      data:formData,
      success:function(data){
        var info = $(".info");
        info.hide().find('ul').empty();

        if(!data.success){
          $.each(data.errors,function(index,error){
            info.find('ul').append('<li>'+error+'</li>');
          });
          info.slideDown();
        }else{
          $('#contact_form').fadeOut(800);
          $('.thanks').slideDown();
        }
      },
      error:function(){
        // do something
      }
      });

    });
  });
</script>
