<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function __construct()
    {
    }

    public function send(Request $request)
    {
        try {
            if($request->has('to')) {

                Mail::send(array(), array(), function ($email) use($request) {

                    //Send mail to
                    $email->to(explode(',', $request->to));

                    //send mail to CC
                    if($request->has('cc') && !empty($request->cc)) {
                        $email->cc(explode(',', $request->cc));
                    }

                    //send mail to CC
                    if($request->has('bcc') && !empty($request->bcc)) {
                        $email->bcc(explode(',', $request->bcc));
                    }

                    if($request->has('subject') && !empty($request->subject)) {
                        $email->subject($request->subject);
                    }

                    if($request->has('body') && !empty($request->body)) {
                        $email->setBody($request->body, 'text/html');
                    }

                    //->setBody('Hi, welcome user!'); // assuming text/plain
                });

            } else {
                throw new \Exception('Invalid request', 1);
            }

            return response()->json(array('status' => true, 'message' => 'Request processed successfully'));
        } catch (\Exception $exception) {
            return response()->json(array('status' => false, 'message' => 'Error while processing request', 'error' => $exception->getMessage()));
        }
    }

}
