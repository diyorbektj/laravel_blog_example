<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\Contact;
use App\Models\User;
use App\Http\Requests\StoreMailRequest;
use App\Http\Requests\UpdateMailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $contacts = Contact::where('user_id',auth()->user()->id)->orWhere('from_id',auth()->user()->id)->orderByDesc('created_at')->get();
       $contacts = DB::table('contacts')
            ->leftJoin('users', 'contacts.from_id', '=', 'users.id')->
            where('contacts.user_id', auth()->user()->id)->orderByDesc('contacts.updated_at')
            ->get();
            //dd($contacts);
        return view('mail.main',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $mails = Mail::where('from_id',$id)->where('to_id',Auth::id())->where('is_read',0)->count();
        $contact2 = Contact::where('user_id',$id)->where('from_id',auth()->user()->id)->get();
        $contact = Contact::where('user_id',auth()->user()->id)->where('from_id',$id)->get();
        if ($request->filled('message')) {
            $mail = new Mail;
            $mail->to_id = $id;
            $mail->from_id = auth()->user()->id;
            $mail->message = $request->message;
            $mail->save();
            if(count($contact) > 0){
                $contacts = Contact::where('user_id',auth()->user()->id)->where('from_id',$id)->update([
                    'count' =>  $mails,
                    'message' => $request->message,
                    'post_id' => $mail->id,
                ]);
                $contacts2 = Contact::where('user_id',$id)->where('from_id',auth()->user()->id)->update([
                    'count' =>  $mails,
                    'message' => $request->message,
                    'post_id' => $mail->id,
                ]);
            }else{
            $contact = new Contact;
            $contact->user_id = auth()->user()->id;
            $contact->from_id = $id;
            $contact->message = $request->message;
            $contact->count = 1;
            $contact->post_id = $mail->id;
            $contact->save();
            if($id !=Auth::id()){
            $contacts = new Contact;
            $contacts->user_id = $id;
            $contacts->from_id = auth()->user()->id;
            $contacts->message = $request->message;
            $contacts->count = 1;
            $contacts->post_id = $mail->id;
            $contacts->save();
            }
            }
        }

        return redirect('/mail/'.$mail->to_id.'#'.$mail->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail,$id)
    {

        Mail::where('from_id',$id)->where('to_id',Auth::id())->update(['is_read' => 1]);
        //$mail = Mail::where('to_id',$id)->where('from_id',auth()->user()->id)->update
        $message= Mail::where('to_id',$id)->where('from_id',auth()->user()->id)->orWhere('to_id',auth()->user()->id)->where('from_id',$id)->get();
        return view('mail.show',[
            'messages' => $message,
            'user' => User::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMailRequest  $request
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMailRequest $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
