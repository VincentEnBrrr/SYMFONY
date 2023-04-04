<?php

// src/Controller/AboutController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController
{
    #[Route('/about')]
    public function about(): Response
    {
        return new Response(
            'Creer par moi-même'
        );
    }
}

?>