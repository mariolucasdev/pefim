<?php

namespace Database\Seeders;

use App\Models\BankLogo;
use Illuminate\Database\Seeder;

class BankLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bankLogos = [
            ['caption' => 'Alelo', 'logo_url' => 'https://www.alelo.com.br/content/dam/alelo-institucional/Cabecalho-Rodape/Originais-Alelo_Outline2.png'],
            ['caption' => 'Santander', 'logo_url' => 'https://companieslogo.com/img/orig/SAN-8a4d0f73.png?t=1720244493'],
            ['caption' => 'Itaú', 'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/2d/2023_Ita%C3%BA_Unibanco_Logo.png'],
            ['caption' => 'Caixa', 'logo_url' => 'https://www.freepnglogos.com/uploads/logo-caixa-png/caixa-download-png-5.png'],
            ['caption' => 'Bradesco', 'logo_url' => 'https://logodownload.org/wp-content/uploads/2018/09/bradesco-logo-4.png'],
            ['caption' => 'Banco Brasil', 'logo_url' => 'https://i.pinimg.com/originals/21/1d/51/211d51f2ea8e865e9b2d01de3c1466f8.png'],
            ['caption' => 'PicPay', 'logo_url' => 'https://seeklogo.com/images/P/picpay-logo-A98DEA805B-seeklogo.com.png'],
            ['caption' => 'C6 Bank', 'logo_url' => 'https://iconpusher.com/_next/image?url=https%3A%2F%2Fimg.iconpusher.com%2Fcom.c6bank.app%2F20210808.png&w=640&q=75'],
            ['caption' => 'Nubank', 'logo_url' => 'https://logodownload.org/wp-content/uploads/2019/08/nubank-logo-2.png'],
            ['caption' => 'Will', 'logo_url' => 'https://www.willbank.com.br/downloads/logomarca.jpg'],
            ['caption' => 'Ticket', 'logo_url' => 'https://www.grupogestaorh.com.br/conteudo/empresas/4aa882af29947692663b02a80dd573bdf3a50814.png'],
            ['caption' => 'Sodexo', 'logo_url' => 'https://logospng.org/download/sodexo/logo-sodexo-4096.png'],
            ['caption' => 'Mercado Pago', 'logo_url' => 'https://img.icons8.com/?size=512&id=nTLVtpxsNPaz&format=png'],
            ['caption' => 'Inter', 'logo_url' => 'https://universodoseguro.com.br/wp-content/uploads/2023/10/Inter.jpg'],
            ['caption' => 'Neon', 'logo_url' => 'https://www.foregon.com/x/foregon-front/conta-neon-digital_304-304.png'],
            ['caption' => 'Next', 'logo_url' => 'https://static.foregon.com/foregon-front/conta-digital-next_460-460.png'],
        ];

        foreach ($bankLogos as $bankLogo) {
            BankLogo::create($bankLogo);
        }
    }
}
