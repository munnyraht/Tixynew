<?php

namespace App\Mailers;

use App\Models\Order;
use Log;
use Mail;

class OrderMailer
{
    public function sendOrderNotification(Order $order)
    {
        $data = [
            'order' => $order
        ];

        Mail::send('Emails.OrderNotification', $data, function ($message) use ($order) {
            $message->to($order->account->email);
            $message->subject('New order received on event ' . $order->event->title . ' [' . $order->order_reference . ']');
        });

    }

    public function sendOrderTickets($order)
    {

        Log::info("Sending ticket to: " . $order->email);

        $data = [
            'order' => $order,
        ];

        foreach ($order->orderItems as $order_item) {
        

        if($order_item->title == "Amina (All Access)"){
            Mail::send('Mailers.TicketMailer.AminaOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "Nehanda (Speaker)") {
            # code...
            Mail::send('Mailers.TicketMailer.NehandaOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "Emotan (Vendor)") {
            # code...
            Mail::send('Mailers.TicketMailer.EmotanOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "Moremi (Press)") {
            # code...
            Mail::send('Mailers.TicketMailer.MoremiOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "Asantewaa (VIP)") {
            # code...
            Mail::send('Mailers.TicketMailer.AsantewaaOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "1K Flash Sale") {
            # code...
            Mail::send('Mailers.TicketMailer.OkweiOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "1K Flash Sale") {
            # code...
            Mail::send('Mailers.TicketMailer.OkweiOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "Okwei (General Admission)") {
            # code...
            Mail::send('Mailers.TicketMailer.OkweiOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title == "Okwei (Early Bird)") {
            # code...
            Mail::send('Mailers.TicketMailer.OkweiOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

        elseif ($order_item->title === "Sunday Day - Ticket" || $order_item->title === "Saturday Day - Ticket") {
            # code...
            Mail::send('Mailers.TicketMailer.SundayOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });

            break;
        }

        else {
            # code...
            Mail::send('Mailers.TicketMailer.SendOrderTickets', $data, function ($message) use ($order) {
                $message->to($order->email);
                $message->subject('Your tickets for ' . $order->event->title);
    
                $query = $order->attendees();
                $attendees = $query->get();
                $count_attendee = count($attendees);
                $j = 0;
                do {
                    $file_name = $attendees[$j]['first_name']. '_' .$attendees[$j]['last_name']. '_' .$order->order_reference;
                
                    $file_path = public_path(config('attendize.event_pdf_tickets_path') . '/' . $file_name . $j . '.pdf');
                    $message->attach($file_path);
                    $j++;
                } while ($j < $count_attendee);
            });
        }

    }

    }

}
