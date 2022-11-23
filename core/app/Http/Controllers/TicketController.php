<?php

namespace App\Http\Controllers;


use App\ContactTopic;
use Illuminate\Http\Request;
use App\SupportAttachment;
use App\SupportMessage;
use App\SupportTicket;
use Auth;
use Image;
use File;
use Validator;
use Session;
use Carbon\Carbon;

class TicketController extends Controller
{

    // Support Ticket
  public function supportTicket()
  {
    if(Auth::id() == null){
      abort(404);
    }
    $page_title = "Support Tickets";
    $supports = SupportTicket::where('user_id', Auth::id())->latest()->paginate(config('constants.table.default'));
    // return view('templates.new_minimal.user.support.index', compact('supports', 'page_title'));
    return view(activeTemplate() . 'user.support.index', compact('supports', 'page_title'));
  }

  public function openSupportTicket()
  {
    if(!Auth::user()){
      abort(404);
    }

    $page_title = "Support Tickets";
    $user = Auth::user();
    // return view('templates.new_minimal.user.support.create', compact('page_title', 'user'));
    return view(activeTemplate() . 'user.support.create', compact('page_title', 'user'));
  }

  public function storeSupportTicket(Request $request)
  {
    $ticket = new SupportTicket();
    $message = new SupportMessage();

    $imgs = $request->file('attachments');
    $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

    $validator = $this->validate($request, [
      'attachments' => [
        'max:4096',
        function ($attribute, $value, $fail) use ($imgs, $allowedExts) {
          foreach ($imgs as $img) {
            $ext = strtolower($img->getClientOriginalExtension());
            if (($img->getClientSize() / 1000000) > 2) {
              return $fail("Images MAX  2MB ALLOW!");
            }
            if (!in_array($ext, $allowedExts)) {
              return $fail("Only png, jpg, jpeg, pdf images are allowed");
            }
          }
          if (count($imgs) > 5) {
            return $fail("Maximum 5 images can be uploaded");
          }
        },
      ],
      'name' => 'required|max:191',
      'email' => 'required|max:191',
      'subject' => 'required|max:100',
      'message' => 'required',
    ]);


    $ticket->user_id = Auth::id();
    $random = rand(100000, 999999);
    $ticket->ticket = $random;
    $ticket->name = Auth::user()->fullname;
    $ticket->email = Auth::user()->email;
    $ticket->subject = $request->subject;
    $ticket->last_reply = Carbon::now();
    $ticket->status = 0;
    $ticket->save();

    $message->supportticket_id = $ticket->id;
    $message->message = $request->message;
    $message->save();


    if ($request->hasFile('attachments')) {
      foreach ($request->file('attachments') as $image) {
        $filename = rand(1000, 9999) . time() . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/support', $filename);
        SupportAttachment::create([
          'support_message_id' => $message->id,
          'image' => $filename,
        ]);
      }
    }
    $notify[] = ['success', 'ticket created successfully!'];
    return redirect()->route('ticket')->withNotify($notify);
  }

  public function supportMessage($ticket)
  {
    $page_title = "Support Tickets";
    $my_ticket = SupportTicket::where('ticket', $ticket)->latest()->first();
    $messages = SupportMessage::where('supportticket_id', $my_ticket->id)->latest()->get();
    $user = Auth::user();
    // return view('templates.new_minimal.user.support.view', compact('my_ticket', 'messages', 'page_title', 'user'));
    return view(activeTemplate() . 'user.support.view', compact('my_ticket', 'messages', 'page_title', 'user'));


  }

  public function supportMessageStore(Request $request, $id)
  {
    $ticket = SupportTicket::findOrFail($id);
    $message = new SupportMessage();

    if ($request->replayTicket == 1) {
      $imgs = $request->file('attachments');
      $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

      $this->validate($request, [
        'attachments' => [
          'max:4096',
          function ($attribute, $value, $fail) use ($imgs, $allowedExts) {
            foreach ($imgs as $img) {

              $ext = strtolower($img->getClientOriginalExtension());
              if (($img->getSize() / 1000000) > 2) {
                return $fail("Images MAX  2MB ALLOW!");
              }
              if (!in_array($ext, $allowedExts)) {
                return $fail("Only png, jpg, jpeg, pdf images are allowed");
              }
            }
            if (count($imgs) > 5) {
              return $fail("Maximum 5 images can be uploaded");
            }
          },
        ],
        'message' => 'required',
      ]);

      $ticket->status = 2;
      $ticket->last_reply = Carbon::now();
      $ticket->save();

      $message->supportticket_id = $ticket->id;
      $message->message = $request->message;
      $message->save();

      if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $image) {
          $filename = rand(1000, 9999) . time() . '.' . $image->getClientOriginalExtension();
          $image->move('assets/images/support', $filename);
          SupportAttachment::create([
            'support_message_id' => $message->id,
            'image' => $filename,
          ]);
        }
      }

      $notify[] = ['success', 'Support ticket replied successfully!'];
    } elseif ($request->replayTicket == 2) {
      $ticket->status = 3;
      $ticket->last_reply = Carbon::now();
      $ticket->save();
      $notify[] = ['success', 'Support ticket closed successfully!'];
    }
    return back()->withNotify($notify);

  }

  public function ticketDownload($ticket_id)
  {
    $attachment = SupportAttachment::findOrFail(decrypt($ticket_id));
    $file = $attachment->image;
    $full_path = 'assets/images/support/' . $file;

    $title = str_slug($attachment->supportMessage->ticket->subject);
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $mimetype = mime_content_type($full_path);


    header('Content-Disposition: attachment; filename="' . $title . '.' . $ext . '";');
    header("Content-Type: " . $mimetype);
    return readfile($full_path);
  }


}
