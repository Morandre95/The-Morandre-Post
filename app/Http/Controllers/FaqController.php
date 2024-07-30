<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqRequest;
use App\Mail\FaqRequestMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faq.index', compact('faqs'));
    }
    
    // Metodo per visualizzare una FAQ specifica (opzionale)
    public function show(Faq $faq)
    {
        return view('faq.show', compact('faq'));
    }

    public function request()
    {
        return view('faq.request');
    }
    public function storeRequest(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'message' => 'required|string|max:255',
            'name' => 'required|string|max:25',
            'email' => 'required|email',
        ]);

        // Estrazione dei dati
        $message = $request->input('message');
        $name = $request->input('name');
        $email = $request->input('email');

        // Creazione dell'array di dati
        $info = compact('message', 'name', 'email');

        // Salva la richiesta nel database
        FaqRequest::create([
            'message' => $message,
            'name' => $name,
            'email' => $email
        ]);

        // Invia l'email
        Mail::to('andreamorelli95103@gmail.com')->send(new FaqRequestMail($info));

        return redirect()->route('faq.request')->with('success', 'Your request has been sent successfully!');
    }
}
