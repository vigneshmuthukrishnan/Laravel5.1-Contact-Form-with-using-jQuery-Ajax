<?php

class ContactController extends Controller
{
  public function postIndex(Request $request)
  {
    // Validation rules
    $validator = Validator::make(
      // get values
      array(
        'name' => Input::get('name'),
        'subject' => Input::get('subject'),
        'email' => Input::get('email'),
        'message' => Input::get('message'),
      ),
      // set rules
      array(
        'name' => 'required|max:50',
        'subject' => 'required|max:100',
        'email' => 'required|email|max:255',
        'message' => 'required|max:2000',
      ),
      // If you want change error messages, you can change like this.
      array(
        'name.required' => 'The name field is required.',
        'name.max' => 'The name may not be greater than 50.',
        'subject.required' => 'The subject field is required.',
        'subject.max' => 'The subject may not be greater than 100.',
        'email.required' => 'The :attribute field is required.',
        'email.email' => 'The email must be a valid email address.'',
        'email.max' => 'The email may not be greater than 255.',
        'message.required' => 'The required field is required.',
        'message.max' => 'The message may not be greater than 2000.',
      )
    );

    if($validator->fails()){
      return Response::json([
        'success'=>false,
        'errors'=>$validator->errors()->toArray()
      ]);
    }

    // You can get value like this.
    $name = Input::get('name');
    $subject = Input::get('subject');
    $email = Input::get('email');
    $message = Input::get('message');

    // if validation has no error, you can do things like sending email,database insert ...


    return Response::json(['success'=>true]);
  }
}



?>
