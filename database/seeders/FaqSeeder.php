<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilizzare il metodo DB::table per inserire dati direttamente
        DB::table('faqs')->insert([
            ['question' => 'Qual è la tua politica di rimborso?', 'answer' => 'Offriamo rimborsi entro 30 giorni dall’acquisto.'],
            ['question' => 'Come posso contattare il supporto?', 'answer' => 'Puoi contattare il supporto via email all’indirizzo support@videogames.com.'],
            ['question' => 'Quali sono i requisiti di sistema per i giochi?', 'answer' => 'I requisiti variano a seconda del gioco. Consulta la scheda prodotto per maggiori dettagli.'],
            ['question' => 'Posso restituire un prodotto acquistato?', 'answer' => 'Le restituzioni sono accettate se il prodotto è in condizioni originali e non è stato aperto.'],
        ]);
    }
}
