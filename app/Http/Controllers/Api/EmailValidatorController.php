<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Rules\EmailDNSValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\VerifyEmail;
use SMTPValidateEmail\Validator as SmtpEmailValidator;

 // Import the VerifyEmail class

class EmailValidatorController extends BaseController
{
    //Email Validator
    public function emailValidator(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'email' => ['required', 'email'],
        // ]);

        // if ($validator->fails())
        // {
        //     return $this->sendError('Email Validation Error.', $validator->errors());
        // }

        // Initialize library class
        // $mail = new VerifyEmail();

        // // Set the timeout value on stream
        // $mail->setStreamTimeoutWait(20);

        // // Set email address for SMTP request
        // $mail->setEmailFrom('from@email.com');

        // // Email
        // $email = $request->email;

        // // Check if email is valid and exist
        //  if ($mail->check($email)) {
        //     return $this->sendResponse('Email is exist!', 200);
        // } elseif (VerifyEmail::validate($email)) {
        //     return $this->sendResponse('Email is valid, but not exist!', 200);
        // } else {
        //     return $this->sendError('Email is not valid and not exist!', ['error' => 'not valid']);
        // }





        /**
         * --------------------------------------------------------------------------
         *                                                                   EMAIL VALIDATION
         * --------------------------------------------------------------------------
         */


        //  $validator = Validator::make($request->all(), [
        //     'email' => ['required', 'email'],
        // ]);

        // if ($validator->fails())
        // {
        //     return $this->sendError('Email Validation Error.', $validator->errors());
        // }


        $email     = $request->input('email');
        $sender    = 'sender@example.org';
        $validator = new SmtpEmailValidator($email, $sender);

        $results = $validator->validate();

        return response()->json([
            'results' => $results,
        ]);
    }

}











